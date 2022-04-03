<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

//Used flight_dispatcher.class.php created by Sathira I think.
class Airline_Administrator_Controller extends Airline_Administrator_Model{
    public function createFlightDispatcherFromModel(Flight_Dispatcher $flight_Dispatcher){
        $details = array(
            'username'=>remove_unnessaries($flight_Dispatcher->getUsername()),
            'hashed_password'=>"abcd",  // Question
            'account_type'=>2,
            'first_name'=>remove_unnessaries($flight_Dispatcher->getFirstName()),
            'last_name'=>remove_unnessaries($flight_Dispatcher->getLastName()),
            'airport_code'=>remove_unnessaries($flight_Dispatcher->getAirportCode()),
            'telephone_numbers'=>$flight_Dispatcher->getTelephoneNo()
        );
        $this->createAccount($details, $details['account_type']);
    }

    public function createOperationsAgentFromModel(Operations_Agent $operations_Agent){
        $details = array(
            'username'=>remove_unnessaries($operations_Agent->getUsername()),
            'hashed_password'=>"abcd",  // Question
            'account_type'=>1,
            'first_name'=>remove_unnessaries($operations_Agent->getFirstName()),
            'last_name'=>remove_unnessaries($operations_Agent->getLastName()),
            'state'=>remove_unnessaries($operations_Agent->getState()),
            'airport_code'=>remove_unnessaries($operations_Agent->getAirportCode()),
            'telephone_numbers'=>$operations_Agent->getTelephoneNo()
        );

        $this->createAccount($details, $details['account_type']);
    }

    public function checkUsernameFromModel($username) {
        $this->check_username(remove_unnessaries($username, 1));
    }

    
    public function addNewAirplane($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats){
        $this->addNewAirplaneFromModel($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats);
    }
    
    public function validateAddNewAirplane($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats){
        if (strpos($tail_no, '-')==false) {
            $error = "Invalid Tail No: Should Contain '-' character";
        }elseif (is_numeric($no_platinum_seats) == false || $no_platinum_seats < 0 || $no_platinum_seats>900) {
            $error = 'Invalid Economy Seat Price';
        } elseif (is_numeric($no_economy_seats) == false || $no_economy_seats < 0 || $no_economy_seats>900) {
            $error = 'Invalid Economy Seat Price';
        } elseif (is_numeric($no_business_seats) == false || $no_business_seats < 0 || $no_business_seats>900) {
            $error = 'Invalid Economy Seat Price';
        } else {
            $tail_splitted = explode("-",$tail_no);
            if(!ctype_upper($tail_splitted[0]) || !ctype_digit($tail_splitted[1])){
                $error = 'Incorrect Format: Tail No. should be like AZ-3245'; 
            }elseif (count($tail_splitted)!=2 || strlen($tail_splitted[0])>2 || strlen($tail_splitted[0])<0 || strlen($tail_splitted[1])!=4) {
                $error = 'Invalid Tail No. Length';
            }
            else{
                $error = 'SUCCESS';
                $this->addNewAirplane($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats);
            }
        }
        echo $error;
        return $error;
    }

}

// class CreateOperationsAgent_Ccontroller extends CreateOperartionsAgent_Model{
//     public function createOperationsAgentFromModel(Operations_Agent $operations_Agent){
//         $details = array(
//             'username'=>remove_unnessaries($operations_Agent->getUsername()),
//             'hashed_password'=>"abcd",  // Question
//             'account_type'=>2,
//             'first_name'=>remove_unnessaries($operations_Agent->getFirstName()),
//             'last_name'=>remove_unnessaries($operations_Agent->getLastName()),
//             'state'=>remove_unnessaries($operations_Agent->getState()),
//             'airport_code'=>remove_unnessaries($operations_Agent->getAirportCode()),
//             'telephone_numbers'=>$operations_Agent->getTelephoneNo()
//         );

//         $this->createOperationsAgent($details);
//     }

//     public function checkUsernameFromModel($username) {
//         $this->check_username(remove_unnessaries($username, 1));
//     }
// }
?>