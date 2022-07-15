<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

class Guest_Seat_Reservation_Controller extends Guest_Seat_Reservation_Model
{
    public function reserveSeatFromModel($details)
    {
        $booking = new Booking();
        $booking->setFlight_id($details['flight_id']);
        $booking->setPassenger_id($details['passenger_id']);
        $booking->setTicket_price($details['ticket_price']);
        $booking->setSeat_no($details['seat_no']);
        $booking->setSeat_type($details['seat_type']);
        $booking->setState($details['state']);

        $seat_reservation_view = new Seat_Reservation_View();
        $reserved_seats = $seat_reservation_view->getReservedSeatsFromModel($_POST['flight_id']);

        if (in_array($details['seat_no'], $reserved_seats)) {
            // header('Location:../guest_flight_booking.php?error=alreadyBooked');
            echo($details['seat_no']);
//            print_array($reserved_seats);
        }
         else {
             $this->reserveSeat($booking);
         }
    }
    public function checkForBookedSeat($flight_id, $passenger_id)
    {
        return $this->checkForBookedSeatFromModel(remove_unnessaries($flight_id), remove_unnessaries($passenger_id));
    }
    public function checkForRegularCustomer()
    {
        if ($this->checkForRegularCustomerFromMOdel() == 1) {
            return true;
        }
        return false;
    }
}
