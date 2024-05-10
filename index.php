



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HAMJAIU</title>
    

<!-- swipper carosal  -->
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
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

    
      <div
        style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
        class="swiper mySwiper"
      >
        <div class="swiper-wrapper">
          <?php
          
          $path = CAROSAL_FOLDER;
          $query = selectAll('carosal');

          while($row = mysqli_fetch_assoc($query) ){
              
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
          <form>
            <div class="row align-items-end">
              <div class="col-lg-3 mb-3">
                <label for="data_ofbarth" class="form-label"
                  >Chekcout date
                </label>
                <input
                  type="date"
                  class="form-control shadow-none"
                  id="data_ofbarth"
                />
              </div>
              <div class="col-lg-3 mb-3">
                <label for="data_ofbarth" class="form-label"
                  >check in date
                </label>
                <input
                  type="date"
                  class="form-control shadow-none"
                  id="data_ofbarth"
                />
              </div>
              <div class="col-lg-3 mb-3">
                <label for="data_ofbarth" class="form-label">Audalts </label>
                <select
                  class="form-select shadow-none"
                  aria-label="Default select example"
                >
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-lg-2 mb-3">
                <label for="data_ofbarth" class="form-label">Children </label>
                <select
                  class="form-select shadow-none"
                  aria-label="Default select example"
                >
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
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
        <div class="col-lg-4">
          <div class="card shadow-none">
            <img src="./images/rooms/IMG_11892.png" class="card-img-top" />
            <div class="card-body">
              <h5 class="card-title">Simple Room Name</h5>
              <h6 class="mb-4">$100 per Night</h6>
              <div class="features mb-4">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >2 Room</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >1 Bathroom</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >1 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >3 Sofa</span
                >
              </div>
              <div class="facilities mb-4">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Wifi</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Television</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Ac
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Room Hitter</span
                >
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
                <a href="#" class="btn btn-sm shadow-none btn-outline-dark"
                  >More Details</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card shadow-none">
            <img src="./images/rooms/IMG_11892.png" class="card-img-top" />
            <div class="card-body">
              <h5 class="card-title">Simple Room Name</h5>
              <h6 class="mb-4">$100 per Night</h6>
              <div class="features mb-4">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >2 Room</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >1 Bathroom</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >1 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >3 Sofa</span
                >
              </div>
              <div class="facilities mb-4">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Wifi</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Television</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Ac
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Room Hitter</span
                >
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
                <a href="#" class="btn btn-sm shadow-none btn-outline-dark"
                  >More Details</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card shadow-none">
            <img src="./images/rooms/IMG_11892.png" class="card-img-top" />
            <div class="card-body">
              <h5 class="card-title">Simple Room Name</h5>
              <h6 class="mb-4">$100 per Night</h6>
              <div class="features mb-4">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >2 Room</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >1 Bathroom</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >1 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >3 Sofa</span
                >
              </div>
              <div class="facilities mb-4">
                <h6 class="mb-1">Features</h6>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Wifi</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Television</span
                >
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Ac
                </span>
                <span class="badge rounded-pill bg-light text-dark text-wrap"
                  >Room Hitter</span
                >
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
                <a href="#" class="btn btn-sm shadow-none btn-outline-dark"
                  >More Details</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button
      class="mt-3 btn p-2 text-center m-auto border font-bold merinda d-block"
    >
      More Rooms
    </button>

    <!-- facilities  -->
    <h2 class="mt-4 mb-4 pt-4 text-center font-bold merinda">OUR FACILITIES</h2>

    <div class="container">
      <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div
          class="col-lg-2 col-mb-2 text-center bg-white rounded shadow py-2 my-3"
        >
          <img src="./images/facilities//wifi.svg" alt="" />
          <h5 class="mt-2">Wifi</h5>
        </div>
        <div
          class="col-lg-2 col-mb-2 text-center bg-white rounded shadow py-2 my-3"
        >
          <img src="./images/facilities//wifi.svg" alt="" />
          <h5 class="mt-2">Wifi</h5>
        </div>
        <div
          class="col-lg-2 col-mb-2 text-center bg-white rounded shadow py-2 my-3"
        >
          <img src="./images/facilities//wifi.svg" alt="" />
          <h5 class="mt-2">Wifi</h5>
        </div>
        <div
          class="col-lg-2 col-mb-2 text-center bg-white rounded shadow py-2 my-3"
        >
          <img src="./images/facilities//wifi.svg" alt="" />
          <h5 class="mt-2">Wifi</h5>
        </div>
        <div
          class="col-lg-2 col-mb-2 text-center bg-white rounded shadow py-2 my-3"
        >
          <img src="./images/facilities//wifi.svg" alt="" />
          <h5 class="mt-2">Wifi</h5>
        </div>
        <div class="col-lg-12 text-center mt-2">
          <button
            class="mt-3 btn p-2 text-center m-auto border font-bold merinda d-block"
          >
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
$val =[1];
$data = select($contact_data,$val,'i');
$c_res = mysqli_fetch_assoc($data);



?>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-mb-8 p-2 bg-white">
          <iframe
            class="w-100"
            src="<?php echo $c_res['ifram'] ;?>"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>

        <div class="col-mb-4 col-lg-4">
          <div class="p-3 mb-3 bg-white rounded">
            <h5>Call Us</h5>
            <a
              class="d-inline-block text-decoration-none text-dark"
              href="tel:+ <?php echo $c_res['phone_no']; ?>"
            >
              <i class="bi bi-telephone-fill"></i> + <?php echo $c_res['phone_no']; ?>
            </a>
          </div>
          <div class="p-3 mb-3 bg-white rounded">
            <h5>Follow Us</h5>
            <a
              class="d-inline-block text-decoration-none text-dark"
              href="<?php  echo $c_res['twitter'];?>"
            >
              <i class="bi bi-twitter-x pe-1"></i>Twitter
            </a><br>
            <a
              class="d-inline-block text-decoration-none text-dark"
              href="<?php echo $c_res['facebook']; ?>"
            >
              <i class="bi bi-facebook pe-1"></i>Facebook
            </a><br>

            <a
              class="d-inline-block text-decoration-none text-dark"
              href="<?php echo $c_res['linkdin']; ?>"
            >
            <i class="bi bi-linkedin pe-1"></i> Linkdin</a
            >
          </div>
        </div>
      </div>
    </div>


    <?php require("components/footer.php"); ?>

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
        autoplay:{
          delay:2500,
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
