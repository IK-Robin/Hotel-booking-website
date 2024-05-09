
<?php

require("admin/db/phplinks.php"); 



// featch site title us data 

$contact_data = "SELECT * FROM `site_title` WHERE sr_no =?";
$val =[1];
$data = select($contact_data,$val,'i');
$site_title = mysqli_fetch_assoc($data);



?>

<header>
    <nav id="navbers" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand merinda" href="#"><?php echo $site_title['site_name'] ?></a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">Rooms</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="contact-us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="about.php"> About Us</a>
                    </li>
                </ul>


                <!-- input modal for login  -->
                <!-- Button trigger modal -->
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        Login
                    </button>

                    <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        Register 
                    </button>

                </div>



            </div>
        </div>
    </nav>



    <!-- login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center " id="exampleModalLabel"> <i
                                class="bi bi-person-circle me-2 fs-3"></i>User Login</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="userLoginInput" class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" id="userLoginInput"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none" id="userPassword"
                                aria-describedby="emailHelp">

                        </div>
                        <div class=" d-flex align-items-center justify-content-between">
                            <button type="submit" class="btn btn-dark shadow-none">Submit</button>
                            <a href="javascript:voiad(0)">Forget password</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>


    <!-- register modal  -->



    <div class="modal fade " id="registerModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center " id="exampleModalLabel"> <i
                                class="bi bi-person-circle me-2 fs-3"></i>User Register</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <form>
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control shadow-none" id="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control shadow-none" id="emain">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Phone" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control shadow-none" id="Phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="formFile" class="form-label">cose file</label>
                                        <input class="form-control shadow-none" type="file" id="formFile">
                                </div>

                                <div class="col-md-6">
                                        <label for="pincode" class="form-label">pincode </label>
                                        <input type="number" class="form-control shadow-none" id="pincode">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="data_ofbarth" class="form-label">Date of Birth </label>
                                        <input type="date" class="form-control shadow-none" id="data_ofbarth">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Passeowd </label>
                                        <input type="password" class="form-control shadow-none" id="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cpassword" class="form-label">Confarm Passeowd </label>
                                        <input type="password" class="form-control shadow-none" id="cpassword">
                                    </div>


                            </div>

                            <div class="text-center my-3 ">
                            <button type="submit" class="btn btn-dark shadow-none">Submit</button>
                            </div>
                    </div>
            </form>


            <!-- <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control shadow-none" id="name"
                                >
                        </div>
                        <div class="mb-3">
                            <label for="userLoginInput" class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" id="userLoginInput"
                                aria-describedby="emailHelp">
                        </div>
                            <div class="mb-3">
                                <label for="userPassword" class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none" id="userPassword"
                                    aria-describedby="emailHelp">

                            </div>


                            <div class=" d-flex align-items-center justify-content-between">
                                <button type="submit" class="btn btn-dark shadow-none">Submit</button>
                                <a href="javascript:voiad(0)">Login</a>
                            </div> -->


        </div>
        </form>
    </div>
    </div>
    </div>
</header>