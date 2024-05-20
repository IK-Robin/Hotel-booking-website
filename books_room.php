<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Room Detail</title>
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

  if (mysqli_num_rows($res) == 0) {
 
    redirect('rooms.php');
  }
  $room = mysqli_fetch_assoc($res);
  $room_id = $rooms_id['room_id'];

  // Fetch rooms that are active and not removed
  


  ?>


  <div class="container">

    <div class="row">
      <!-- our rooms  -->
      <div class="col-lg-12  px-4">
        <h2 class="pt-3 font-bold merinda"><?php echo $room['rooms_names'] ?></h2>

        <a href="index.php" class=" text-decoration-none text-secondery ">Home</a>
        <span class=" text-secondery ">></span>
        <a href="rooms.php" class=" text-decoration-none text-secondery ">Room</a>
        </>
      </div>
      <!-- image slider  -->
      <div class="col-lg-7 col-md-12 mt-5">


        <div class="swiper rooms_slider ">
          <div class="swiper-wrapper">

            <?php

            // Get room's image
            $room_image = mysqli_query($conn, "SELECT * FROM `rooms_images` WHERE `rooms_id` = $room_id");



            $rooms_images = "";

            $room_img_path = ROOM_IMG_PATH . 'thumbnail.jpg';


            $folder = ROOM_IMG_PATH;
            while ($row = mysqli_fetch_assoc($room_image)) {
              echo " <div class='swiper-slide'><img width='100%' src='$folder$row[img_name]' alt=''></div>";
            }

            ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        </div>

      </div>


      <!-- rooms details  -->
      <div class="col-lg-5 col-md-12 mt-5">

        <div class="card mb-3 border-0 shadow">
          <div class="card-body">

            <h4 class="mb-4">$<?php echo $room['price'] ?> per night</h4>

            <!-- Features -->
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <?php

              // Fetch features for the current room
              $room_featuress = mysqli_query($conn, "SELECT feature.name FROM `feature_facility` feature INNER JOIN `room_featurs` rFeaturs ON feature.id = rFeaturs.featurs_id WHERE rFeaturs.room_id = $room_id");
              $featurss = "";
              while ($room_feat = mysqli_fetch_assoc($room_featuress)) {
                $featurss .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_feat['name']}</span> ";
              }

              echo $featurss;


              ?>
            </div>
            <!-- Facilities -->
            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <?php

              $rooms_facilities = mysqli_query($conn, "SELECT f.name FROM `facilities` f INNER JOIN `room_facility` rfec
              ON f.id = rfec.facility_id WHERE rfec.rooms_id = $room_id");

              // Loop through the facilities and collect them
              $facilities = "";
              while ($room_f = mysqli_fetch_assoc($rooms_facilities)) {
                $facilities .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_f['name']}</span> ";
              }
              echo $facilities
                ?>


            </div>
            <div class="mb-4 guest">
              <h6 class="mb-1">Guest</h6>
              <span class='badge rounded-pill bg-light text-dark text-wrap'><?php echo $room['audlt']; ?> Adults</span>

              <span class='badge rounded-pill bg-light text-dark text-wrap'><?php echo $room['children']; ?> Children</span>


            </div>

            <div class="area mb-4">
              <h6 class="mb-1">Area</h6>
              <span class='badge rounded-pill bg-light text-dark text-wrap'><?php echo $room['area']; ?> sqft</span>
            </div>
            <!-- add book now button full width  -->
            <div class="book-now ">
              <a  href="book.php?room_id=<?php echo $room['id']; ?>" class="btn btn-primary w-100">Book Now</a>
            </div>
          </div>




        </div>
      </div>
      <div class="col-lg-12">
         <!-- add discription  -->
         <div class="discription mt-4">
          <h6 class="mb-1">Description</h6>
          <p><?php echo $room['rooms_desc']; ?></p>
         </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <!-- add side bar  -->


      <!-- rooms card  -->
      <div class="col-lg-9 col-md-12">

        <div class="card mb-3 border-0 shadow"></div>

        <?php

        // Fetch rooms that are active and not removed
// $res = select("SELECT * FROM `rooms` WHERE `status`=? AND `remove`=?", [1, 0], 'ii');
        
        // $rooms_path = ROOM_IMG_PATH;
// while ($row = mysqli_fetch_assoc($res)) {
//     // Fetch the room ID from the current room row
//     $room_id = $row['id']; // Assuming there's an 'id' column in your `rooms` table
        
        //     // Fetch facilities for the current room
//     $rooms_facilities = mysqli_query($conn, "SELECT f.name FROM `facilities` f INNER JOIN `room_facility` rfec ON f.id = rfec.facility_id WHERE rfec.rooms_id = $room_id");
        
        //     // Loop through the facilities and collect them
//     $facilities = "";
//     while ($room_f = mysqli_fetch_assoc($rooms_facilities)) {
//         $facilities .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_f['name']}</span> ";
//     }
        
        //     // Fetch features for the current room
//     $room_featuress = mysqli_query($conn, "SELECT feature.name FROM `feature_facility` feature INNER JOIN `room_featurs` rFeaturs ON feature.id = rFeaturs.featurs_id WHERE rFeaturs.room_id = $room_id");
        
        //     // Loop through the features and collect them
//     $featurss = "";
//     while ($room_feat = mysqli_fetch_assoc($room_featuress)) {
//         $featurss .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_feat['name']}</span> ";
//     }
        
        //     // Get room's image
//     $room_image = mysqli_query($conn, "SELECT * FROM `rooms_images` WHERE `rooms_id` = $room_id AND `thumb` = 1");
//     $room_img_path = ROOM_IMG_PATH . 'thumbnail.jpg';
//     if (mysqli_num_rows($room_image) > 0) {
//         $room_img_paths = mysqli_fetch_assoc($room_image);
//         $room_img_path = ROOM_IMG_PATH . $room_img_paths['img_name'];
//     }
        
        //     // Output the collected data
        

        //     // Output the room card
//     echo <<<DATA
//     <div class="card mb-3 border-0 shadow">
//         <div class="row g-3 p-3 align-items-center">
//             <div class="col-md-5">
//                 <img src="$room_img_path" class="w-100 rounded" alt="Room Image">
//             </div>
//             <div class="col-md-5">
//                 <div class="card-body p-0">
//                     <h5 class="card-title">{$row['rooms_names']}</h5>
//                     <!-- Features -->
//                     <div class="features mb-4">
//                         <h6 class="mb-1">Features</h6>
//                         $featurss
//                     </div>
//                     <!-- Facilities -->
//                     <div class="facilities mb-4">
//                         <h6 class="mb-1">Facilities</h6>
//                         $facilities
//                     </div>
//                 </div>
//             </div>
//             <div class="col-md-2 text-center">
//                 <h6 class="mb-4">$$row[price] per night</h6>
//                 <a href="#" class="btn btn-sm w-100 text-white custom_bg mb-2">Book Now</a>
//                 <a href="rooms_detail.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
//             </div>
//         </div>
//     </div>
// DATA;
// }
        
        ?>

      </div>




    </div>
    </nav>
  </div>







  <?php require ("components/footer.php"); ?>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".rooms_slider", {
      cssMode: true,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
      mousewheel: true,
      keyboard: true,
    });
  </script>
</body>

</html>