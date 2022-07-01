<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Seat_Reservation_View extends Seat_Reservation_Model{

    public function getPlaneDetailsFromModel($flight_id){
        $details = $this->getPlaneDetails(remove_unnessaries($flight_id));

        $airplane = new AirPlane();
        $airplane->setId($details['id']);
        $airplane->setTail_no($details['model']);
        $airplane->setNo_platinum_seats($details['no_platinum_seats']);
        $airplane->setNo_economy_seats($details['no_economy_seats']);
        $airplane->setNo_business_seats($details['no_business_seats']);
        $airplane->setImage($details['image']);
        $airplane->setFile_type($details['file_type']);
        return $airplane;
    }

    public function getReservedSeatsFromModel($flight_id){
        $reserved = $this->getReservedSeats(remove_unnessaries($flight_id));
        return $reserved;
    }
    public function getBookedFlightDestinationsFromModel($passenger_id){
        return $this->getBookedFlightDestinations(remove_unnessaries($passenger_id));
    }

    public function getBookedFlightDetailsFromModel($passenger_id,$dest){
        $tcontent =  $this->getBookedFlightDetails(remove_unnessaries($passenger_id),remove_unnessaries($dest));

        foreach ($tcontent as $flight) {
            echo "
                                <tr>
                                    <td>{$flight['airplane']}</td>

                                    <td>{$flight['origin']}</td>
                                    <td>{$flight['destination']}</td>
                                    <td>{$flight['seat_type']}</td>
                                    <td>{$flight['ticket_price']}</td>
                                    <td>{$flight['departure_date']}</td>
                                    <td>{$flight['departure_time']}</td>
                                    <td><button onclick=\"cancel_booking('{$flight['id']}');\" class='btn btn-danger'>Cancel Booking</button></td>
                                </tr>

                            ";
        }
    }
}
// $seat_reservation_view = new Seat_Reservation_View();
// print_array($seat_reservation_view->getBookedFlightDetailsFromModel(1));