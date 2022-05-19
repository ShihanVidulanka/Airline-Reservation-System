<?php

// include_once('./class/model/login_model.class.php');
require_once $_SERVER['DOCUMENT_ROOT'] . "/Airline-Reservation-System/include/autoloader.inc.php";
session_start();

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    return;
}

$view = new Airline_Administrator_View();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/flight_dispatcher_add_new_flight.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>AView Generated Report</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">B Airline</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_generate_report.php">Generate Reports</Details></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_create_user.php">Create User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="airline_administrator_view_user.php">View User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="airline_administrator_add_new_airplane.php">Add New Airplane</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="include/logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-5">
        <div class="wrapper p-3">
            <h1 id="heading" class="mb-4">Report</h1>
            <?php 
                $report_num= $_POST['case'];
                $description=$_POST['description'];
                echo '<h4>'. $description.'</h4>';
//================report 1=========================================================
                if($report_num==1){
                    // echo "no of registered passengers above 18 ->". $_POST['registered_above_18']."<br>";
                    // echo "no of registered passengers below 18 ->".$_POST['registered_below_18']."<br>";
                    // echo "no of guest passengers above 18 ->".$_POST['guest_above_18']."<br>";
                    // echo "no of guest passengers above 18 ->".$_POST['guest_below_18']."<br>";
                    
                    $registered_above_18= intval($_POST['registered_above_18']);
                    $registered_below_18= intval($_POST['registered_below_18']);
                    $guest_above_18= intval($_POST['guest_above_18']);
                    $guest_below_18= intval($_POST['guest_below_18']);
                    $tot_passenger=$registered_above_18+$registered_below_18+$guest_above_18+$guest_below_18;
                    $chart_array=[
                        ['passenger type','number of passenger'],
                        ['registered_above_18', $registered_above_18],
                        ['registered_below_18',$registered_below_18],
                        ['guest_above_18',$guest_above_18],
                        ['guest_below_18',$guest_below_18]
                        
                    
                    ];
                    echo '<table class="table table-striped">';
                    echo '<tbody>';
                    foreach($chart_array as $passenger_type){
                        echo '<tr>';
                        echo '<td>' . $passenger_type[0]. "</td>";
                        echo '<td>' . $passenger_type[1]. "</td>";
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo '<td>' . 'totoal passengers'. "</td>";
                    echo '<td>' . $tot_passenger. "</td>";
                    echo '</tr>';
                    echo '</tbody></table>'
                    ?>
                    
                    <div id="myChart" style="width:100%; "></div>
                    <script>
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable(<?php echo(json_encode($chart_array)); ?>);

                    var options = {
                    title:<?php echo(json_encode($description)); ?>
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);
                    }
                    </script>
                    <?php
                    
                }
//=========================report 2============================================
                elseif ($report_num==2){
                    echo '<h4>'.$_POST['numOfPassenger'].'</h4>';

                }
//======================report 3===========================================
                elseif ($report_num==3){
                    $passengerList=json_decode(htmlspecialchars_decode($_POST['passengerList']));
                    //print_array($passengerList);
                    $chart_array=[['type of passenger','number of passenger']];
                    $tot_passenger=0;
                    foreach($passengerList  as $obj){
                        $status = $obj->category;
                        $count=intval($obj->count);
                        $tot_passenger+=$count;
                        
                        if($status=='0')
                            array_push($chart_array,['normal passenger',$count]);
                        elseif($status=='1')
                            array_push($chart_array,['frequent passenger',$count]);
                        elseif($status=='2')
                            array_push($chart_array,['gold passenger',$count]);
                        else
                            array_push($chart_array,['guest passenger',$count]);
                        
                    }
                    echo '<table class="table table-striped">';
                    echo '<tbody>';
                    foreach($chart_array as $passenger_type){
                        echo '<tr>';
                        echo '<td>' . $passenger_type[0]. "</td>";
                        echo '<td>' . $passenger_type[1]. "</td>";
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo '<td>' . 'totoal passengers'. "</td>";
                    echo '<td>' . $tot_passenger. "</td>";
                    echo '</tr>';
                    echo '</tbody></table>'
                    ?>
                    <div id="myChart" style="width:100%; "></div>
                    <script>
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable(<?php echo(json_encode($chart_array)); ?>);

                    var options = {
                    title:<?php echo(json_encode($description)); ?>
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);
                    }
                    </script>
                    <?php
                    
                }
