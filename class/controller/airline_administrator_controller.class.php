<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Airline_Administrator_Controller extends Airline_Administrator_Model{
    public function createFlightDispatcherFromModel(Flight_Dispatcher $flight_Dispatcher){
        $details = array(
            'username'=>remove_unnessaries($flight_Dispatcher->getUsername()),
            'hashed_password'=>encryptPassword("abcd"),  
            'account_type'=>2,
            'first_name'=>remove_unnessaries($flight_Dispatcher->getFirstName()),
            'last_name'=>remove_unnessaries($flight_Dispatcher->getLastName()),
            'email'=>remove_unnessaries($flight_Dispatcher->getEmail()),
            'airport_code'=>remove_unnessaries($flight_Dispatcher->getAirportCode()),
            'telephone_numbers'=>$flight_Dispatcher->getTelephoneNo()
        );
        $this->createAccount($details, $details['account_type']);
    }

    public function createOperationsAgentFromModel(Operations_Agent $operations_Agent){
        $details = array(
            'username'=>remove_unnessaries($operations_Agent->getUser_name()),
            'hashed_password'=>encryptPassword("abcd"),
            'account_type'=>1,
            'first_name'=>remove_unnessaries($operations_Agent->getFirst_name()),
            'last_name'=>remove_unnessaries($operations_Agent->getLast_name()),
            'email'=>remove_unnessaries($operations_Agent->getEmail()),
            'state'=>remove_unnessaries($operations_Agent->getState()),
            'airport_code'=>remove_unnessaries($operations_Agent->getAirport_code()),
            'telephone_numbers'=>$operations_Agent->getTelephone_nos()
        );

        $this->createAccount($details, $details['account_type']);
    }

    public function checkUsernameFromModel($username) {
        $this->check_username(remove_unnessaries($username, 1));
    }

    //get airplane details using tail_no or return null if empty
    public function getAirplaneDetails($tail_no){
        return $this->getAirplaneDetailsFromModel($tail_no);
    }
    
    public function addNewAirplane($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats, $image, $file_type){
        $this->addNewAirplaneFromModel($tail_no, $model, $no_platinum_seats, $no_economy_seats, $no_business_seats, $image, $file_type);
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
