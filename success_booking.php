<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Comfarm booking</title>
  <?php require ("./inc/links.php") ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
      <?php require ("./components/header.php") ?>
    </div>
  </div>


  <?php

  if (!isset($_GET['room_id'])) {

    redirect('rooms.php');

  }


  $rooms_id = filtaration($_GET);

  $res = select("SELECT * FROM `rooms` WHERE `id`=? AND  `status`=? AND `remove`=?", [$rooms_id['room_id'], 1, 0], 'iii');

//   if (mysqli_num_rows($res) == 0) {

//     redirect('rooms.php');
//   }
  $room = mysqli_fetch_assoc($res);
  $room_id = $rooms_id['room_id'];
print_r($room);
  // Fetch rooms that are active and not removed



  ?>


  <div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Room Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <h4><?php
                                
                             echo   $room['rooms_names'];
                                
                                ?></h4>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
  






  <?php require ("components/footer.php"); ?>
  <!-- Swiper JS -->
 
</body>

</html>