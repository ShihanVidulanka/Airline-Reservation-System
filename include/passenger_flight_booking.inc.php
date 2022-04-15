<?php
  require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

  // print_array($_POST);

  if(isset($_POST['destination'])){
      $flight_view = new Flight_View();
      $flight_view->getFlightDetailsFromModel($_POST['destination']);
  }