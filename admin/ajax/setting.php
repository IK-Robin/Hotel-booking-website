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


if( isset($_POST['generel_submit'])){
    $update_data = filtaration($_POST);

    $q = "UPDATE `site_title` SET `site_name`=?,`site_address`=? WHERE `sr_no` =?";
    $value = [$update_data['stie_title'],$update_data['site_address'],1];
    $res = update($q,$value,'ssi');

    echo $res;
    

}
?>