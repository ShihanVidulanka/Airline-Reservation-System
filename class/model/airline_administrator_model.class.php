<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

// This class is for creating a new flight dispatcher and operations agent used by airline administrator
class Airline_Administrator_Model extends Dbh{
    public function check_username($username){
        $db=$this->connect();
        $query = "SELECT COUNT(ID) FROM user WHERE username=:username";
        $stmt=$db->prepare($query);
        $stmt->execute(
            array(':username'=>$username)
        );
        $count=$stmt->fetch()['COUNT(ID)'];
        if($count!=0){
            echo "Username already used";
        }
    }

    public function createAccount($details, $type){
        try {
            $db = $this->connect();
            $db->beginTransaction();

            $query1 = "INSERT INTO user(username, password, email, account_type) VALUES(:username, :password, :email, :account_type)";
            $statement1 = $db->prepare($query1);
            $statement1->execute(array(
                ':username'=>$details['username'],
                ':password'=>$details['hashed_password'],
                ':email'=>$details['email'],
                ':account_type'=>$details['account_type']
            ));
            $user_id = $db->lastInsertId();
            // echo $user_id."<BR>";
            $statement1->closeCursor();

            if ($type == 1) {
                $query2 = "INSERT INTO operations_agent(user_id, first_name, last_name, airport_code) VALUES(:user_id, :first_name, :last_name, :airport_code)";
            
                $statement2 = $db->prepare($query2);
                $statement2->execute(array(
                    ':user_id'=>$user_id,
                    ':first_name'=>$details['first_name'],
                    ':last_name'=>$details['last_name'],
                    ':airport_code'=>$details['airport_code']
                ));
                $statement2->closeCursor();
            } else {
                $query2 = "INSERT INTO flight_dispatcher(user_id, first_name, last_name, airport_code) VALUES(:user_id, :first_name, :last_name, :airport_code)";
            
                $statement2 = $db->prepare($query2);
                $statement2->execute(array(
                    ':user_id'=>$user_id,
                    ':first_name'=>$details['first_name'],
                    ':last_name'=>$details['last_name'],
                    ':airport_code'=>$details['airport_code']
                ));
                $statement2->closeCursor();
            }
            
            $query3 = "INSERT INTO telephone_no(user_id, phone_no) VALUES(:user_id, :phone_no)";
            // print_array($details['telephone_numbers']);
            foreach ($details['telephone_numbers'] as $telephone_number){
                $statement3 = $db->prepare($query3);
                $statement3->execute(array(
                    ':user_id'=>$user_id,
                    ':phone_no'=>$telephone_number
                ));
                $statement3->closeCursor();
            }
            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            die($e->getMessage());
        }

        
    }

    //get airplane details using tail_no or return null if empty
    public function getAirplaneDetailsFromModel($tail_no){
        $query = "SELECT * FROM airplane WHERE tail_no='{$tail_no}'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $details;
    }
    
