

<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

session_start();

if (isset($_POST['get_no_passenger_by_flightno'])){
    $controller=new Airline_Administrator_Controller();
    $flight_no=$_POST['FlightNumber1'] ;
    echo "number of passengers in flight no". $flight_no.":\n" ;
    echo '<br>';
    $y=$controller->get_no_passenger_by_flightno($flight_no);                           
    print_array($y);



 
      
}
if(isset($_POST['get_no_passenger_by_daterange_destination'])){
    $destination=$_POST['destination2'];
    $starting_date=$_POST['startingdate2'];
    $ending_date=$_POST['endingdate2'];
    $controller=new Airline_Administrator_Controller();
    $passenger_list=$controller->get_no_passenger_by_daterange_destination($destination,$starting_date,$ending_date);
    echo 'no of passengers to '. $destination . ' from '. $starting_date . ' to ' . $ending_date . '   :   '. sizeof($passenger_list);
}
if(isset($_POST['get_no_passenger_by_daterange'])){
    $starting_date=$_POST['startingdate3'];
    $ending_date=$_POST['endingdate3'];
    $controller=new Airline_Administrator_Controller();
    $passenger_list=$controller->get_no_passenger_by_daterange($starting_date,$ending_date); 
    print_array($passenger_list);   
    
}
if(isset($_POST['get_no_passenger_by_daterange_destination'])){
    
}
if(isset($_POST['get_no_passenger_by_daterange_destination'])){
    
}

?>





<script type="text/javascript">

</script>