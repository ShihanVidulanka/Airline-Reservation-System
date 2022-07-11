<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Cancel_Booking_Model extends Dbh{

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

    public function cancel_booking_from_model($booking_id){
        $seat_reservation_controller = new Seat_Reservation_Controller();
        $pdo = $this->connect();
        $query = "UPDATE booking SET state=1 WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":id"=>$booking_id
            )
        );

        $booking_details = $this->getBookingDetails($booking_id);
//            print_array($booking_details);
        $body=
            "B Airways Seat Reservation system: You have cancelled seat booking successfully.\nDetails of seat reservation :-\n".
            "Full name: ".$_SESSION['first_name'].' '.$_SESSION['last_name']."\n".
            "Origin: ".$booking_details['origin']."\n".
            "Destination: ".$booking_details['destination']."\n".
            "Airplane Id: ".$booking_details['airplane_id']."\n".
            "Departure time: ".$booking_details['departure_time']."\n".
            "Departure date: ".$booking_details['departure_date']."\n".
            "Flight time: ".$booking_details['flight_time'].' hrs'."\n".
            "Flight Id: ".$booking_details['flight_id']."\n".
            "Passenger Id: ".$booking_details['passenger_id']."\n".
            "Booking_time: ".$booking_details['booking_time']."\n".
            "Ticket Price: ".$booking_details['ticket_price']."\n".
            "Seat No: ".$booking_details['seat_no']."\n".
            "Seat Type: ".$booking_details['seat_type']."\n"
        ;
        $subject = "Seat Reservation Successfull!";
        $recipient = $_SESSION['email'];
        $email = new Email($recipient,$subject,$body);
        $email_api = new Email_Api();
        $result = $email_api->sendMail($email);

        if($this->getNumberofBookingsFromModel()){
            $this->removeRegularCustomer();
            return "general";
        }
        return "";

    }
    public function getNumberofBookingsFromModel(){
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
        if($rows+1==2){
            return true;
        }else{
            return false;
        }
    }
    private function removeRegularCustomer(){
        $passenger_id = $_SESSION['passenger_id'];
        $pdo = $this->connect();
        $query = "UPDATE registered_passenger SET category=:category where passenger_id=:passenger_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            array(
                ":category"=>0,
                ":passenger_id"=>$passenger_id
            )
        );
    }
}