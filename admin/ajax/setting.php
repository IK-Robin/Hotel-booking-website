<?php
require('../db/phplinks.php');
adminLogin();

if (isset($_POST['getgenerel'])){
    $query = "SELECT * FROM `site_title` WHERE sr_no=?";
    $value =[1];
   $res =  select($query,$value,'i');
   
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo  $json_data;

}

?>