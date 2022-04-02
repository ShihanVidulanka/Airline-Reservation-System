<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

//Used flight_dispatcher.class.php created by Sathira I think.
class AirlineAdministrator_Controller extends AirlineAdministrator_Model{
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