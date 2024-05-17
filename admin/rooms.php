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
<title>Rooms </title>


</head>

<body>

<?php require ("inc/header.php"); ?>
<!-- feature content  -->
<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">




            <!-- general settings  -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title"> Rooms</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                            data-bs-target="#rooms-s">
                            <i class="bi bi-pencil-fill"></i> Add
                        </button>
                    </div>


                    <div class="table-responsive-md" style="height:450px; overflow-y:scroll">

                        <table class="table table-hover border">
                            <thead class="sticky-top ">
                                <tr class="bg-dark text-white">
                                    <th scope="col">SR NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Guests</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quentity</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="rooms_data">

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>





<!-- Modal facility settings  -->
<div class="modal fade " id="rooms-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="rooms_form" autocomplite="off">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Rooms</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="rooms_name" class="form-label"> Name</label>
                            <input id="rooms_name" name="rooms_name" type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="rooms_desc" class="form-label"> Description</label>
                            <input id="rooms_desc" name="rooms_desc" type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="area" class="form-label"> Area</label>
                            <input min="1"  required value="1" id="area" name="area" type="number" class="form-control shadow-none">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input min="1"  required value="1" id="price" name="price" type="number" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="quentity" class="form-label">Quentity</label>
                            <input min="1"  required value="1" id="quentity" name="quentity" type="number"
                                class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="audlt" class="form-label">Audlt (Max)</label>
                            <input id="audlt" required value="1" name="audlt" type="number" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="children" class="form-label">Children (Max)</label>
                            <input id="children" required value="1" name="children" type="number" class="form-control shadow-none">
                        </div>






                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <h5 class="modal-title" id="staticBackdropLabel">Features</h5>

                            <?php

                            $select_facilitey = selectAll('feature_facility');

                            while ($opt = mysqli_fetch_assoc($select_facilitey)) {
                                echo <<<formfacility
                                        
                                            <div calss="form-check">
                                            <label class="form-check-label  mx-3 mt-3" >
                                            <input name="feature" class="form-check-input shadow-none" type="checkbox" value="$opt[id]"> $opt[name]
                                            </label>
                                            </div>
                                    formfacility;
                            }


                            ?>
                        </div>
                        <div class="mb-3 col-md-6">
                            <h5 class="modal-title" id="staticBackdropLabel">Facility</h5>

                            <?php

                            $select_facilitey = selectAll('facilities');

                            while ($opt = mysqli_fetch_assoc($select_facilitey)) {
                                echo <<<formfacility
                                        <div calss="form-check">
                                            
                                            <label class="form-check-label  mx-3 mt-3" >
                                            <input name="facilities" class="form-check-input shadow-none" type="checkbox" value="$opt[id]"> $opt[name]
                                            </label>
                                            </div>
                                    
                                    formfacility;
                            }


                            ?>
                        </div>
                    </div>
                

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn shadow-none" data-bs-dismiss="modal"
                        id="features_close">Close</button>
                    <button  id="rooms_submit" name="rooms_submit" type="submit"
                        class="btn custom_bg">Add</button>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Modal input settings  -->
<div class="modal fade " id="rooms_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="rooms_form_edit" autocomplite="off">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Rooms</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="rooms_name" class="form-label"> Name</label>
                            <input id="rooms_name" name="rooms_name" type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="rooms_desc" class="form-label"> Description</label>
                            <input id="rooms_desc" name="rooms_desc" type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="area" class="form-label"> Area</label>
                            <input min="1"  required  id="area" name="area" type="number" class="form-control shadow-none">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input min="1"  required  id="price" name="price" type="number" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="quentity" class="form-label">Quentity</label>
                            <input min="1"  required  id="quentity" name="quentity" type="number"
                                class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="audlt" class="form-label">Audlt (Max)</label>
                            <input id="audlt" required  name="audlt" type="number" class="form-control shadow-none">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="children" class="form-label">Children (Max)</label>
                            <input id="children" required  name="children" type="number" class="form-control shadow-none">
                        </div>






                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <h5 class="modal-title" id="staticBackdropLabel">Features</h5>

                            <?php

                            $select_facilitey = selectAll('feature_facility');

                            while ($opt = mysqli_fetch_assoc($select_facilitey)) {
                                echo <<<formfacility
                                        
                                            <div calss="form-check">
                                            <label class="form-check-label  mx-3 mt-3" >
                                            <input name="feature" class="form-check-input shadow-none" type="checkbox" value="$opt[id]"> $opt[name]
                                            </label>
                                            </div>
                                    formfacility;
                            }


                            ?>
                        </div>
                        <div class="mb-3 col-md-6">
                            <h5 class="modal-title" id="staticBackdropLabel">Facility</h5>

                            <?php

                            $select_facilitey = selectAll('facilities');

                            while ($opt = mysqli_fetch_assoc($select_facilitey)) {
                                echo <<<formfacility
                                        <div calss="form-check">
                                            
                                            <label class="form-check-label  mx-3 mt-3" >
                                            <input name="facilities" class="form-check-input shadow-none" type="checkbox" value="$opt[id]"> $opt[name]
                                            </label>
                                            </div>
                                    
                                    formfacility;
                            }


                            ?>
                        </div>
                    </div>
                            

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn shadow-none" data-bs-dismiss="modal"
                        id="features_close">Close</button>
                    <button  id="rooms_submit" name="rooms_submit" type="submit"
                        class="btn custom_bg">Add</button>
                </div>
            </div>
                            <input type="hidden" name="hidden_id">
        </form>
    </div>
</div>


<!-- upload images modal  -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="rooms_add_images" tabindex="-1" aria-labelledby="rooms_add_imagesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="">Upload Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="rooms_image">
                            <div class="mb-3">
                                <label for="rooms_image_inp" class="form-label">Chose Image</label>
                                <input required accept="image/*" class="form-control" type="file" id="rooms_image_inp"
                                    name="rooms_image_inp">
                            </div>
                            <input type="hidden" name="rooms_id_img">
                            <button type="submit" class="btn btn-primary  "> Add</button>
        
      </div>

      </form>


      <div class="table-responsive-md" style="height:450px; overflow-y:scroll">

<table class="table table-hover border">
    <thead class="sticky-top">
        <tr class="bg-dark text-white sticky-top">
          
            <th scope="col" width="60%">Image</th>
            <th scope="col">Thumb</th>
            <th scope="col">Delete</th>
           
        </tr>
    </thead>
    <tbody id="rooms_img" class='text-center'>

    </tbody>
</table>

</div>
    </div>
  </div>
</div>





<?php
require ("inc/script.php");
require ("inc/links.php");

?>

<script src="./js/rooms.js"></script>


</body>

</html>