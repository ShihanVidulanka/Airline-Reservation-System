<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";


    class Operation_Agent_View extends Operation_Agent_Model{
        private $operation_agent;
        private $operation_agent_controller;

        public function __construct()
        {
            $this->operation_agent= new Operations_Agent($_SESSION["username"],$_SESSION["ID"],
            $_SESSION["first_name"] ,$_SESSION["last_name"], $_SESSION['state'],$_SESSION['airport_code'],$_SESSION['TP_no']);
            
            $this->operation_agent_controller= new Operation_Agent_Controller();
        }

        public function getHomeDetails(){
            $details = array(
                "ID" => $this->getOperationAgentNo($this->operation_agent->getUser_id()),
                "first_name" => $this->operation_agent->getFirst_name(),
                "second_name"=>$this->operation_agent->getSecond_name(),
                "username" => $this->operation_agent->getUser_name(),
                "airport_name" => $this->getAirportName($this->operation_agent->getAirport_Code()),
                "telephone_numbers" =>  $this->formatTelephoneNos($this->operation_agent->getTelephone_nos()),
                "state"=>$this->operation_agent->getState()
            );
            return $details;

        }
        public function formatTelephoneNos($telephoneNosArray){
            $string=implode("<br>",$telephoneNosArray);
            return $string;
        }

        public function showPassengers(){
            $passenger_details=$this->operation_agent_controller->getPassenger_details();
            return $passenger_details;
        }
    }
?>