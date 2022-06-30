<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Flight_View extends Flight_Model{


    public function getDestinations(){
        $airport_view = new Airport_View();
        return $airport_view->getAirportsFromModel();
    }

    public function getFlightDetailsByFlightIdFromModel($flight_id){
        return $this->getFlightDetailsByFlightId(remove_unnessaries($flight_id));
    }

    public function getFlightDetailsFromModel($destination=null){
        $seat_reservation_controller = new Seat_Reservation_Controller();
        $flight_details=$this->getFlightDetails($destination);
        foreach ($flight_details as $flight) {
   
        
            //check flight['id'] and passenger_id are there in a booking
            if(!$seat_reservation_controller->checkForBookedSeat($flight['id'],$_SESSION['passenger_id'])){
                echo "<tr>";    
                    echo '<td>'.$flight['id'].'</td>';  
                    echo '<td>'.$flight['origin'].'</td>';  
                    echo '<td>'.$flight['destination'].'.</td>';  
                    echo '<td>'.$flight['economy_price'].'</td>';  
                    echo '<td>'.$flight['business_price'].'</td>';
                    echo '<td>'.$flight['platinum_price'].'</td>';  
                    echo '<td>'.$flight['departure_date'].'</td>';  
                    echo '<td>'.$flight['departure_time'].'</td>';
                    echo '<td>'.$flight['flight_time'].'</td>';  
                    echo '<td><button class="button btn btn-primary" onclick="sendFlightId('.$flight['id'].');">Book this Flight</button></td>'; 
                echo "</tr>";    
            }else{
                echo "<tr>";    
                    echo '<td>'.$flight['id'].'</td>';  
                    echo '<td>'.$flight['origin'].'</td>';  
                    echo '<td>'.$flight['destination'].'.</td>';  
                    echo '<td>'.$flight['economy_price'].'</td>';  
                    echo '<td>'.$flight['business_price'].'</td>';
                    echo '<td>'.$flight['platinum_price'].'</td>';  
                    echo '<td>'.$flight['departure_date'].'</td>';  
                    echo '<td>'.$flight['departure_time'].'</td>';
                    echo '<td>'.$flight['flight_time'].'</td>';  
                    echo '<td><button class="button btn btn-danger" disabled >BOOKED</button></td>'; 
                echo "</tr>";
            }
           

            
            
            //else

        }
        // return $flights;
    }

}
// $fv = new Flight_View();
// print_array($fv->getDestinations());