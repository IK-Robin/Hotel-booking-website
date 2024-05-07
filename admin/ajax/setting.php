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
if( isset($_POST['shoutdown'])){
    $update_data = filtaration($_POST);
    $sut_value = ($_POST['shoutdown'] == 0) ? 1:0 ;

    
    $q = "UPDATE `site_title` SET `site_shoutdown`=? WHERE `sr_no` =?";
    $value = [$sut_value,1];
    $res = update($q,$value,'ii');

    echo $res;
    

}

// get contact us data 
if (isset($_POST['get_contact_us_data'])){
    $q ="SELECT * FROM `contact_us` WHERE `sr_no`=?";
    $value  = [1];
    $res = select($q,$value,'i');
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo  $json_data;
}

if( isset($_POST['contact_upd'])){
$frm_data = filtaration($_POST);

// extreact the value from post data 
$contactId = ['address','phone_no','email','facebook','twitter','instragram','linkdin'];
$inp_value = [];
  foreach ($contactId as $key =>$value){
   

 
    $inp_value[] = $frm_data[$value];
  }
  $inp_value[] = 1;

}
?>