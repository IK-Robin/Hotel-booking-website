<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HAMJAIU</title>


  <!-- swipper carosal  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <?php require ("./inc/links.php") ?>

  <!-- <link rel="stylesheet" href=" <?php require ("css/style.css") ?>"> -->

</head>

<body class="bg-light">
  <div class="container-fluid bg-white">
    <div class="container">
      <?php require ("./components/header.php") ?>
    </div>
  </div>
  <!-- add slider from swipe js  -->
  <div class="slider_conterinr px-0 m-0">


    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php

        $path = CAROSAL_FOLDER;
        $query = selectAll('carosal');

        while ($row = mysqli_fetch_assoc($query)) {

          echo <<<main_caro
            <div class="swiper-slide">
            <div class="swiper-zoom-container">
              <img
                src="./images/$path/$row[carosal_img]"
                class="w-100 d-block"
              />
            </div>
          </div>
          main_caro;
        }

        ?>

      </div>



    </div>
  </div>

  <!-- check avablity  -->

  <div class="container bg-white avabality_form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="mb-4">Check Booking Availability</h5>
        <form action="rooms.php" method="GET">
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
              <label for="" class="form-label">Chekcout date
              </label>
              <input type="date" class="form-control shadow-none" name="checkIn" id="" />
            </div>
            <div class="col-lg-3 mb-3">
              <label for="" class="form-label">check in date
              </label>
              <input type="date" class="form-control shadow-none" name="check_out" id="" />
            </div>
            <div class="col-lg-3 mb-3">
              <label for="" class="form-label">Audalts </label>
              <select name="audlt" class="form-select shadow-none" aria-label="Default select example">

                <?php

                $max_guest = mysqli_query($conn, "SELECT MAX(audlt) AS max_audlt, MAX(children) AS max_children FROM rooms WHERE status ='1' AND remove='0'");
                $max_guests = mysqli_fetch_assoc($max_guest);

                for ($i = 1; $i <= $max_guests['max_audlt']; $i++) {
                  echo "<option value='$i'>$i</option>";
                }

                ?>



              </select>
            </div>
            <div class="col-lg-2 mb-3">
              <label for="" class="form-label">Children </label>
              <select name="children" class="form-select shadow-none" aria-label="Default select example">
                <?php


                for ($i = 1; $i <= $max_guests['max_children']; $i++) {
                  echo "<option value='$i'>$i</option>";
                }

                ?>
              </select>
            </div>
            <input type="hidden" name="check_availability">
            <div class="col-lg-1 mb-lg-3 ps-0 mt-3">
              <button type="submit" class="btn custom_bg shadow-none">
                Submit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- our rooms  -->
  <h2 class="mt-4 mb-4 pt-4 text-center font-bold merinda">Our Rooms</h2>

  <div class="container">
    <div class="row">


      <!-- featch rooms data from db  -->
      <?php



      // Fetch rooms that are active and not removed
      $res = select("SELECT * FROM `rooms` WHERE `status` = ? AND `remove` = ? ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');


      $rooms_path = ROOM_IMG_PATH;
      while ($row = mysqli_fetch_assoc($res)) {
        // Fetch the room ID from the current room row
        $room_id = $row['id']; // Assuming there's an 'id' column in your `rooms` table
      
        // Fetch facilities for the current room
        $rooms_facilities = mysqli_query($conn, "SELECT f.name FROM `facilities` f INNER JOIN `room_facility` rfec ON f.id = rfec.facility_id WHERE rfec.rooms_id = $room_id");

        // Loop through the facilities and collect them
        $facilities = "";
        while ($room_f = mysqli_fetch_assoc($rooms_facilities)) {
          $facilities .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_f['name']}</span> ";
        }

        // Fetch features for the current room
        $room_featuress = mysqli_query($conn, "SELECT feature.name FROM `feature_facility` feature INNER JOIN `room_featurs` rFeaturs ON feature.id = rFeaturs.featurs_id WHERE rFeaturs.room_id = $room_id");

        // Loop through the features and collect them
        $featurss = "";
        while ($room_feat = mysqli_fetch_assoc($room_featuress)) {
          $featurss .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_feat['name']}</span> ";
        }

        // Get room's image
        $room_image = mysqli_query($conn, "SELECT * FROM `rooms_images` WHERE `rooms_id` = $room_id AND `thumb` = 1");
        $room_img_path = ROOM_IMG_PATH . 'thumbnail.jpg';
        if (mysqli_num_rows($room_image) > 0) {
          $room_img_paths = mysqli_fetch_assoc($room_image);
          $room_img_path = ROOM_IMG_PATH . $room_img_paths['img_name'];
        }

        echo <<<rooms
            <div class="col-md-4">
            <div class="card shadow-none">
            <img src="$room_img_path" class="card-img-top" />
            <div class="card-body">
              <h5 class="card-title">$row[rooms_names]</h5>
              <h6 class="mb-4">$100 per Night</h6>
              <div class="features mb-4">
                <h6 class="mb-1">Features</h6>
                $featurss
                
              </div>
              <div class="facilities mb-4">
                <h6 class="mb-1">Features</h6>
                $facilities 
              </div>
  
              <div class="rating mb-4">
                <h6 class="mb-1">Rating</h6>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
  
              <div class="d-flex justify-content-evenly mb-2">
                <a href="#" class="btn btn-sm custom_bg text-white shadow-none"
                  >Book Now</a
                >
                <a href="rooms_description.php?id=$room_id" class="btn btn-sm shadow-none btn-outline-dark"
                  >More Details</a
                >
              </div>
            </div>
          </div>
            </div>
        
      rooms;

      }

      ?>




    </div>
  </div>

  <a href="rooms.php" class="mt-3 btn p-2 text-center m-auto  font-bold merinda d-block">
    More Rooms
  </a>

  <!-- facilities  -->
  <h2 class="mt-4 mb-4 pt-4 text-center font-bold merinda">OUR FACILITIES</h2>

  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">


      <?php
      $res = selectAll('facilities');
      if ($res) {
        $facility_path = FACILITIES_IMG_PATH;
        $count = 0; // Counter variable
      
        while ($row = mysqli_fetch_assoc($res)) {
          // Break out of the loop if $count reaches 4
          if ($count >= 5) {
            break;
          }

          echo <<<facilitys
            <div class="col-lg-2 col-mb-2 text-center bg-white rounded shadow py-2 my-3">
                <img class="h-75" style="width: 80% ;" src="$facility_path$row[icon]" alt="$row[name]" />
                <h5 class="mt-2">$row[name]</h5>
            </div>
            facilitys;

          $count++; // Increment the counter
        }
      }
      ?>








      <div class="col-lg-12 text-center mt-2">
        <button class="mt-3 btn p-2 text-center m-auto border font-bold merinda d-block">
          More Rooms
        </button>
      </div>
    </div>
  </div>

  <!-- swiper carolas testmonial  -->
  <div class="container">
    <div class="swiper swipper_testmonial">
      <div class="swiper-wrapper">
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="./images/facilities/wifi.svg" width="100" alt="" />
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
            iure sequi vitae, facere pariatur vero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="./images/facilities/wifi.svg" width="100" alt="" />
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
            iure sequi vitae, facere pariatur vero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="./images/facilities/wifi.svg" width="100" alt="" />
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
            iure sequi vitae, facere pariatur vero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="./images/facilities/wifi.svg" width="100" alt="" />
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
            iure sequi vitae, facere pariatur vero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="./images/facilities/wifi.svg" width="100" alt="" />
            <h6 class="m-0 ms-2">Random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat
            iure sequi vitae, facere pariatur vero?
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- Reach us  -->
  <h2 class="mt-4 mb-4 pt-4 text-center font-bold merinda">Reach Us</h2>




  <?php

  // featch contact us data 
  
  $contact_data = "SELECT * FROM `contact_us` WHERE sr_no =?";
  $val = [1];
  $data = select($contact_data, $val, 'i');
  $c_res = mysqli_fetch_assoc($data);



  ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-mb-8 p-2 bg-white">
        <iframe class="w-100" src="<?php echo $c_res['ifram']; ?>" height="450" style="border: 0" allowfullscreen=""
          loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="col-mb-4 col-lg-4">
        <div class="p-3 mb-3 bg-white rounded">
          <h5>Call Us</h5>
          <a class="d-inline-block text-decoration-none text-dark" href="tel:+ <?php echo $c_res['phone_no']; ?>">
            <i class="bi bi-telephone-fill"></i> + <?php echo $c_res['phone_no']; ?>
          </a>
        </div>
        <div class="p-3 mb-3 bg-white rounded">
          <h5>Follow Us</h5>
          <a class="d-inline-block text-decoration-none text-dark" href="<?php echo $c_res['twitter']; ?>">
            <i class="bi bi-twitter-x pe-1"></i>Twitter
          </a><br>
          <a class="d-inline-block text-decoration-none text-dark" href="<?php echo $c_res['facebook']; ?>">
            <i class="bi bi-facebook pe-1"></i>Facebook
          </a><br>

          <a class="d-inline-block text-decoration-none text-dark" href="<?php echo $c_res['linkdin']; ?>">
            <i class="bi bi-linkedin pe-1"></i> Linkdin</a>
        </div>
      </div>
    </div>
  </div>


  <?php require ("components/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    // swiper js

    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });

    var swiper = new Swiper(".swipper_testmonial", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        // when window width is >= 640px
        640: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
      },
    });
  </script>
</body>

</html>