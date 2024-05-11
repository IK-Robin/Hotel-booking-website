<?php

require ('inc/links.php');
require ('db/phplinks.php');




adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features </title>


</head>

<body>

    <?php require ("inc/header.php"); ?>
    <!-- dashbord content  -->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4>Features</h4>



                <!-- general settings  -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title"> Features</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                                data-bs-target="#features-s">
                                <i class="bi bi-pencil-fill"></i> Add
                            </button>
                        </div>
                    </div>
                </div>


        <!-- add featuers table  -->
             <!-- user query  -->
             <div class="card shadow border-0 mb-4 mt-5">
                    <div class="card-body"> <div class="table-responsive-md" style="height:450px; overflow-y:scroll">

                            <table class="table table-hover border">
                                <thead class="sticky-top ">
                                    <tr class="bg-dark text-white">
                                        <th scope="col">SR NO</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="feature_content">
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>

            </div>










        </div>
    </div>



    <!-- Modal general settings  -->
    <div class="modal fade" id="features-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="features_form">


                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Features</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="features_s" class="form-label">Features Name</label>
                            <input id="features_s" name="features_s" type="text" class="form-control shadow-none">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn shadow-none" data-bs-dismiss="modal"
                            id="features_close">Close</button>
                        <button data-bs-dismiss="modal" name="feature_sub" type="sibmit"
                            class="btn custom_bg">Add</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <?php
    require ("inc/script.php");

    ?>
    <script src="./js/feaures.js"></script>

</body>

</html>