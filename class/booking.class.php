<?php
class Booking{
    private $flight_id;
    private $passenger_id;
    private $booking_time;
    private $ticket_price;
    private $seat_no;
    private $seat_type;
    private $state;

	function getFlight_id() {
		return $this->flight_id;
	}
	
	
	function setFlight_id($flight_id) {
		$this->flight_id = $flight_id;
	}
	

	function getPassenger_id() {
		return $this->passenger_id;
	}
	
	
	function setPassenger_id($passenger_id) {
		$this->passenger_id = $passenger_id;
	}
	

	function getBooking_time() {
		return $this->booking_time;
	}
	
	
	function setBooking_time($booking_time) {
		$this->booking_time = $booking_time;
	}
	

	function getTicket_price() {
		return $this->ticket_price;
	}
	
	
	function setTicket_price($ticket_price) {
		$this->ticket_price = $ticket_price;
	}
	

	function getSeat_no() {
		return $this->seat_no;
	}
	
	
	function setSeat_no($seat_no) {
		$this->seat_no = $seat_no;
	}
	

	function getSeat_type() {
		return $this->seat_type;
	}
	
	
	function setSeat_type($seat_type) {
		$this->seat_type = $seat_type;
	}
	

	function getState() {
		return $this->state;
	}
	
	
	function setState($state) {
		$this->state = $state;
	}
}