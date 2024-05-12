<?php

function alert($type,$message){

    $bs_class = ($type =='success')? 'alert-success':'alert-warning';

  
    echo <<<alert
    <div id="alert_close" class="alert custom_alert $bs_class   alert-dismissible fade show" role="alert">
            <strong class="me-3"> $message</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert shadow-none" aria-label="Close"></button>
    </div>
    <script>
    // hide the alerm after 3 sec 
    setTimeout(function(){
        document.getElementById('alert_close').style.display = 'none';
    },3000);
    </script>
    alert;
}


// make a redicrect function using js 
 function redirect ($link){
    echo <<<redirect
    <script>
    window.location.href = '$link';
    </script>
    redirect;
 }


 function adminLogin () {
    session_start();
    if(!(isset($_SESSION['adminLogin']) && isset($_SESSION['adminLogin'])==true)){
        redirect('index.php');
    }
 }


 function uploadImage($image,$folder){
    $valid_image = ['image/jpeg','image/png','image/webp'];

    $image_mime = $image['type'];
    if(!in_array($image_mime,$valid_image)){
        return 'inv_img';
    }else if(($image['size'] /(1024*1024)) >2){
        return 'inv_size';
    }else{
        $image_name = time().'_'.$image['name'];
        $image_tmp_name = $image['tmp_name'];

        $image_folder  = UPLOAD_IMAGE_PATH . $folder.$image_name;
       $uploadSuccess =  move_uploaded_file($image_tmp_name,$image_folder);
       if($uploadSuccess){
        return $image_name;
       }else{
        return 'Image Upload Faild' ;
       }
        // return $image_name;
    }
 }



 function uploadSvgImage($image,$folder){
    $valid_image = ['image/svg+xml'];

    $image_mime = $image['type'];
    if(!in_array($image_mime,$valid_image)){
        return 'inv_img';
    }else if(($image['size'] /(1024*1024)) >2){
        return 'inv_size';
    }else{
        $image_name = time().'_'.$image['name'];
        $image_tmp_name = $image['tmp_name'];

        $image_folder  = UPLOAD_IMAGE_PATH . $folder.$image_name;
       $uploadSuccess =  move_uploaded_file($image_tmp_name,$image_folder);
       if($uploadSuccess){
        return $image_name;
       }else{
        return 'Image Upload Faild' ;
       }
        // return $image_name;
    }
 }


//  delete image from folder 

function deleteImage ($img,$folder){
if(unlink(UPLOAD_IMAGE_PATH.$folder.$img)){
    return true;
}else {
    return false;
}
}
?>