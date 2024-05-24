<?php
require ('../db/phplinks.php');
date_default_timezone_set('Asia/Dhaka');

// Start the session at the beginning
session_start();

if (isset($_POST['check_date'])) {
    $frm_data = filtaration($_POST);
    $status = "";
    $result = "";

    $today_date = new DateTime(date("Y-m-d"));
    $check_in_date = new DateTime($frm_data['checkin']);
    $check_out_date = new DateTime($frm_data['checkout']);

    // Check if check-in and check-out dates are equal
    if ($check_in_date == $check_out_date) {
        $status = 'check_in_out_equal';
        $result = json_encode(["status" => $status]);
    }
    // Check if check-out date is earlier than check-in date
    else if ($check_out_date < $check_in_date) {
        $status = 'check_out_earlier';
        $result = json_encode(["status" => $status]);
    }
    // Check if check-in date is earlier than today's date
    else if ($check_in_date < $today_date) {
        $status = 'check_in_earlier';
        $result = json_encode(["status" => $status]);
    }

    // If status is not blank, return the result as JSON
    if ($status !== "") {
        echo $result;
    } else {
        // Calculate the difference in days between check-in and check-out dates
        $diff = $check_out_date->diff($check_in_date);
        $days = $diff->format("%a");

        // check room availablity on change the date 
// working 
      // Define the query to check for overlapping bookings
$total_booking_query = "SELECT COUNT(*) AS total_bookings
FROM book_now
WHERE booking_status = ?
  AND room_id = ?
  AND (
    (check_in >= ? AND check_in < ?)  -- Check-in between May 24th and 26th (excluding 26th)
    OR (check_out > ? AND check_out <= ?) -- OR Check-out within May 24th to 26th (including 24th and 26th)
  );";



// Bind the values in the correct order
$total_booking_val = [
'booked',              // booking_status
$_SESSION['room']['id'], // Room ID from session
$frm_data['checkin'],   // The requested checkin date (for the condition check_out > ?)
$frm_data['checkout'],   // The requested checkout date (for the condition check_in < ?)
$frm_data['checkin'],   // The requested checkin date (for the condition check_out > ?)
$frm_data['checkout'],   // The requested checkout date (for the condition check_in < ?)
];


// Fetch the result using the select function
$tootal_book_count = mysqli_fetch_assoc(select($total_booking_query, $total_booking_val, 'sissss'));





      
        $room_quentity = "SELECT  `quentity` FROM `rooms` WHERE id =?";
        $room_quentity_val = [$_SESSION['room']['id']];
        $room_quentity_count = mysqli_fetch_assoc(select($room_quentity, $room_quentity_val, 'i'));
      

        if ($tootal_book_count['total_bookings'] >= $room_quentity_count['quentity']) {
            $status = 'unavailable';
            $result = json_encode(["status" => $status]);
            echo $result;
            exit;
        }
        
         // check the room avable or not using room quentity and bookings date check in and check out date 
         


        $payment = $_SESSION['room']['price'] * $days;
        $_SESSION['room']['payment'] = $payment;
        // add total payment to  the session  
        if (isset($_SESSION['room'])) {
            $_SESSION['room']['payment'] = $payment;
            $_SESSION['room']['order_id'] = rand(45445, 8767678);

        }

        $result = json_encode(["status" => 'available', "days" => $days, "payment" => $payment]);
        echo $result;


    }
}

if (isset($_POST['book_now'])) {


    $frm_data = filtaration($_POST);

    $query_1 = "INSERT INTO `book_now`(`room_id`, `check_in`, `check_out`,  `order_id`,  `trans_amt`) VALUES (?,?,?,?,?)";


    $book_val = [$frm_data['room_id'], $frm_data['checkin'], $frm_data['checkout'], $_SESSION['room']['order_id'], $_SESSION['room']['payment']];
    inserts($query_1, $book_val, 'issis');

    $booking_id = mysqli_insert_id($conn);

    $query_2 = "INSERT INTO `book_discription`( `booking_id`, `room_name`, `price`, `total_price`, `adderss`, `phone_num`, `user_name`) VALUES (?,?,?,?,?,?,?)";

    $val_2 = [$booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'], $_SESSION['room']['payment'], $frm_data['address'], $frm_data['phone_book'], $frm_data['name']];

    $res = inserts($query_2, $val_2, 'issssss');
    if ($res) {
        echo "success";
    }


}


?>