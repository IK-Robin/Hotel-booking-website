<?php

require ('inc/links.php');
require('db/phplinks.php');


$current_booking = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT( CASE WHEN booking_status ='booked' AND `arrival` = 0 THEN 1 END) AS `new_booking`  FROM `book_now`" ));
$unread_user_query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(sr_no) AS `count` FROM `user_query` WHERE `seen` = 0"));


adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>

 
</head>

<body>

<?php require("inc/header.php");  ?>
    <!-- dashbord content  -->
 <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between">
                <h3>Booking Analytics</h3>
                <h6>Shout down mode is active </h6>
            </div>
        </div>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <div class="row">
        <div class="col-lg-3 mb-3">
            <a href="tootal_booking.php" class="text-decoration-none text-success">
                <div class="card p-3 border-0 shadow text-center">
             <h5>       New Booking </h5>
             <h6><?php echo $current_booking['new_booking']; ?></h6>


                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-3">
            <a href="tootal_booking.php" class="text-decoration-none text-prymary">
                <div class="card p-3 border-0 shadow text-center">
             <h5> User Queries </h5>
             <h6><?php echo $unread_user_query['count'] ;?></h6>

                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-3">
            <a href="tootal_booking.php" class="text-decoration-none text-warning">
                <div class="card p-3 border-0 shadow text-center">
             <h5>       Refound Bookings</h5>
             <h6>5</h6>

                </div>
            </a>
        </div>
        <div class="col-lg-3 mb-3">
            <a href="tootal_booking.php" class="text-decoration-none text-Info ">
                <div class="card p-3 border-0 shadow text-center">
             <h5> Rate and Review</h5>
             <h6>5</h6>

                </div>
            </a>
        </div>
        </div>
        </div>
    </div>

    <!-- check booking Analytics -->
    <div class="row ">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between">
                <h3 class="w-100">Booking Analytics</h3>
                 <select name="" id="" class="form-select form-select-sm w-auto shadow-none">
                    <option value="0">All</option>
                    <option value="1">Today</option>
                    <option value="2">Yesterday</option>
                    <option value="7">This Week</option>
                    <option value="30">This Month</option>
                    <option value="365">This Year</option>

                 </select>
            </div>
        </div>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <div class="row">
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-success">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Total Bookings</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
                <h4 class ="mt-2 mb-0">$0</h4>
            </div>
        </a>
       </div>
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-piymary">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Acitve Bookings</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
                <h4 class ="mt-2 mb-0">$0</h4>
            </div>
        </a>
       </div>
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-warning">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Cancel Bookings</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
                <h4 class ="mt-2 mb-0">$0</h4>
            </div>
        </a>
       </div>
     
        </div>
        </div>
    </div>

    <!-- check user query user message  -->
    <div class="row ">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between">
                <h3 class="w-100">User Query</h3>
                 <select name="" id="" class="form-select form-select-sm w-auto shadow-none">
                    <option value="0">All</option>
                    <option value="1">Today</option>
                    <option value="2">Yesterday</option>
                    <option value="7">This Week</option>
                    <option value="30">This Month</option>
                    <option value="365">This Year</option>

                 </select>
            </div>
        </div>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <div class="row">
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-success">
            <div class="card p-3 border-0 shadow text-center">
                <h5> New Ragistation</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
         
            </div>
        </a>
       </div>
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-piymary">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Querys</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
               
            </div>
        </a>
       </div>
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-warning">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Reviews</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
                
            </div>
        </a>
       </div>
     
        </div>
        </div>
    </div>
    <!-- chec active user analatic  -->
    <div class="row ">
    <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <div class="d-flex justify-content-between">
                <h3 class="w-100">User</h3>
                 <select name="" id="" class="form-select form-select-sm w-auto shadow-none">
                    <option value="0">All</option>
                    <option value="1">Today</option>
                    <option value="2">Yesterday</option>
                    <option value="7">This Week</option>
                    <option value="30">This Month</option>
                    <option value="365">This Year</option>

                 </select>
            </div>
        </div>
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <div class="row">
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-success">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Total User</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
         
            </div>
        </a>
       </div>
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-info">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Active user </h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
               
            </div>
        </a>
       </div>
       <div class="col-lg-3 mb-3">
        <a href="tootal_booking.php" class="text-decoration-none text-warning">
            <div class="card p-3 border-0 shadow text-center">
                <h5> Inactive User</h5>
                <h1 class ="mt-2 mb-0"> 0</h1>
                
            </div>
        </a>
       </div>
     
        </div>
        </div>
    </div>
 </div>

    <?php require ("inc/script.php"); ?>
</body>

</html>