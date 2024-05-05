<?php
require ("db/eshential.php");
require ('inc/links.php');


adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting </title>


</head>

<body>

    <?php require ("inc/header.php"); ?>
    <!-- dashbord content  -->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4>Setting</h4>

                <!-- general settings  -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title"> Genarel Settings</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                                data-bs-target="#generalSetting">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-2 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"> Content</p>
                        <h6 class="card-subtitle mb-2 fw-bold">About Us</h6>
                        <p class="card-text" id="site_address"> Content</p>


                    </div>
                </div>





                <!-- Modal -->
                <div class="modal fade" id="generalSetting" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="genereal_from" >


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Genarel Settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="Site_Title" class="form-label">Site Title</label>
                                        <input  name="site_title_inp" type="text" class="form-control shadow-none" id="Site_itle"
                                            >
                                    </div>
                                    <div class="mb-3">
                                  
                                    <label for="Site_Title" class="form-label">Address</label>
                                        <textarea id="site_address_inp" name="generel_address" class="form-control" aria-label="With textarea"></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn shadow-none" data-bs-dismiss="modal">Close</button>
                                    <button  name="generel_submit" type="submit" class="btn custom_bg">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php 
    require ("inc/script.php");
  
     ?>
<script src="./js/settings.js"></script>

</body>

</html>