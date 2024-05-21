<?php
require('../db/phplinks.php');
adminLogin();
 
if(isset($_POST['check_date'])){
  $frm_data = filtaration($_POST);
  $status = "";
  $resust = "";

  $today_date = DateTime(date("Y-m-d"));
  $check_in_date = DateTime($frm_data['checkin']);
  $check_out_date = DateTime($frm_data['checkout']);
  
  // check the date is equal or not  
  if ($check_in_date == $check_out_date){
    $status ='check_in_out_equal';
    $resust =json_encode(["status"=>$status]);
  }


  if($check_in_date <= $today_date && $check_out_date >= $today_date){
     
    $status = "Available";
    $resust = "Room is available";
  }
}
?>