<?php

require('../admin/db/phplinks.php');



if(isset($_POST['register'])){
  $data = filtaration($_POST);
$check_prev_user = select("SELECT * FROM `user_register` WHERE `email`=? || `phone` = ? LIMIT 1",[$data['email'],$data['phone']],'ss');
if(mysqli_num_rows($check_prev_user)!=0){
  $check_prev_user_email = mysqli_fetch_assoc($check_prev_user);

  echo ($check_prev_user_email['email'] == $data['email']) ? 'email_alrady': 'phone_alrady';
exit;
}

// upload user image to  the server or db

$profile_img = optimize_user_Image($_FILES['formFile'],USER_PROFILE);

if($profile_img == 'inv_img'){
  exit;
}else if($profile_img =='upd_failed'){
  echo 'upload faild';
  exit;
}

}




?>