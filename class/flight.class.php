<?php
class Flight{
    private $id;
    private $origin;
    private $destination;
    private $airplane_id;
    private $business_price;
    private $economy_price;
    private $platinum_price;
    private $departure_time;
    private $departure_date;
    private $flight_time;
    private $state;
    
	
	function getId() {
		return $this->id;
	}
	
	
	function setId($id){
		$this->id = $id;
	}
	
	
	function getOrigin() {
		return $this->origin;
	}
	

	function setOrigin($origin){
		$this->origin = $origin;
	}
	
	
	function getDestination() {
		return $this->destination;
	}
	

	function setDestination($destination){
		$this->destination = $destination;
	}
	
	
	function getAirplane_id() {
		return $this->airplane_id;
	}
	

	function setAirplane_id($airplane_id){
		$this->airplane_id = $airplane_id;
	}
	
	
	function getBusiness_price() {
		return $this->business_price;
	}
	

	function setBusiness_price($business_price){
		$this->business_price = $business_price;
	}
	
	
	function getEconomy_price() {
		return $this->economy_price;
	}
	

	function setEconomy_price($economy_price){
		$this->economy_price = $economy_price;
	}
	
	
	function getPlatinum_price() {
		return $this->platinum_price;
	}
	

	function setPlatinum_price($platinum_price){
		$this->platinum_price = $platinum_price;
	}
	
	
	function getDeparture_time() {
		return $this->departure_time;
	}
	

	function setDeparture_time($departure_time){
		$this->departure_time = $departure_time;
	}
	
	
	function getDeparture_date() {
		return $this->departure_date;
	}
	

	function setDeparture_date($departure_date){
		$this->departure_date = $departure_date;
	}
	
	
	function getFlight_time() {
		return $this->flight_time;
	}
	
	
	function setFlight_time($flight_time){
		$this->flight_time = $flight_time;
	}
	
	
	function getState() {
		return $this->state;
	}
	

	function setState($state){
		$this->state = $state;
	}
}