<?php

require ('inc/links.php');
require ('db/phplinks.php');


if (isset($_GET['seen'])) {
    $frm_data = filtaration($_GET);


    if ($frm_data['seen'] == 'all') {
        $q = "UPDATE `user_query` SET `seen`=? ";
        $val = [1];
        $res = update($q, $val, 'i');
        if ($res) {
            alert('success', 'mark all read ');
            header("Location: user_query.php"); 
        } else {
            alert('error', 'servre not found ');
        }
    } else {
        $q = "UPDATE `user_query` SET `seen`=? WHERE sr_no =?";
        $val = [1, $frm_data['seen']];
        $res = update($q, $val, 'ii');
        if ($res) {
            alert('success', 'servre not found ');
            header("Location: user_query.php"); 
        } else {
            alert('error', 'servre not found ');
        }
    }
}


if (isset($_GET['del'])) {

    $fil_dat = filtaration($_GET);
    if ($fil_dat['del'] == 'all') {
       
        $q = "DELETE FROM `user_query`";
       
        if (mysqli_query($conn, $q)) {
            alert('success', 'Message delete successful');
            header("Location: user_query.php"); // Redirect to user_query.php
            exit(); // Stop further execution
        } else {
            alert('success', 'Server error, can\'t delete');
        }
    } else {
        $val = [$fil_dat['del']];
        $q = "DELETE FROM `user_query` WHERE sr_no=?";
        $del = deletes($q, $val, 'i');
        if ($del) {
            alert('success', 'Message delete successful');
            header("Location: user_query.php"); // Redirect to user_query.php
            exit(); // Stop further execution
        } else {
            alert('success', 'Server error, can\'t delete');
        }
    }

}

adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User </title>


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

                            <div class="text-end mb-4">
                                <a href="?seen=all" class="btn btn-sm btn-dark shaow-non">Mark all read</a> 
                                <a href="?del=all" class="btn btn-sm btn-danger shaow-non">Delete all </a> 
                            </div>

                        <div class="table-responsive-md" style="height:450px; overflow-y:scroll">

                            <table class="table table-hover border">
                                <thead class="sticky-top ">
                                    <tr class="bg-dark text-white">
                                        <th scope="col">SR NO</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $q = "SELECT * FROM `user_query` ORDER BY `sr_no` DESC";
                                    $data = mysqli_query($conn, $q);

                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $seen = '';
                                        if ($row['seen'] != 1) {
                                            $seen = "<a href ='?seen=$row[sr_no]' class='btn btn-sm btn-primary d-block'> Mark as read</a>";
                                        }

                                        $seen .= "<a href ='?del=$row[sr_no]' class='btn btn-sm btn-danger  d-block mt-2 '> Delete</a>";
                                        echo <<<tableRow
        <tr>
      
            <td>$i</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[subject]</td>
            <td>$row[message]</td>
            <td>$row[date]</td>
            <td>$seen</td>
      
            
        </tr>

     tableRow;
                                        $i++;
                                    }


                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>
            </div>




            <!-- Modal manage teem  -->
            <div class="modal fade" id="admin_carosal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <button type="button"
                                    onclick="add_carosal_img.value ='',add_carosal_img.value='',alerts('error','No member added')"
                                    class="btn shadow-none" data-bs-dismiss="modal" id="general_close">Close</button>
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