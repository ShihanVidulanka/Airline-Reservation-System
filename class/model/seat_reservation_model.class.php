<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
class Seat_Reservation_Model extends Dbh{

    protected function checkForBookedSeatFromModel($flight_id, $passport_number){
        $pdo = $this->connect();
        $query="SELECT * FROM 
                ((SELECT b.*,rp.passport_number FROM booking AS b INNER JOIN registered_passenger as rp
                    on b.passenger_id=rp.passenger_id) UNION
                (SELECT b.*,g.passport_number FROM booking AS b INNER JOIN guest as g on 
                    b.passenger_id=g.passenger_id)) AS bp 
                WHERE passport_number=:passport_number AND flight_id=:flight_id AND (state=2 or state=3);";
        $stmt=$pdo->prepare($query);
        $stmt->execute(
                array(
                    ':flight_id'=>$flight_id,
                    ':passport_number'=>$passport_number
                )
                );
        $rows=$stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }
    protected function reserveSeat(Booking $booking){
        $pdo = $this->connect();
       $query = "INSERT INTO booking(
                    flight_id,
                    passenger_id,
                    ticket_price,
                    seat_no,
                    seat_type,
                    state
                ) VALUES(
                    :flight_id,
                    :passenger_id,
                    :ticket_price,
                    :seat_no,
                    :seat_type,
                    :state
                ) ";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':flight_id'=>$booking->getFlight_id(),
                ':passenger_id'=>$booking->getPassenger_id(),
                ':ticket_price'=>$booking->getTicket_price(),
                ':seat_no'=>$booking->getSeat_no(),
                ':seat_type'=>$booking->getSeat_type(),
                ':state'=>$booking->getState(),
            )
            );
        $query = "SELECT LAST_INSERT_ID() as booking_id";
        $record = $pdo->query($query);
        $result=$record->fetch();
        $_SESSION['booking_id'] = $result;
        header('Location:../payment_gateway_dummy.php?error=success');
        
        
    }
    protected function getPlaneDetails($id){
        $pdo = $this->connect();
        $query = "SELECT * FROM airplane INNER JOIN flight 
                    ON flight.airplane_id=airplane.id
                    WHERE flight.id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
                array(
                    ':id'=>$id
                )
            );
        $result = $stmt->fetch();
        return $result;
    }

    protected function getReservedSeats($flight_id){
        $pdo = $this->connect();
        $query = "SELECT * FROM booking WHERE flight_id=:flight_id AND (state=2 OR state=3)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':flight_id'=>$flight_id
            )
        );
        $results = $stmt->fetchAll();
        $reserved=array();
        foreach ($results as $record) {
            $reserved[]=$record['seat_no'];
        }
        return $reserved;
    }
    protected function getBookedFlightDestinations($passenger_id){
        $pdo = $this->connect();
        date_default_timezone_set("Asia/Colombo");
        $date = Date("Y-m-d");
        $time = date("H:i:s");
        $query = "SELECT af.id, af.airport_code,af.name,af.country, b.passenger_id,b.state
                    FROM booking AS b INNER JOIN 
                    (SELECT f.id, a.airport_code,a.name,a.country FROM airport AS a INNER JOIN flight AS f ON a.airport_code = f.destination AND
                    (f.departure_date>'".$date."' OR (f.departure_date='".$date."'"." AND f.departure_time>"."'".$time."'))".")
                    AS af ON af.id = b.flight_id 
                    WHERE passenger_id=:passenger_id AND b.state=3";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':passenger_id'=>$passenger_id
            )
            );
        $result = $stmt->fetchAll();
        return $result;
    }

    protected function getBookedFlightDetails($passenger_id,$dest='all'){
        $pdo = $this->connect();
        date_default_timezone_set("Asia/Colombo");
        $date = Date("Y-m-d");
        $time = date("H:i:s");
        $destination = '';
        if(strcmp($dest,'all')!=0){
            $destination = "AND f.destination="."'".$dest."'";
        }
        $query="SELECT CONCAT(a.tail_no,'-',a.model) AS airplane,bf.* 
                    FROM airplane AS a 
                    INNER JOIN 
                    (SELECT b.id, b.flight_id,b.passenger_id, f.origin, f.destination, b.seat_type, b.state, b.ticket_price, f.airplane_id, f.departure_time, f.departure_date 
                    FROM booking as b INNER JOIN flight as f ON b.flight_id = f.id WHERE (b.state=2 OR b.state=3) AND b.passenger_id=:passenger_id {$destination} AND 
                    (f.departure_date>'".$date."' OR (f.departure_date='".$date."'"." AND f.departure_time>"."'".$time."'))".")
                    as bf ON a.id = bf.airplane_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ':passenger_id'=>$passenger_id
            )
            );
        $results=$stmt->fetchAll();
        return $results;
    }
    private function getBookingDetails($booking_id){
        $query="SELECT * FROM flight INNER JOIN booking ON booking.flight_id = flight.id WHERE booking.id=:booking_id";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute(
            array(
                ":booking_id"=>$booking_id
            )
        );
        $result = $stmt->fetch();
        return $result;
    }
    protected function payFromModel($booking_id){

        $pdo = $this->connect();
        $query = "UPDATE booking SET state=:state WHERE id=:booking_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":state"=>3,
                ":booking_id"=>$booking_id
            )
        );

        $regular = "";
        $email_sending = "";

        $booking_details = $this->getBookingDetails($booking_id);
