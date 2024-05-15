<?php
require ('../db/phplinks.php');
adminLogin();

if (isset($_POST['add_rooms'])) {
    $facility = filtaration(json_decode($_POST['facility']));
    $featurs = filtaration(json_decode($_POST['featurs']));
    $rooms_data = filtaration($_POST);
    $flag = 0;

    $q = "INSERT INTO `rooms`( `rooms_names`, `area`, `price`, `quentity`, `audlt`, `children`,  `rooms_desc`) VALUES (?,?,?,?,?,?,?)";
    $valuse = [$rooms_data['rooms_name'], $rooms_data['area'], $rooms_data['price'], $rooms_data['quentity'], $rooms_data['audlt'], $rooms_data['children'], $rooms_data['rooms_desc']];
    $room_res = inserts($q, $valuse, 'siiiiis');
    if (isset($room_res)) {
        $flag = 1;
    }

    // add rooms $facilitye

    $room_facility = "INSERT INTO `room_facility`(`rooms_id`, `facility_id`) VALUES (?,?)";

    $rooms_id = mysqli_insert_id($conn);

    if ($stmt = mysqli_prepare($conn, $room_facility)) {
        foreach ($facility as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $rooms_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('server error');
    }

    $room_features = "INSERT INTO `room_featurs`(`room_id`, `featurs_id`) VALUES (?,?)";
    // check for facility 
    if ($stmt = mysqli_prepare($conn, $room_features)) {
        foreach ($featurs as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $rooms_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('server error');
    }


    if ($flag == 1) {
        echo 1;
    } else {
        echo 0;
    }

}


// get all rooms data  
if (isset($_POST['get_all_rooms'])) {
    $res = selectAll('rooms');
    $i = 1;
    $data = "";
    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['status'] == 1) {
            $status = "<button onclick='rooms_active_inactive($row[id],0)' class='btn btn-dark btn-sm shadow-none'> Active</button>";
        } else {
            $status = "<button onclick='rooms_active_inactive($row[id],1)' class='btn btn-warning btn-sm shadow-none'> Inactive</button>";
        }
        $data .= "
        <tr>
        <td> $i </td>
        <td> $row[rooms_names] </td>
      
        <td> $row[area] </td>
        <td> $row[price] </td>
        <td> $row[quentity] </td>
        <td> $row[audlt] </td>
        <td> $status </td>
        <td> <button data-bs-toggle='modal'data-bs-target='#rooms_edit' onclick='featch_rooms_data($row[id])' class='btn btn-dark btn-sm shadow-none'> More</button>  </td>
        </tr>"

        ;
        $i++;
    }
    echo $data;
}

if (isset($_POST['toggle_statue'])) {
    $frm_data = filtaration($_POST);
    $q = "UPDATE `rooms` SET `status`=? WHERE id=?";

    $values = [$frm_data['value'], $frm_data['toggle_statue']];

    $res = update($q, $values, 'ii');
    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
}


// get all data for rooms image 

if (isset($_POST['get_rooms_data'])) {
    $frm_data = filtaration($_POST);

    $q1 = select("SELECT * FROM `rooms` WHERE `id` =?", [$frm_data['get_rooms_data']], 'i');
    $q22 = select("SELECT * FROM `room_featurs` WHERE `room_id` =?", [$frm_data['get_rooms_data']], 'i');

    $q3 = select("SELECT * FROM `room_facility`WHERE `rooms_id` =?", [$frm_data['get_rooms_data']], 'i');
    $rooms = mysqli_fetch_assoc($q1);

    // get features data ;





    $featuresarray = [];
    if (mysqli_num_rows($q22) > 0) {
        while ($row = mysqli_fetch_assoc($q22)) {

            $featuresarray[] = $row['featurs_id'];
        }
    }

    $facility_arr = [];
    if (mysqli_num_rows($q3) > 0) {
        while ($row = mysqli_fetch_assoc($q3)) {
            $facility_arr[] = $row['facility_id'];
        }
    }
    $data = ["roomsData" => $rooms, "features" => $featuresarray, "facility" => $facility_arr];
    echo json_encode($data);


}


// edit rooms data 
if (isset($_POST['edit_rooms'])) {
    $facility = filtaration(json_decode($_POST['facility']));
    $featurs = filtaration(json_decode($_POST['featurs']));
    $rooms_data = filtaration($_POST);
    // Assuming filtaration() function does necessary data filtering and sanitization
    $flag = 0;
    // Prepare the query
    $rooms_q = "UPDATE `rooms` SET `rooms_names`=?, `area`=?, `price`=?, `quentity`=?, `audlt`=?, `children`=?, `rooms_desc`=? WHERE id=?";

    // Prepare the values
    $values = [
        $rooms_data['rooms_name'],
        $rooms_data['area'],
        $rooms_data['price'],
        $rooms_data['quentity'],
        $rooms_data['audlt'],
        $rooms_data['children'],
        $rooms_data['rooms_desc'],
        $rooms_data['hidden_id']
    ];

    // Execute the query
    $res = update($rooms_q, $values, 'siiiiisi');

    // Check if the update was successful
    if ($res) {
        $flag = 1;



    }

    $delete_facility = deletes("DELETE FROM `room_facility` WHERE rooms_id=?", [$rooms_data['hidden_id']], 'i');
    $delete_features = deletes("DELETE FROM `room_featurs` WHERE room_id=?", [$rooms_data['hidden_id']], 'i');

    if ($delete_facility && $delete_features) {

    }


    // add again facility 
    // add rooms $facilitye again after deletation

    $room_facility = "INSERT INTO `room_facility`(`rooms_id`, `facility_id`) VALUES (?,?)";

    $rooms_id = mysqli_insert_id($conn);

    if ($stmt = mysqli_prepare($conn, $room_facility)) {
        foreach ($facility as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $rooms_data['hidden_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        echo mysqli_error($connection);
    }

    $room_features = "INSERT INTO `room_featurs`(`room_id`, `featurs_id`) VALUES (?,?)";
    // check for facility 
    if ($stmt = mysqli_prepare($conn, $room_features)) {
        foreach ($featurs as $f) {
            mysqli_stmt_bind_param($stmt, 'ii', $rooms_data['hidden_id'], $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        $flag = 0;
        die('server error');
    }




    if ($flag == 1) {
        echo 1;
    } else {
        echo 0;
    }
}


?>