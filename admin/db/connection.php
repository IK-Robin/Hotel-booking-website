<?php 
$username = 'root';
$pass = '';
$db_name ='hamjaiu_booking';
$host = 'localhost';
$conn = mysqli_connect($host,$username,$pass,$db_name);

if(!$conn){
    die('Can not Connect to the b' . mysqli_connect_error());
}else{
    // echo 'connected';
}
?>