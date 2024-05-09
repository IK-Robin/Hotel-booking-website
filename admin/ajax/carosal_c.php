<?php
require('../db/phplinks.php');
adminLogin();
 
// add team member 
if(isset($_POST['add_carosal'])){
   $frm_data = filtaration($_POST);

 $img_upload =   uploadImage($_FILES['pitcure'],CAROSAL_FOLDER);

 if($img_upload =='inv_img'){
    echo 'inv_img';
 }else if($img_upload =='upd_failed'){
    echo 'upd_failed';
 }else if($img_upload =='inv_size'){
    echo 'inv_size';
 }else{
    

    $values =[$img_upload];
    $q = "INSERT INTO `carosal`(`carosal_img`) VALUES (?)";
    $res = inserts($q,$values,'s');
    echo $res;
 }
}



// show all team member form db 


if (isset($_POST['get_picture'])) {
  $get_all_team_member = selectAll('carosal');
  $data = []; // Initialize an empty array

  while ($row = mysqli_fetch_assoc($get_all_team_member)) {
      $data[] = $row; // Append each row to the array
  }

  echo json_encode($data); // Encode the array into JSON format
}


// delete carosal 

if(isset($_POST['delete_picture'])){
$frm_data = filtaration($_POST);

$value = [$frm_data['delete_picture']];


$new_q ="SELECT * FROM `carosal` WHERE sr_no =?";
$res = select($new_q,$value,'i');

$data = mysqli_fetch_assoc($res);
print_r($data);
$m_img = $data['carosal_img']; 
if(deleteImage($m_img,CAROSAL_FOLDER)){


  $delet_q = "DELETE FROM `carosal` WHERE sr_no =?";
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