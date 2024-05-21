<?php
require('../db/phplinks.php');
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

        // Check if session variable 'room' is set and output accordingly
        if (isset($_SESSION['room'])) {
            // Session variable 'room' exists, output success
            $room = $_SESSION['room'];
            $response = [
                'status' => 'success',
                'days' => $days,
                'room' => $room
            ];
            echo json_encode($response);
        } else {
            // Session variable 'room' does not exist, output error
            $response = [
                'status' => 'error',
                'message' => 'Room data is not set in the session.'
            ];
            echo json_encode($response);
        }
    }
}
?>
