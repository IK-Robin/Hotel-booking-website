<?php
require('connection.php');
// fontend url 
define('SITE_URL','http://172.0.0.1/hotel booking system development');
define('ABOUT_IMG_PATH','/images/about/');


// absulate pathe for all website 
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/hotel booking system development/images/');

define('ABOUT_FOLDER', 'about/');
define('CAROSAL_FOLDER','carousel/');


function filtaration($data){
  foreach ($data as $key => $value){
      $value = trim($value);
      $value = stripslashes($value);
      $value = htmlspecialchars($value);
      $value = strip_tags($value);

      $data[$key] = $value;
  }
  return $data;
}


// select all 
function selectAll ($table){
  global $conn;
  $res = mysqli_query($conn,"SELECT * FROM $table");
  return $res;

}

// select from db  

function select($query,$value,$data_type){

    global $conn;
    $stmt = $conn->prepare($query);
   
 
    if($stmt){
      mysqli_stmt_bind_param($stmt,$data_type,...$value);
      if(mysqli_stmt_execute($stmt)){
        $res = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $res;
      }else{
        die("Query Cannot be Executed- select");
        mysqli_stmt_close($stmt);
      }
      
     

    }else{
        echo "error";
        mysqli_stmt_close();
    }
}


function update($query,$value,$data_type) {
  global $conn;
  $stmt = $conn->prepare($query);
  if($stmt) {
    mysqli_stmt_bind_param($stmt,$data_type,...$value);
    if(mysqli_stmt_execute($stmt)) {
      $res = mysqli_stmt_affected_rows($stmt);
    return $res;
      mysqli_stmt_close($stmt);
  }
  else{
    mysqli_stmt_close($stmt);
    die("Query Cannot be Executed- update");
  }
}
}
function inserts ($query,$value,$data_type) {
  global $conn;
  $stmt = $conn->prepare($query);
  if($stmt) {
    mysqli_stmt_bind_param($stmt,$data_type,...$value);
    if(mysqli_stmt_execute($stmt)) {
      $res = mysqli_stmt_affected_rows($stmt);
    return $res;
      mysqli_stmt_close($stmt);
  }
  else{
    mysqli_stmt_close($stmt);
    die("Query Cannot be Executed- data inserted");
  }
}
}



// add delete function 

function deletes($query,$value,$data_type) {
  global $conn;
  $stmt = $conn->prepare($query);
  if($stmt) {
    mysqli_stmt_bind_param($stmt,$data_type,...$value);
    if(mysqli_stmt_execute($stmt)) {
      $res = mysqli_stmt_affected_rows($stmt);
    return $res;
      mysqli_stmt_close($stmt);
  }
  else{
    mysqli_stmt_close($stmt);
    die("Data-can't delete");
  }
}
}

?>