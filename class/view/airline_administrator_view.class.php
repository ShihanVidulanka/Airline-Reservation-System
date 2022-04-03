<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Airline_Administrator_View extends Airline_Administrator_Model{
    private $administrator;
    private $administrator_controller;

    public function __construct()
    {
        //create administrator object later
        $this->administrator_controller = new Airline_Administrator_Controller();
        
    }

    public function showError($error)
    {
        if ($error == 'SUCCESS'){
            echo '<div class="alert alert-success" role="alert">';
            echo "<p>Successfully Added</p>";
            echo '</div>';
        } 
        else{
            echo '<div class="alert alert-danger" role="alert">';
            echo "<p>{$error}</p>";
            echo '</div>';
        } 
    }


}
?>