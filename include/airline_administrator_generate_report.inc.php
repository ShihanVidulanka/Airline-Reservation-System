

<?php 

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";

session_start();
$controller=new Airline_Administrator_Controller();

//report 1---completed
if (isset($_POST['get_no_passenger_by_flightno'])){
    
    $flight_no=$_POST['FlightNumber1'] ;
    $description= "Number of passengers in flight no  ". $flight_no.":\n" ;
    echo "Number of passengers in flight no ". $flight_no.":\n" ;
    echo '<br>';
    $y=$controller->get_no_passenger_by_flightno($flight_no);  
    
    echo $y["registered_above_18"];

    //header("Location: ../airline_administrator_view_generated_report.php?case=1&output=".$y); 
    echo 
        '<form action="../airline_administrator_view_generated_report.php" method="post"> 
            <input type="hidden" name="case" value=1>
            <input type="hidden" name="description" value="'.$description.'">
            <input type="hidden" name="registered_above_18" value="'.$y["registered_above_18"].'">
            
            <input type="hidden" name="registered_below_18" value="'.$y["registered_below_18"].'">
            <input type="hidden" name="guest_above_18" value="'.$y["guest_above_18"].'">
            <input type="hidden" name="guest_below_18" value="'.$y["guest_below_18"].'">
        </form>';  ?>
        <script>
          document.getElementsByTagName('form')[0].submit()
        </script>

        <?php
            print_array($y);
    



 
      
}
//report 2---completed
if(isset($_POST['get_no_passenger_by_daterange_destination'])){
    $destination=$_POST['destination2'];
    $starting_date=$_POST['startingdate2'];
    $ending_date=$_POST['endingdate2'];
    
    $passenger_list=$controller->get_no_passenger_by_daterange_destination($destination,$starting_date,$ending_date);
    echo 'Number of passengers to '. $destination . ' from '. $starting_date . ' to ' . $ending_date . '   :   '. sizeof($passenger_list);
    $description='Number of passengers to '. $destination . ' from '. $starting_date . ' to ' . $ending_date . '   :   ';
    $numOfPassenger=sizeof($passenger_list);
    echo 
        '<form action="../airline_administrator_view_generated_report.php" method="post"> 
            <input type="hidden" name="case" value=2>
            <input type="hidden" name="description" value="'.$description.'">
            <input type="hidden" name="numOfPassenger" value="'.$numOfPassenger.'">
            

        </form>';  ?>
        <script>
          document.getElementsByTagName('form')[0].submit()
        </script>
        <?php
    
}
//report --3 complete
if(isset($_POST['get_no_passenger_by_daterange'])){
    $starting_date=$_POST['startingdate3'];
    $ending_date=$_POST['endingdate3'];
   
    $passenger_list=$controller->get_no_passenger_by_daterange($starting_date,$ending_date); 
    $serialized_passenger_list = serialize($passenger_list);
    $description="Passenger Count from ".$starting_date. " to ".$ending_date;
    print_array($passenger_list);
    echo 
        '<form action="../airline_administrator_view_generated_report.php" method="post"> 
            <input type="hidden" name="case" value=3>
            <input type="hidden" name="description" value="'.$description.'">
            <input type="hidden" name="passengerList" value="'.htmlspecialchars(json_encode($passenger_list)).'">
            

        </form>';  ?>
        <script>
          document.getElementsByTagName('form')[0].submit()
        </script>
        <?php   
    
}
//report --4
if(isset($_POST['flight_details_by_origin_destination'])){
    $origin=$_POST['origin4'];
    $destination=$_POST['destination4'];
    //header("Location: ../airline_administrator_view_generated_report.php");

    $flight_details=$controller->get_flight_details_by_origin_destination($origin,$destination);
   print_array($flight_details);
    $description='All the flights from '.$origin.' to '.$destination;
    echo 
        '<form action="../airline_administrator_view_generated_report.php" method="post"> 
            <input type="hidden" name="case" value=4>
            <input type="hidden" name="description" value="'.$description.'">
            <input type="hidden" name="flight_details" value="'.htmlspecialchars(json_encode($flight_details)).'">
            

        </form>';  
        ?>
        <script>
            document.getElementsByTagName('form')[0].submit()
        </script>
        <?php   
}
if(isset($_POST['get_revenue_by_aircraft'])){
    $starting_date=$_POST['startingdate5'];
    $ending_date=$_POST['endingdate5'];
    
    $revenue_by_aircraft=$controller->get_revenue_by_aircraft($starting_date,$ending_date);
    $description='Total revenue of the aircrafts from '. $starting_date. ' to ' . $ending_date . ': ';
    print_array($revenue_by_aircraft);
    echo 
    '<form action="../airline_administrator_view_generated_report.php" method="post"> 
        <input type="hidden" name="case" value=5>
        <input type="hidden" name="description" value="'.$description.'">
        <input type="hidden" name="revenue_by_aircrafts" value="'.htmlspecialchars(json_encode($revenue_by_aircraft)).'">
        

    </form>';  
    ?>
    <script>
        document.getElementsByTagName('form')[0].submit()
    </script>
    <?php 

}

?>





<script type="text/javascript">

</script>