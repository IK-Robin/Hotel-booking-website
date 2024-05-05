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
              <div class="border bg-light p-3 rounded mb-3">
                <h6 class="mb-3">CHECK AVAILABILITY</h6>
                <div class="">
                  <label for="data_ofbarth" class="form-label">Check In Date
                  </label>
                  <input type="date" class="form-control shadow-none" id="data_ofbarth" />
                </div>
                <div class="">
                  <label for="data_ofbarth" class="form-label">Check out Date
                  </label>
                  <input type="date" class="form-control shadow-none" id="data_ofbarth" />
                </div>
              </div>
              <div class="border bg-light p-3 rounded mb-3">
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
              <div class="border bg-light p-3 rounded mb-3">
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
      <div class="col-lg-9 col-md-12">

        <!-- card  -->
        <div class="card mb-3 border-0 shadow" >
          <div class="row g-3 p-3 align-items-center">
            <div class="col-md-5">
              <img src="./images/rooms/IMG_11892.png" class="w-100 rounded" alt="...">
            </div>
            <div class="col-md-5">
              <div class="card-body p-0 ">
                <h5 class="card-title">Simple Rooms </h5>
                
                <!-- frature  -->
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
                <!-- Facilites -->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilites</h6>
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
              </div>
            </div>
            <div class="col-md-2 text-align-center">
                <h6 class="mb-4"> $150 per night</h6>
                <a href="#" class="btn btn-sm w-100 text-white custom_bg mb-2"> Book Now</a>
                <a href="#" class="btn btn-sm w-100  btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
        <!-- card  -->
        <div class="card mb-3 border-0 shadow" >
          <div class="row g-3 p-3 align-items-center">
            <div class="col-md-5">
              <img src="./images/rooms/IMG_11892.png" class="w-100 rounded" alt="...">
            </div>
            <div class="col-md-5">
              <div class="card-body p-0 ">
                <h5 class="card-title">Simple Rooms </h5>
                
                <!-- frature  -->
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
                <!-- Facilites -->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilites</h6>
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
              </div>
            </div>
            <div class="col-md-2 text-align-center">
                <h6 class="mb-4"> $150 per night</h6>
                <a href="#" class="btn btn-sm w-100 text-white custom_bg mb-2"> Book Now</a>
                <a href="#" class="btn btn-sm w-100  btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
        <!-- card  -->
        <div class="card mb-3 border-0 shadow" >
          <div class="row g-3 p-3 align-items-center">
            <div class="col-md-5">
              <img src="./images/rooms/IMG_11892.png" class="w-100 rounded" alt="...">
            </div>
            <div class="col-md-5">
              <div class="card-body p-0 ">
                <h5 class="card-title">Simple Rooms </h5>
                
                <!-- frature  -->
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
                <!-- Facilites -->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilites</h6>
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
              </div>
            </div>
            <div class="col-md-2 text-align-center">
                <h6 class="mb-4"> $150 per night</h6>
                <a href="#" class="btn btn-sm w-100 text-white custom_bg mb-2"> Book Now</a>
                <a href="#" class="btn btn-sm w-100  btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
        <!-- card  -->
        <div class="card mb-3 border-0 shadow" >
          <div class="row g-3 p-3 align-items-center">
            <div class="col-md-5">
              <img src="./images/rooms/IMG_11892.png" class="w-100 rounded" alt="...">
            </div>
            <div class="col-md-5">
              <div class="card-body p-0 ">
                <h5 class="card-title">Simple Rooms </h5>
                
                <!-- frature  -->
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
                <!-- Facilites -->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilites</h6>
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
              </div>
            </div>
            <div class="col-md-2 text-align-center">
                <h6 class="mb-4"> $150 per night</h6>
                <a href="#" class="btn btn-sm w-100 text-white custom_bg mb-2"> Book Now</a>
                <a href="#" class="btn btn-sm w-100  btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>
        <!-- card  -->
        <div class="card mb-3 border-0 shadow" >
          <div class="row g-3 p-3 align-items-center">
            <div class="col-md-5">
              <img src="./images/rooms/IMG_11892.png" class="w-100 rounded" alt="...">
            </div>
            <div class="col-md-5">
              <div class="card-body p-0 ">
                <h5 class="card-title">Simple Rooms </h5>
                
                <!-- frature  -->
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
                <!-- Facilites -->
                <div class="facilities mb-4">
                  <h6 class="mb-1">Facilites</h6>
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
              </div>
            </div>
            <div class="col-md-2 text-align-center">
                <h6 class="mb-4"> $150 per night</h6>
                <a href="#" class="btn btn-sm w-100 text-white custom_bg mb-2"> Book Now</a>
                <a href="#" class="btn btn-sm w-100  btn-outline-dark shadow-none">More Details</a>
            </div>
          </div>
        </div>













        
      </div>




    </div>
    </nav>
  </div>
  






  <?php require ("components/footer.php"); ?>

</body>

</html>