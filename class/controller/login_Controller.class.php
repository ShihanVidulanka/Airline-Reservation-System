<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";


class Login_Controller extends Login_Model
{
    private $username;
    private $password;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser()
    {
        // check for all the errors using the helper functions
        if ($this->checkEmptyField() == false) {
            // error msg here
            header("location: login.php?error=emptyfield");
            exit();
        }

        $userTypeVal = $this->getUser($this->username, $this->password);

        switch ($userTypeVal) { // Complete this wthen users are done
            case '0':
                header("location: airline_administrator_home.php");
                break;
            case '1':
                header("location: operation_agent_home.php");
                break;
            case '2':
                header("location: flight_dispatcher_home.php");
                break;
            case '3':
                header("location: main_page.php");
                break;
            default:
                header("location: login.php?error=userNotfound");
                break;
        }
    }

    // Error handling methods
    private function checkEmptyField()
    {
        // check if username and password empty.     
        if (empty($this->username) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
