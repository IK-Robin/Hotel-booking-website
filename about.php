<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HAMJAIU-About US</title>
    <?php require ("./inc/links.php") ?>
    
    <style>
   .box{
    border-top-color: aqua !important;
   }
    </style>

<!-- swipper carosal  -->

   
   <link
   rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
   />
  </head>

  <body class="bg-light">
    <div class="container-fluid bg-white">
      <div class="container">
        <?php require ("./components/header.php") ?>
      </div>
    </div>
    <!-- our rooms  -->
    <div class="my-5 px-4">
    <h2 class="mt-4 mb-1 pt-4 text-center font-bold merinda  ">ABOUT US</h2>
    <div class="h-line bg-dark mb-5"></div>
    <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nemo animi, ex maxime doloribus non voluptas dignissimos nam facere blanditiis.</p>
    </div>

   <div class="container">
    <div class="row justify-content-center align-items-center py-4">
        <div class="col-md-5 mb-4 col-lg-6 order-2 order-lg-1 order-md-1 mt-3">
            <h2>Lorem ipsum dolor sit amet.</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati illo natus iusto similique numquam, exercitationem maxime soluta nisi quaerat aliquid.</p>
        </div>
        <div class="col-md-5 mb-4 col-lg-6  order-1 order-lg-2 order-md-2">
            <img src="./images/about/about.jpg" class="w-100" alt="">
        </div>
    </div>
   </div>
    
   <div class="container m-5">
    <div class="row ">
        <div class=" col-md-3  col-lg-3 mb-5 px-4 " >
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="./images/about/hotel.svg" width="70px" alt="">
            <h4 class="mt-3">100+Rooms</h4>
           </div>
        </div>
        <div class=" col-md-6 col-lg-3 " >
           <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="./images/about/customers.svg" width="70px" alt="">
            <h4 class="mt-3">100+Customer</h4>
         
           </div>
           
        </div>
        <div class=" col-md-3  col-lg-3 mb-5 px-4 " >
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="./images/about/rating.svg" width="70px" alt="">
            <h4 class="mt-3">150 + Reviews</h4>
            </div>
        </div>
        <div class=" col-md-3  col-lg-3 mb-5 px-4 " >
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="./images/about/staff.svg" width="70px" alt="">
            <h4 class="mt-3">200 + Staffs</h4>
            </div>
        </div>
    </div>
   </div>


   <div class="my-5 px-4">
    <h2 class="mt-4 mb-1 pt-4 text-center font-bold merinda  ">Our Team MEMBERS</h2>
    <div class="h-line bg-dark mb-5"></div>
    <!-- add carosal slider -->
    <div class="container mb-5 py-3 ">
      
      <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5">

             <div class="swiper-slide text-center">
                <img src="./images//about/about.jpg" class="w-100" alt="">
                <div class="h6">Random Name </div>
            </div>
             <div class="swiper-slide text-center">
                <img src="./images/about/IMG_16569.jpeg" class="w-100" alt="">
                <div class="h6">Random Name </div>
            </div>
             <div class="swiper-slide text-center">
                <img src="./images/about/about.jpg" class="w-100" alt="">
                <div class="h6">Random Name </div>
            </div>
             <div class="swiper-slide text-center">
                <img src="./images//about/about.jpg" class="w-100" alt="">
                <div class="h6">Random Name </div>
            </div>
             <div class="swiper-slide text-center">
                <img src="./images/about/IMG_16569.jpeg" class="w-100" alt="">
                <div class="h6">Random Name </div>
            </div>
             <div class="swiper-slide text-center">
                <img src="./images/about/about.jpg" class="w-100" alt="">
                <div class="h6">Random Name </div>
            </div>
      

    </div>
    <div class="swiper-pagination"></div>
  </div>
    </div>
    <?php require("components/footer.php"); ?>

  
    <!-- swiper js  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
   var swiper = new Swiper(".mySwiper", {
    slidesPerView:4,
            spaceBetween:30,
            loop:true,
            autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
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
            slidesPerView: 3,
            spaceBetween: 40,
          },
          1024:{
            slidesPerView: 4,
            spaceBetween: 40,
          }
        },
    });
    </script>

  </body>
</html>
