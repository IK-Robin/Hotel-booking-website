<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HAMJAIU</title>
    <?php require ("./inc/links.php") ?>
    <!-- <link rel="stylesheet" href=" <?php require ("css/style.css") ?>"> -->
    <style>
      * {
        font-family: "Poppins", sans-serif;
      }

      .custom_bg {
        background-color: #2ec1ac;
      }

      .custom_bg:hover {
        background-color: #279e8c;
      }

      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type="number"] {
        -moz-appearance: textfield;
      }

      .merinda {
        font-family: "Merienda", cursive;
      }

      .slider_conterinr {
        padding: 0 !important;
      }

      .avabality_form {
        margin-top: -50px;
        z-index: 111;
        position: relative;
      }

      @media screen and (max-width: 575px) {
        .avabality_form {
          margin-top: 20px;
          padding: 0 35px;
        }
      }
    </style>
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
          <div class="swiper-slide">
            <div class="swiper-zoom-container">
              <img
                src="./images/carousel/IMG_15372.png"
                class="w-100 d-block"
              />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container">
              <img
                src="./images/carousel/IMG_40905.png"
                class="w-100 d-block"
              />
            </div>
          </div>

          <div class="swiper-slide">
            <div class="swiper-zoom-container">
              <img
                src="./images/carousel/IMG_62045.png"
                class="w-100 d-block"
              />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container">
              <img
                src="./images/carousel/IMG_62045.png"
                class="w-100 d-block"
              />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container">
              <img
                src="./images/carousel/IMG_99736.png"
                class="w-100 d-block"
              />
            </div>
          </div>
          <div class="swiper-slide">
            <div class="swiper-zoom-container">
              <img
                src="./images/carousel/IMG_99736.png"
                class="w-100 d-block"
              />
            </div>
          </div>
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

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-mb-8 p-2 bg-white">
          <iframe
            class="w-100"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.3305135140567!2d89.20562237533656!3d23.77124207865617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe93815479b2f1%3A0xc77c023655d40590!2sHamja%20Innovative%20Unix!5e0!3m2!1sen!2sbd!4v1714639378794!5m2!1sen!2sbd"
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
              href="tel:+01626699"
            >
              <i class="bi bi-telephone-fill"></i> +01626699
            </a>
          </div>
          <div class="p-3 mb-3 bg-white rounded">
            <h5>Follow Us</h5>
            <a
              class="d-inline-block text-decoration-none text-dark"
              href="tel:+01626699"
            >
              <i class="bi bi-twitter-x pe-1"></i>Twitter
            </a><br>
            <a
              class="d-inline-block text-decoration-none text-dark"
              href="tel:+01626699"
            >
              <i class="bi bi-facebook pe-1"></i>Facebook
            </a><br>

            <a
              class="d-inline-block text-decoration-none text-dark"
              href="tel:+01626699"
            >
            <i class="bi bi-linkedin pe-1"></i> Linkdin</a
            >
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid mt-4">
      <div class="row bg-dark">
        <div class="col-lg-4 col mb-4 text-white p-4">
          <h1 class="merinda">HAMJAIU</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem ipsa placeat qui hic? Esse, ducimus.</p>
        </div>
        <div class="col-lg-4 col mb-4 text-white p-4">
          <h5 class="">Quick links</h5>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Rooms</a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="#">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#"> About Us</a>
            </li>
        </ul>
        </div>
        <div class="col-lg-4 col mb-4 text-white p-4">
         
          <h5>Follow Us</h5>
          <a
            class="d-inline-block text-decoration-none text-white mt-2"
            href="tel:+01626699"
          >
            <i class="bi bi-twitter-x pe-1"></i>Twitter
          </a><br>
          <a
            class="d-inline-block text-decoration-none text-white mt-2"
            href="tel:+01626699"
          >
            <i class="bi bi-facebook pe-1"></i>Facebook
          </a><br>

          <a
            class="d-inline-block text-decoration-none text-white mt-2"
            href="tel:+01626699"
          >
          <i class="bi bi-linkedin pe-1"></i> Linkdin</a
          >
        </div>
        
      </div>
    </div>
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
