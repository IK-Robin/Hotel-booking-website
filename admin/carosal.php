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
    <title>Carosal </title>


</head>

<body>

    <?php require ("inc/header.php"); ?>
    <!-- dashbord content  -->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4>Carosal</h4>

      


                <!-- Manage ment teem  -->
                <div class="card shadow border-0 mb-4 mt-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title">Add Carosal  </h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                                data-bs-target="#admin_carosal">
                                <i class="bi bi-person-plus-fill"></i> Add
                            </button>
                        </div>
                        <div class="row" id="team_member_section">
                           


                        </div>


                    </div>
                </div>




                <!-- Modal manage teem  -->
                <div class="modal fade" id="admin_carosal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="add_carosal">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="site_carosalName" class="form-label">Name </label>
                                        <input id="site_carosalName" name="site_carosalName" type="text"
                                            class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label for="add_carosal_img" class="form-label">Chose image</label>
                                        <input accept="image/*" class="form-control" type="file" id="add_carosal_img"
                                            name="add_carosal_img">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="add_carosal_img.value ='',add_carosal_img.value='',alerts('error','No member added')" class="btn shadow-none" data-bs-dismiss="modal"
                                        id="general_close">Close</button>
                                    <button data-bs-dismiss="modal" id="team_mange_submit" name="team_mange_submit"
                                        type="submit" class="btn custom_bg">Submit</button>
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
    <script src="./js/carosal.js"></script>

</body>

</html>