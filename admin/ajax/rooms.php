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

    $room_features = "INSERT INTO `room_featurs`(`rm_id`, `featurs_id`) VALUES (?,?)";
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
    $i =1;
    $data = "";
    while ($row = mysqli_fetch_assoc($res)) {
   if($row['status'] ==1){
    $status= "<button onclick='toggleStatus($row[id],0)' class='btn btn-dark btn-sm shadow-none'> Active</button>";
   }else{
    $status= "<button onclick='toggleStatus($row[id],1)' class='btn btn-warning btn-sm shadow-none'> Inactive</button>";
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
        <td> <button class='btn btn-dark btn-sm shadow-none'> More</button>  </td>
        </tr>"

        ;
        $i++;
    }
    echo $data;
}

?>