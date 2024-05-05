<?php
require('connection.php');

function filtaration($data){
    foreach ($data as $key => $value){
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
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


?>