    //add new row to airplane table
    public function addNewAirplaneFromModel($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats, $image, $file_type)
    {
        $query = "INSERT INTO airplane(tail_no, model, no_platinum_seats, no_economy_seats, no_business_seats, in_service, image, file_type)
             VALUES ( :tail_no, :model, :no_platinum_seats, :no_economy_seats, :no_business_seats, :in_service, :image, :file_type)";
        $stmt = $this->connect()->prepare($query);
        $in_service = 0;
        $stmt->bindParam(':tail_no', $tail_no, PDO::PARAM_STR, 20);
        $stmt->bindParam(':model', $model, PDO::PARAM_STR, 20);
        $stmt->bindParam(':no_platinum_seats', $no_platinum_seats, PDO::PARAM_INT, 3);
        $stmt->bindParam(':no_economy_seats', $no_economy_seats, PDO::PARAM_INT, 3);
        $stmt->bindParam(':no_business_seats', $no_business_seats, PDO::PARAM_INT, 3);
        $stmt->bindParam(':in_service', $in_service, PDO::PARAM_INT, 1);
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
        $stmt->bindParam(':file_type', $file_type, PDO::PARAM_STR, 255);

        if ($stmt->execute()) {

            echo " Data with Photo is added ";
        } else {
            echo " Not able to add data please contact Admin ";
            print_r($stmt->errorInfo());
        }
    }
    //get no of passengers by given flight no----->generate reports
    public function getNofPassengerByFlightNo($flight_no){
        $query="SELECT *
        FROM booking join registered_passenger on booking.passenger_id=registered_passenger.passenger_id 
        where flight_id=$flight_no AND
        TIMESTAMPDIFF(year, dob, DATE(booking_time))>=18 AND
        state=0
        ";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute();
        $array0=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $registered_above_18=count($array0);
        // echo"\n";
        // print(count($array0));


        $query1="SELECT *
        FROM booking join registered_passenger on booking.passenger_id=registered_passenger.passenger_id 
        where flight_id=$flight_no AND
        TIMESTAMPDIFF(year, dob, DATE(booking_time))<18 AND
        state=0

        ";
        $stmt1=$this->connect()->prepare($query1);
        $stmt1->execute();
        $array1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
        
        $registered_below_18=count($array1);
        #print_array(count($array1));
        



        $query2="SELECT *
        FROM booking join guest on booking.passenger_id=guest.passenger_id 
        where flight_id=$flight_no AND
        TIMESTAMPDIFF(year, dob, DATE(booking_time))>=18 and
        state=0
        ";
        $stmt2=$this->connect()->prepare($query2);
        $stmt2->execute();
        $array2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
        
        $guest_above_18=count($array2);
        #print_array(count($array2));
        

        $query3="SELECT *
        FROM booking join guest on booking.passenger_id=guest.passenger_id 
        where flight_id=$flight_no AND
        TIMESTAMPDIFF(year, dob, DATE(booking_time))<18 and
        state=0
        ";
        $stmt3=$this->connect()->prepare($query3);
        $stmt3->execute();
        $array3=$stmt3->fetchAll(PDO::FETCH_ASSOC);
        echo"\n";
        $guest_below_18=count($array3);
        #print_array(count($array3));

        $noofpassengers = array("registered_above_18"=>$registered_above_18,
                                "registered_below_18"=>$registered_below_18,
                                "guest_above_18"=>$guest_above_18,
                                "guest_below_18"=>$guest_below_18);
         return $noofpassengers;

    }
    //get no of passenger by destination and time range----->generate reports
    public function getNoPassengerByDaterangeDestination($destination,$starting_date,$ending_date){
       
       $query="SELECT * from booking join flight where booking.flight_id=flight.id 
       and  booking.state=0 and flight.state=0 and departure_date>='$starting_date' and departure_date<='$ending_date'and destination='$destination'";
       $stmt=$this->connect()->prepare($query);
       $stmt->execute();
       $passenger_list=$stmt->fetchAll(PDO::FETCH_ASSOC);
       print_array($passenger_list);
       return $passenger_list;

    }
     //get no of passenger by  time range----->generate reports
     public function getNoPassengerByDaterange($starting_date,$ending_date){
         $query1="SELECT category,count(user_id) FROM booking join registered_passenger where booking.passenger_id=registered_passenger.passenger_id 
         and state=0 and date(booking_time)>='$starting_date' and date(booking_time)<='$ending_date'group by category order by category ";
         $stmt1=$this->connect()->prepare($query1);
         $stmt1->execute();
         $passenger_list=$stmt1->fetchAll(PDO::FETCH_ASSOC);
         


         $query2="SELECT count(booking.passenger_id) as no_of_guest FROM booking join guest where booking.passenger_id=guest.passenger_id 
         and state=0 and date(booking_time)>='$starting_date' and date(booking_time)<='$ending_date'";
         $stmt2=$this->connect()->prepare($query2);
         $stmt2->execute();
         $guest_list=$stmt2->fetchAll(PDO::FETCH_ASSOC);
         
         $x=array_merge($passenger_list,$guest_list);
         return $x;
         
     }
     public function getFlightDeailsByOriginDestination($origin,$destination,$current_date,$current_time){
         $query="SELECT flight.id,destination,origin, count(booking.passenger_id) as no_of_passengerof_flight,flight.state ,flight.id as flight_state 
         from flight join booking where flight.id=booking.flight_id and booking.state=0 and origin='$origin' and destination='$destination'and(departure_date<'$current_date' or(departure_date='$current_date' and departure_time<'$current_time'))
          group by flight.id";
           $stmt=$this->connect()->prepare($query);
          $stmt->execute();
          $details_of_flights=$stmt->fetchAll(PDO::FETCH_ASSOC);
          print_array($details_of_flights);

     }
     public function getRevenueByAircraft($starting_date,$ending_date)
     {
        $query="SELECT sum(ticket_price),model FROM booking join flight on booking.flight_id=flight.id join airplane on airplane.id=flight.airplane_id
        where
        flight.state=0 and booking.state=0 and '$starting_date'<=date(booking_time) and '$ending_date'>=date(booking_time) group by model";
        $stmt=$this->connect()->prepare($query);
        $stmt->execute();
        $renue_list=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print_array($renue_list);
     }

}
// $airline_administrator_model = new Airline_Administrator_Model();
// $details = array(
//     'username'=>'osuracaldera',
//     'email'=>'osuracaldera2009@gmail.com',
//     'hashed_password'=>encryptPassword('abcd'),  // Question
//     'account_type'=>1,
//     'first_name'=>'Osura',
//     'last_name'=>'Thenuka',
//     'airport_code'=>'BIA',
//     'telephone_numbers'=>array('0718949089','0714629179')
// );
// $airline_administrator_model->createAccount($details, $details['account_type']);
?>


