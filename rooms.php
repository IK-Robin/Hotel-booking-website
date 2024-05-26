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
      <?php require ("./components/header.php") ?>
    </div>
  </div>
  <!-- our rooms  -->
  <div class="my-5 px-4">
    <h2 class="mt-4 mb-1 pt-4 text-center font-bold merinda">OUR ROOMS</h2>
    <div class="h-line bg-dark mb-5"></div>
  </div>
  <div class="container">
    <div class="row">
      <!-- add side bar  -->
      <div class="col-lg-3  " id="filter_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
          <div class="container-fluid  d-flex flex-lg-column align-items-stretch">
            <h6 class="mt-2 ps-3">Filters</h6>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
              data-bs-target="#rooms_filter" aria-controls="rooms_filter" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-lg-column mt-2 align-items-stretch " id="rooms_filter">
              <div class=" bg-light rounded mb-3">
                <h6 class="mb-3 d-flex justify-content-between">CHECK AVAILABILITY 
                  <span id="reset_avail" class=""> Reset</span>
                </h6>
                <div class="">
                  <label for="checkin_date" class="form-label">Check In Date
                  </label>
                  <input type="date" onchange="check_room_aval()" name="checkin_date" class="form-control shadow-none" id="checkin_date" />
                </div>
                <div class="">
                  <label for="checkout_date" class="form-label">Check out Date
                  </label>
                  <input type="date" class="form-control shadow-none" id="checkout_date" name="checkout_date" onchange="check_room_aval()" />
                </div>
              </div>
              <div class=" bg-light rounded mb-3">
                <h6 class="mb-3">FACILITIES</h6>
                <div class="mb-2">

                  <input type="checkbox" class="form-check-input shadow-none" id="f1" />
                  <label for="f1" class="form-label">
                    Facility one
                  </label>

                </div>
                <div class="mb-2">
                  <input type="checkbox" class="form-check-input shadow-none" id="f2" />
                  <label for="f2" class="form-label">
                    Facility two
                  </label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" class="form-check-input shadow-none" id="f3" />
                  <label for="f3" class="form-label">
                    Facility Three
                  </label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" class="form-check-input shadow-none" id="f4" />
                  <label for="f4" class="form-label">
                    Facility Four
                  </label>
                </div>


              </div>
              <div class=" bg-light rounded mb-3">
                <h6 class="mb-3">Guest</h6>
                <div class="mb-2 d-flex ">
                  <div class="guest me-3">
                    <label for="audalt" class="form-label">
                      Audalt
                    </label>
                    <input type="number" class="form-control shadow-none" id="audalt" />

                  </div>



                  <div class="guest">

                    <label for="children" class="form-label">
                      Children
                    </label>
                    <input type="number" class="form-control shadow-none" id="children" />

                  </div>


                </div>


              </div>

            </div>




          </div>
        </nav>
      </div>


      <!-- rooms card  -->
      <div class="col-lg-9 col-md-12 " id="room_data">
     
        
        <!-- card  -->
        <!-- show room from room filter  php file  -->
        <div id="show_aval_room">



        </div>
      </div>




    </div>
    
  </div>







  <?php require ("components/footer.php"); ?>
<script src="./font_end_js/rooms_data.js"></script>
</body>

</html>