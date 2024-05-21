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

            <!-- add booking form 
           -->
            <form action="" id="book_now">

              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="name_book" class="form-label">Name</label>
                    <input required value="Robin" type="text" name="name_book" class="form-control shadow-none"
                      id="name_book" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="phone_book" value="016" class="form-label"> Phone</label>
                    <input required type="text" name="phone_book" class="form-control shadow-none" id="phone_book"
                      aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-3">
                    <label for="address" class="form-label"> Address</label>
                    <input required value="Kancherkol" type="text" name="address" class="form-control shadow-none"
                      id="address" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label f class="form-label">Chekcout date
                    </label>
                    <input type="date" onchange="check_rooms_avabilable()" name="checkin" class="form-control shadow-none"  />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class=" mb-3">
                    <label for="checkoutDate" class="form-label">Chekcout date
                    </label>
                    <input onchange="check_rooms_avabilable()" type="date" name="checkout" class="form-control shadow-none"  />
                  </div>
                </div>

                <div class="book-now col-lg-12">
                  <div class="spinner-border text-primary d-none" role="status" id="pre_loader">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <h6 class="mb-3 text-danger" id="pay_info" > Provide Checkin and Checkout Date!</h6>

                  <button disabled type="submit" name="book_subit" href="book.php?room_id=<?php echo $room['id']; ?>" class="btn btn-primary w-100">Pay Now</button>
                </div>
              </div>

            </form>


            <!-- add book now button full width  -->

          </div>




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

        
        ?>

      </div>




    </div>
    </nav>
  </div>







  <?php require ("components/footer.php"); ?>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->


  <script src="./font_end_js/bookings.js"></script>
</body>

</html> 