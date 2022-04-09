<?php
class Flight_View extends Flight_Model{

    public function getDestinations(){
        $airport_view = new Airport_View();
        return $airport_view->getAirportsFromModel();
    }

    public function getFlightDetailsFromModel(){
        $flight_details=$this->getFlightDetails();
        $flights = array();
        foreach ($flight_details as $flight) {
             $flight_ = new Flight();
             $flight_->setId($flight['id']);
             $flight_->setOrigin($flight['origin']);
             $flight_->setDestination($flight['destination']);
             $flight_->setAirplane_id($flight['airplane_id']);
             $flight_->setBusiness_price($flight['business_price']);
             $flight_->setEconomy_price($flight['economy_price']);
             $flight_->setPlatinum_price($flight['platinum_price']);
             $flight_->setDeparture_time ($flight['departure_time']);
             $flight_->setDeparture_date($flight['departure_date']);
             $flight_->setFlight_time($flight['flight_time']);
             $flight_->setState($flight['state']);

             if($flight_->getState()==0){
                 $flights[]=$flight_;
             }             
        }
        return $flights;
    }

}