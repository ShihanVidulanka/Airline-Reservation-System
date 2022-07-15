<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

if (isset($_POST['passportNo_flightid'])){
    $result = explode("_",$_POST['passportNo_flightid']);
    // print_array($result);
    $guest_seat_reservation_controller=new Guest_Seat_Reservation_Controller;
    $guest_seat_reservation_controller->checkPassportNoFromModel($result[0],$result[1]);
}

if(isset($_POST['seatno-flightid'])){
    $post = explode('-',$_POST['seatno-flightid']);
    $seat_reservation_view = new Seat_Reservation_View();
    $reserved_seats = $seat_reservation_view->getReservedSeatsFromModel($post[1]);
    if(in_array($post[0],$reserved_seats)){
        echo 'alreadybooked';
    }else{
        echo 'success';
    }
}

if(isset($_POST['flight_id'])){
    // print_array($_POST);
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $passport_number=$_POST['passport_number'];
    $dob=$_POST['dob'];
    $telephone=$_POST['telephone'];
    $email=$_POST['email'];

    if (!isset($_SESSION['passenger_id'])) {
        $guest = new Guest();
        $guest->setFirst_name($first_name);
        $guest->setLast_name($last_name);
        $guest->setPassport_number($passport_number);
        $guest->setDob($dob);
        $guest->setPhone_no($telephone);
        $guest->setEmail($email);

        $guest_controller = new Guest_Controller();
        $guest_controller->createGuestFromModel($guest);
    }

    $details=array(
        'passenger_id'=>$_SESSION['passenger_id'],
        'flight_id'=>$_POST['flight_id'],
        'ticket_price'=>$_POST['ticket_price'],
        'seat_no'=>$_POST['seat_no'],
        'seat_type'=>$_POST['seat_type'],
        'state'=>2
    );
    $seat_reservation_controller = new Guest_Seat_Reservation_Controller();
    $seat_reservation_controller->reserveSeatFromModel($details);
}