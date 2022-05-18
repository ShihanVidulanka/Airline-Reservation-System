

<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

session_start();
$controller=new Airline_Administrator_Controller();
if (isset($_POST['get_no_passenger_by_flightno'])){
    
    $flight_no=$_POST['FlightNumber1'] ;
    echo "number of passengers in flight no". $flight_no.":\n" ;
    echo '<br>';
    $y=$controller->get_no_passenger_by_flightno($flight_no);  
    $Array=array(1,2,3);
    //header("Location: ../airline_administrator_view_generated_report.php?case=1&output=".$y); 
    echo 
        '<form action="../airline_administrator_view_generated_report.php" method="post"> 
            <input type="hidden" name="case" value=1>
            <input type="hidden" name="CourseID" value="'.$Array[0].'">
            <input type="hidden" name="CourseID2" value="'.$Array[1].'">
            <input type="hidden" name="CourseID3" value="'.$Array[2].'">
        </form>';  ?>
        <script>
            document.getElementsByTagName('form')[0].submit()
        </script>

        <?php
            print_array($y);
    



 
      
}
if(isset($_POST['get_no_passenger_by_daterange_destination'])){
    $destination=$_POST['destination2'];
    $starting_date=$_POST['startingdate2'];
    $ending_date=$_POST['endingdate2'];
    
    $passenger_list=$controller->get_no_passenger_by_daterange_destination($destination,$starting_date,$ending_date);
    echo 'no of passengers to '. $destination . ' from '. $starting_date . ' to ' . $ending_date . '   :   '. sizeof($passenger_list);
}
if(isset($_POST['get_no_passenger_by_daterange'])){
    $starting_date=$_POST['startingdate3'];
    $ending_date=$_POST['endingdate3'];
   
    $passenger_list=$controller->get_no_passenger_by_daterange($starting_date,$ending_date); 
    print_array($passenger_list);   
    
}
if(isset($_POST['flight_details_by_origin_destination'])){
    $origin=$_POST['origin4'];
    $destination=$_POST['destination4'];
    //header("Location: ../airline_administrator_view_generated_report.php");

    $flight_details=$controller->get_flight_details_by_origin_destination($origin,$destination);
}
if(isset($_POST['get_revenue_by_aircraft'])){
    $starting_date=$_POST['startingdate5'];
    $ending_date=$_POST['endingdate5'];
    
    $revenue_by_aircraft=$controller->get_revenue_by_aircraft($starting_date,$ending_date);

}

?>





<script type="text/javascript">

</script>