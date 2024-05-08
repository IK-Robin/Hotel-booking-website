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

// update contact us 
if( isset($_POST['contact_upd'])){
$frm_data = filtaration($_POST);

// extreact the value from post data 
$contactId = ['address','phone_no','email','facebook','twitter','instragram','linkdin','google_map'];

$q = "UPDATE `contact_us` SET `address`=?, `phone_no`=?, `email`=?, `facebook`=?, `twitter`=?, `instragram`=?, `linkdin`=?, `ifram`=? WHERE `sr_no`=?";

$inp_value = [];
  foreach ($contactId as $key =>$value){
   

 
    $inp_value[] = $frm_data[$value];
  }
  $inp_value[] = 1;
//   print_r($inp_value);
$res = update($q,$inp_value,'ssssssssi');
  echo $res;

}


// add team member 
if(isset($_POST['add_member'])){
   $frm_data = filtaration($_POST);
 $img_upload =   uploadImage($_FILES['pitcure'],ABOUT_FOLDER);

 if($img_upload =='inv_img'){
    echo 'inv_img';
 }else if($img_upload =='upd_failed'){
    echo 'upd_failed';
 }else if($img_upload =='inv_size'){
    echo 'inv_size';
 }else{
    

    $values =[$frm_data['name'],$img_upload];
    $q = "INSERT INTO `members`( `name`, `m_img`) VALUES (?,?)";
    $res = inserts($q,$values,'ss');
    echo $res;
 }
}



// show all team member form db 


if (isset($_POST['get_member'])) {
  $get_all_team_member = selectAll('members');
  $data = []; // Initialize an empty array

  while ($row = mysqli_fetch_assoc($get_all_team_member)) {
      $data[] = $row; // Append each row to the array
  }

  echo json_encode($data); // Encode the array into JSON format
}


// delete members 

if(isset($_POST['delete_members'])){
$frm_data = filtaration($_POST);

$value = [$frm_data['delete_members']];


$new_q ="SELECT * FROM `members` WHERE sr_no =?";
$res = select($new_q,$value,'i');

$data = mysqli_fetch_assoc($res);
print_r($data);
$m_img = $data['m_img']; 
if(deleteImage($m_img,ABOUT_FOLDER)){


  $delet_q = "DELETE FROM `members` WHERE sr_no =?";
  $del_row = deletes($delet_q,$value,'i');
  if($del_row){
    echo $del_row;
  }else{
    echo "Can't delete the member";
  }
}else{
  echo  'Delete faild';
}

} 
?>