<?php

require('inc/links.php');
require('db/phplinks.php');



adminLogin();

// featch data form db booking status 

// select all form booking data 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User </title>

    <link rel="stylesheet" href="css/booking_chart.css">

</head>

<body>
<?php require ("inc/header.php"); ?>
    <!-- dashbord content  -->
    
            <div class="col-lg-10 ms-auto p-4 ">
                <h4>Booking Chart</h4>

                <!-- create the chart  -->
                <div>
                    <select id="month-selector" onchange="changeMonth()"></select>
                </div>

                <div class="gantt_container">
                    <div id="gantt_tooltip"></div>

                    <div class="table-wrapper">
                        <table id="gantt-chart"></table>
                    </div>
                </div>



            </div>










        </div>
    </div>
    </div>

    <script src="js/booking-chart.js"></script>

</body>

</html>