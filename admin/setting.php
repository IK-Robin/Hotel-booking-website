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
                <div class="card shadow-sm border-0 mb-4">
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


                <!-- shoutdown mode  -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title"> Shoutdown Website</h5>
                            <!-- Button trigger modal -->
                            <form action="">
                                <div class="form-check form-switch">
                                    <input name="shoutdoWn" id="shoutdoWn" class="form-check-input" type="checkbox"
                                        id="flexSwitchCheckChecked">

                                </div>
                            </form>
                        </div>





                    </div>
                </div>




                <!-- Modal general settings  -->
                <div class="modal fade" id="generalSetting" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="genereal_from">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Genarel Settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="Site_Title" class="form-label">Site Title</label>
                                        <input id="site_title_inp" name="site_title_inp" type="text"
                                            class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">

                                        <label for="Site_Title" class="form-label">Address</label>
                                        <textarea id="site_address_inp" name="generel_address" class="form-control"
                                            aria-label="With textarea"></textarea>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn shadow-none" data-bs-dismiss="modal"
                                        id="general_close">Close</button>
                                    <button data-bs-dismiss="modal" id="generel_submit" name="generel_submit"
                                        type="button" class="btn custom_bg">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>




                <!-- Contact us  -->
                <div class="card shadow border-0 mb-4 mt-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title"> Contact us</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                                data-bs-target="#admin_contactPage">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="cart-subtitle mb-1 fw-bold">Address</h6>
                                    <p id="address" class="card-text">Lorem ipsum dolor sit amet.</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="cart-subtitle mb-1 fw-bold">Phone</h6>
                                    <p id="phone_no" class="card-text">Lorem ipsum dolor sit amet.</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="cart-subtitle mb-1 fw-bold">Email</h6>
                                    <p id="email" class="card-text">Lorem ipsum dolor sit amet.</p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="cart-subtitle mb-1 fw-bold">Facebook</h6>
                                    <p id="facebook" class="card-text">Lorem ipsum dolor sit amet.</p>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-4">
                                    <h6 class="cart-subtitle mb-1 fw-bold">Twitter</h6>
                                    <p id="twitter" class="card-text">Lorem ipsum dolor sit amet.</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="cart-subtitle mb-1 fw-bold">Instragram</h6>
                                    <p id="instragram" class="card-text">Lorem ipsum dolor sit amet.</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="cart-subtitle mb-1 fw-bold">Linkdin</h6>
                                    <p id="linkdin" class="card-text">Lorem ipsum dolor sit amet.</p>
                                </div>
                                <iframe id="google_map" class="w-100 " height="200"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.3305135140567!2d89.20562237533656!3d23.77124207865617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe93815479b2f1%3A0xc77c023655d40590!2sHamja%20Innovative%20Unix!5e0!3m2!1sen!2sbd!4v1714639378794!5m2!1sen!2sbd"
                                    height="450" style="border: 0" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>


                    </div>
                </div>



                <!-- Modal contact us  -->
                <div class="modal fade" id="admin_contactPage" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contact_from">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Genarel Settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row" id="getid">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="Site_Title" class="form-label">Address</label>
                                                    <textarea id="c_address" name="c_address" aria-label="With textarea"
                                                        class="form-control" rows="" style="height: 38px;"></textarea>

                                                </div>
                                                <div class="mb-3">

                                                    <label for="Site_Title" class="form-label">Phone</label>
                                                    <input id="c_phone" name="c_phone" type="tel"
                                                        class="form-control shadow-none">

                                                </div>
                                                <div class="mb-3">

                                                    <label for="Site_Title" class="form-label">Email</label>
                                                    <input id="c_email" name="c_email" type="email"
                                                        class="form-control shadow-none">

                                                </div>
                                                <div class="mb-3">

                                                    <label for="Site_Title" class="form-label">Facebook</label>
                                                    <input id="c_facebook" name="c_facebook" type="text"
                                                        class="form-control shadow-none">

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">

                                                    <label for="Site_Title" class="form-label">Twitter</label>
                                                    <input id="c_twitter" name="c_twitter" type="text"
                                                        class="form-control shadow-none">

                                                </div>

                                                <div class="mb-3">

                                                    <label for="Site_Title" class="form-label">Instragram</label>
                                                    <input id="c_instragram" name="c_instragram" type="text"
                                                        class="form-control shadow-none">

                                                </div>
                                                <div class="mb-3">

                                                    <label for="Site_Title" class="form-label">Linkdin</label>
                                                    <input id="c_link" name="c_link" type="text"
                                                        class="form-control shadow-none">

                                                </div>
                                                <div class="mb-3">

                                                    <label for="Site_Title" class="form-label">Google map Link</label>
                                                    <input id="google_map_inp" name="google_map_inp" type="text"
                                                        class="form-control shadow-none">

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="get_contact_us_data()" class="btn shadow-none"
                                        data-bs-dismiss="modal" id="general_close">Close</button>
                                    <button data-bs-dismiss="modal" name="generel_submit" type="submit"
                                        class="btn custom_bg">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>






                <!-- Manage ment teem  -->
                <div class="card shadow border-0 mb-4 mt-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title"> Manage ment Teem</h5>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                                data-bs-target="#admin_manage_teem">
                                <i class="bi bi-person-plus-fill"></i> Add
                            </button>
                        </div>
                        <div class="row" id="team_member_section">
                           


                        </div>


                    </div>
                </div>




                <!-- Modal manage teem  -->
                <div class="modal fade" id="admin_manage_teem" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="add_member">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="site_title_inp" class="form-label">Name </label>
                                        <input id="team_menber_name" name="team_menber_name" type="text"
                                            class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label for="manage_team_file" class="form-label">Chose image</label>
                                        <input accept="image/*" class="form-control" type="file" id="manage_team_file"
                                            name="manage_team_file">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="team_menber_name.value ='',manage_team_file.value='',alerts('error','No member added')" class="btn shadow-none" data-bs-dismiss="modal"
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
    <script src="./js/settings.js"></script>

</body>

</html>