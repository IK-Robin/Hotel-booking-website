<?php require("db/connection.php");  ?>
<?php require("db/functions.php")  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>
    <?php require("inc/links.php");  ?>
    <style>
        .admin_login_form{
   
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
           width: 400px; 
        }
        @media screen and (max-width:575px) {
            .admin_login_form{
                width: 90%;
            }
        }
    </style>
</head>
<body class=" bg-light">
    

<div class="admin_login_form bg-white p-4 text-center ">
    <form method="POST" class="rounded overflow-hidden" >
        <h4 class="bg-dark text-white p-2">Admin Login Panel</h4>

  <div class="mb-3">
 
    <input name="admin_name" type="text" placeholder="Admin Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
  </div>
  <div class="mb-3">
    
    <input name="admin_pass" type="password" placeholder="Admin Password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button name="admin_login" type="submit" class="btn btn-primary w-25">Login</button>
</form>

</div>


<!-- add admin login logic  -->
<?php

        

        if (isset($_POST['admin_login'])){

            $adimn_data = filtaration($_POST);
            $query  = "SELECT * FROM `admin_login` WHERE admin_name=? AND admin_pass=?  ";
            $value = [$adimn_data['admin_name'],$adimn_data['admin_pass']];

        $res =     select($query,$value,'ss');
            print_r($res);

            if($res->num_rows ==1){
                echo 'get user';
            }else{
                alert('error','Wrong credintials');
            }
            
        }




?>

<?php require("inc/script.php");  ?>
</body>
</html>