//======================report 4======================================
                elseif ($report_num==4){
                    $flight_list=json_decode(htmlspecialchars_decode($_POST['flight_details']));
                   // print_array($flight_list);
                    $chart_array=[['Flight No','Number of Passengers']];
                    $arrived_flight=0;$not_arrived_flight=0;$cansel_flgiht=0;
                    echo '<table class="table table-striped">';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>' . 'Flight ID'. "</td>";
                    echo '<td>' . 'Destination'. "</td>";
                    echo '<td>' . 'Origin'. "</td>";
                    echo '<td>' . 'num of Passenger'. "</td>";
                    echo '<td>' . 'Flight State'. "</td>";
                    echo '</tr>';
                    foreach($flight_list as $fligh){
                        $flight=get_object_vars($fligh);
                        echo '<tr>';
                        echo '<td>' . $flight['id']. "</td>";
                        echo '<td>' . $flight['destination']. "</td>";
                        echo '<td>' . $flight['origin']. "</td>";
                        echo '<td>' . $flight['no_of_passengerof_flight']. "</td>";
                        if($flight['state']=='0') {
                            echo '<td>' . 'Not Arrived'. "</td>";
                            $not_arrived_flight+=1;
                        }
                        elseif($flight['state']==1){
                            echo '<td>' . 'Cancelled'. "</td>";
                            $cansel_flgiht+=1; 
                        }
                        elseif($flight['state']==2){
                            echo '<td>' . 'Arrived'. "</td>";
                            $arrived_flight+=1;
                        }
                        array_push($chart_array,['filght no '.$flight['id'],intval($flight['no_of_passengerof_flight'])]);
                        echo '</tr>';
                    }
                    
                    echo '</tbody></table>';
                    echo '<hr><hr>';
                    $chart_array2=[
                        ['Flight State','Number of Flight'],
                        ['Arrived Flight',$arrived_flight],
                        ['Not Arrived Flight',$not_arrived_flight],
                        ['Canceled Flight',$cansel_flgiht]
                    ];
                    echo ' <table class="table table-striped">
                            <tbody>';
                            foreach($chart_array2 as $row){
                                echo '<tr>';echo '<td>'.$row[0].'</td>';echo '<td>'.$row[1].'</td>';echo'</tr>';
                                }
                    echo '</tbody></table>';
                   // print_array($chart_array2);
                    ?>
                    <div id="myChart1" style="width:100%; "></div>
                    <div id="myChart2" style="width:100%; "></div>
                    <div id="Sarah_chart_div" style="width: 500px; ;"></div>
                    <div id="Anthony_chart_div" style="width:100%;"></div>
                    <script>
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawSarahChart);
                        google.charts.setOnLoadCallback(drawAnthonyChart);

                        function drawSarahChart() {
                            var data = new google.visualization.arrayToDataTable(<?php echo(json_encode($chart_array)); ?>);
                            var options = {title:'Number of Passengers By Flight ID '}; 
                            var chart = new google.visualization.BarChart(document.getElementById("myChart1"));
                            chart.draw(data, options);
                        }

                        
                        function drawAnthonyChart() {
                            var data = new google.visualization.arrayToDataTable(<?php echo(json_encode($chart_array2)); ?>);
                            var options = {title:'States of the Flights '};
                            var chart = new google.visualization.PieChart(document.getElementById("myChart2"));
                            chart.draw(data, options);
                        }
                    </script>
                    <?php
                   
                    
                }


//===============================================report 5=======================================================================================
                elseif ($report_num==5){
                    $revenue_by_aircrafts=json_decode(htmlspecialchars_decode($_POST['revenue_by_aircrafts']));
                    //print_array($revenue_by_aircrafts);
                    $chart_array=[['Aircraft name','Total Revenue']];
                    $tot_revenue=0;
                    echo '<table class="table table-striped">';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>' . 'Aircraft type'. "</td>";
                    echo '<td>' . 'Total revenue'. "</td>";
                    
                    echo '</tr>';
                    foreach($revenue_by_aircrafts as $aircrafts){
                        $aircraft=get_object_vars($aircrafts);
                        echo '<tr>';
                        echo '<td>' . $aircraft['model']. "</td>";
                        echo '<td>' . $aircraft['sum(ticket_price)']. "</td>";
                        echo '<tr>';
                        $tot_revenue+=$aircraft['sum(ticket_price)'];
                        array_push($chart_array,[$aircraft['model'],intval($aircraft['sum(ticket_price)'])]);
                    }
                    echo '<tr>';
                    echo '<td>' . 'Total Revenue'. "</td>";
                    echo '<td>' . $tot_revenue. "</td>";
                    echo '<tr>';
                    echo '</tbody></table>';

                    ?>
                    <div id="myChart" style="width:100%;"></div>
                    <script>
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable(<?php echo(json_encode($chart_array)); ?>);

                    var options = {
                    title:<?php echo(json_encode($description)); ?>
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                    chart.draw(data, options);
                    
                }
                    </script>
                    <?php
                   
                    
                }
                    

?>         
            
        </div>

    </div>

    

</body>

</html>
