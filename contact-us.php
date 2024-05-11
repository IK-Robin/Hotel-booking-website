<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HAMJAIU-CONTACT US</title>
    <?php require ("./inc/links.php") ?>

    <style>
        .box {
            border-top-color: aqua !important;
        }
    </style>

    <!-- swipper carosal  -->
</head>

<body class="bg-light">
    <div class="container-fluid bg-white">
        <div class="container">
            <?php require("components/header.php") ?>
        </div>
    </div>
    <!-- contact us   -->
    
    <div class="my-5 px-4">
        <h2 class="mt-4 mb-1 pt-4 text-center font-bold merinda">CONTACT US</h2>
        <div class="h-line bg-dark mb-5"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nemo
            animi, ex maxime doloribus non voluptas dignissimos nam facere
            blanditiis.
        </p>
    </div>


    <?php

// featch contact us data 

$contact_data = "SELECT * FROM `contact_us` WHERE sr_no =?";
$val =[1];
$data = select($contact_data,$val,'i');
$c_res = mysqli_fetch_assoc($data);


?>


    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 shadow-none">
                <div class="bg-white p-3">
                    <iframe class="w-100"
                    src="<?php echo $c_res['ifram'] ;?>"
                        height="450" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>


                 


                    <h5>Address</h5>
                    <i class="bi bi-geo-alt-fill pe-1"></i><a href="https://maps.app.goo.gl/GBGiAR7UkJ5G1NGB7"
                        class="d-inline block text-decoration-none text-dark" target="_blank"><?php echo $c_res['address']; ?> </a><br>

                    <a class="d-inline block text-decoration-none text-dark" href="tel:+<?php echo $c_res['phone_no']; ?>">
                        <i class="bi bi-telephone-fill"></i> +<?php echo $c_res['phone_no']; ?>
                    </a><br>

                    <a class="d-inline-block text-decoration-none text-dark" href="<?php echo $c_res['twitter'];?>">
                        <i class="bi bi-twitter-x pe-1"></i>Twitter </a><br />
                    <a class="d-inline-block text-decoration-none text-dark" href="<?php echo $c_res['facebook'];?>">
                        <i class="bi bi-facebook pe-1"></i>Facebook </a><br />

                    <a class="d--block text-decoration-none text-dark" href="<?php echo $c_res['linkdin']; ?>">
                        <i class="bi bi-linkedin pe-1"></i> Linkdin</a><br>
                    <a class="d--block text-decoration-none text-dark" href="<?php echo $c_res['instragram']; ?>">
                    <i class="bi bi-instagram"></i> Instragram</a><br>

                </div>
            </div>
        
            <div class="col-lg-6 col-md-6 shadow-none">
                <div class="p-3 mb-3 bg-white rounded">
                    <h3>Send a message</h3>
                    <form method="POST">

                        <div class="mb-3">
                            <label for="name_contact" class="form-label">Name</label>
                            <input required type="text" name="name_contact" class="form-control shadow-none" id="name_contact"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email_contact" class="form-label">Email</label>
                            <input name="email_contact" required type="email" class="form-control shadow-none" id="email_contact"
                                aria-describedby="emailHelp">
                        </div>
    
                        <div class="mb-3">
                            <label for="subject_contact" class="form-label">Subject</label>
                            <input name="sub_contact" required type="text" class="form-control shadow-none" id="subject_contact"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="message_contact" class="form-label">Message</label>
    
    
                            <textarea  name="mess_contact" requiredname="message_contact" class="form-control" rows="2" aria-label="With textarea"></textarea>
    
                        </div>
    
                        <button type="submit" name="send" class="btn  custom_bg me-lg-3 me-2" >
                            Send
                        </button>
                    </form>
                    
                </div>
            </div>

            <?php
            
            
        if (isset($_POST['send'])){
     
            $filter_data = filtaration($_POST);
            $valus = [$filter_data['name_contact'],$filter_data['email_contact'],$filter_data['sub_contact'],$filter_data['mess_contact']];
            $q = "INSERT INTO `user_query`( `name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $res = inserts($q,$valus,'ssss');
            
            if($res ==1){
              
                alert('success','Message send successfully');
            }else{
                alert('error','Something worng');
            }
            
            exit(); 
        }
        
        
            
            
            ?>

        </div>
    </div>
        <?php
         require ("components/footer.php"); 
        

        
        ?>
</body>

</html>