//            print_array($booking_details);
            $body=
                "\tB Airways Seat Reservation system: You have booked seat successfully.\nDetails of seat reservation :-\n".
                "\tFull name: ".$_SESSION['first_name'].' '.$_SESSION['last_name']."\n".
                "\tOrigin: ".$booking_details['origin']."\n".
                "\tDestination: ".$booking_details['destination']."\n".
                "\tAirplane Id: ".$booking_details['airplane_id']."\n".
                "\tDeparture time: ".$booking_details['departure_time']."\n".
                "\tDeparture date: ".$booking_details['departure_date']."\n".
                "\tFlight time: ".$booking_details['flight_time'].' hrs'."\n".
                "\tFlight Id: ".$booking_details['flight_id']."\n".
                "\tPassenger Id: ".$booking_details['passenger_id']."\n".
                "\tBooking_time: ".$booking_details['booking_time']."\n".
                "\tTicket Price: ".$booking_details['ticket_price']."\n".
                "\tSeat No: ".$booking_details['seat_no']."\n".
                "\tSeat Type: ".$booking_details['seat_type']."\n"
            ;
            $subject = "Seat Reservation Successfull!";
            $recipient = $_SESSION['email'];
            $email = new Email($recipient,$subject,$body);
            $email_api = new Email_Api();
            $email_sending = create_dict($email_api->sendMail($email));

        if (isset($_SESSION['username'])){
            $regular = $this->createRegularCustomer();
        }
//        print_array($_SESSION);
        if (!isset($_SESSION['username'])) {
            session_destroy();
            header('Location:../index.php?error=success');
        }

        else if(strcmp($regular,"regular")==0){
            header('Location:../passenger_flight_booking.php?error=regular&email='.$email_sending['status']);
        }else{
            header('Location:../passenger_flight_booking.php?error=success&email='.$email_sending['status']);
        }


    }
    protected function cancelFromModel($booking_id){
        $pdo = $this->connect();
        $query = "UPDATE booking SET state=:state WHERE id=:booking_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":state"=>1,
                ":booking_id"=>$booking_id
            )
        );
        if (!isset($_SESSION['username'])) {
            session_destroy();
            header('Location:../index.php?error=success');
        }
        else{
            header('Location:../passenger_flight_booking.php?error=cancelled');
        }
    }
    private function getNumberofBookingsFromModel(){
        $pdo = $this->connect();
        $username = $_SESSION['username'];
        $query = "SELECT * FROM booking as b INNER JOIN 
                    (SELECT * FROM registered_passenger INNER JOIN user ON registered_passenger.user_id = user.ID) as p 
                        ON b.passenger_id = p.passenger_id 
                    WHERE b.state=3 AND p.username=:username";
        $stmt= $pdo->prepare($query);
        $stmt->execute(
          array(
              ":username"=>$username
          )
        );
        $rows=$stmt->rowCount();
        $airline_administrator_settings_controller = new Airline_Administrator_Settings_Controller();
        $settings = $airline_administrator_settings_controller->getSettingsDetails();
        $booking_count = $settings['booking_count'];
        if($rows>=$booking_count){
            return true;
        }else{
            return false;
        }
//        $records = $stmt->fetchAll();
    }
    protected function createRegularCustomer(){
        $passenger_id = $_SESSION['passenger_id'];
        $username = $_SESSION['username'];
        if($this->getNumberofBookingsFromModel($username)){
            $pdo = $this->connect();
            $query = "UPDATE registered_passenger SET category=:category where passenger_id=:passenger_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ":category"=>1,
                    ":passenger_id"=>$passenger_id
                )
            );
            return "regular";
        }else{
            $pdo = $this->connect();
            $query = "UPDATE registered_passenger SET category=:category where passenger_id=:passenger_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ":category"=>0,
                    ":passenger_id"=>$passenger_id
                )
            );
            return "general";
        }
    }
    protected function checkForRegularCustomerFromMOdel(){
        $pdo = $this->connect();
        $passenger_id = $_SESSION['passenger_id'];
        $query="SELECT category FROM registered_passenger where passenger_id=:passenger_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":passenger_id"=>$passenger_id
            )
        );
        $result = $stmt->fetch();
        return $result['category'];

    }
}

// $a = new Seat_Reservation_Model();
// print_array($a->getPlaneDetails(1));