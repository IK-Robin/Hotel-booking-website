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
    $res = select("SELECT * FROM `rooms` WHERE `remove`=?",[0],'i');
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
        <td> 
        <button title='Edit' data-bs-toggle='modal'data-bs-target='#rooms_edit' onclick='featch_rooms_data($row[id])' class='btn btn-primary btn-sm shadow-none'> <i class='bi bi-pencil-square'></i></button>  

        <button title='Add Images' data-bs-toggle='modal'data-bs-target='#rooms_add_images' onclick='add_rooms_id_to_image($row[id])' class='btn btn-primary btn-sm shadow-none'> <i class='bi bi-images'></i></button>  
        <button title='Add Images'  onclick='delete_rooms_id($row[id])' class='btn btn-primary btn-sm shadow-none'><i class='bi bi-trash3-fill'></i></button>  
        </td>
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
        $flag = 1;
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


// add rooms images 

if(isset($_POST['rooms_img_add'])){
    $rooms_img = filtaration($_POST);

    
 $img_upload =   uploadImage($_FILES['rooms_img'],ROOMS_FOLDER);

 if($img_upload =='inv_img'){
    echo 'inv_img';
 }else if($img_upload =='upd_failed'){
    echo 'upd_failed';
 }else if($img_upload =='inv_size'){
    echo 'inv_size';
 }else{
    

    $values =[$img_upload,$rooms_img['rooms_id']];
    $q = "INSERT INTO `rooms_images`(`img_name`, `rooms_id`) VALUES (?,?)";
    $res = inserts($q,$values,'si');
    echo $res;
 }

}


// get all rooms data  
if (isset($_POST['show_rooms_imgs'])) {
    $frm_data = filtaration($_POST);

    $res = select("SELECT * FROM `rooms_images` WHERE `rooms_id`=?",[$frm_data['show_rooms_imgs']],'i');
   
    $i = 1;
    $data = "";
    $thumb_btn="";
    if(mysqli_num_rows($res)>=0){
        while($row = mysqli_fetch_assoc($res)){
            $font_end_path = ROOM_IMG_PATH;
            if($row['thumb'] ==1){
                $thumb_btn = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded '></i>";
            }else{
                $thumb_btn = "<button type='button' onclick='thumb_rooms_img($row[sr_no],$row[rooms_id])' class='btn btn-primary btn-sm'><i class='bi bi-check-lg'></i></button>";
            }

        
        $data .= "
        <tr >

        <td> <img class='w-100' src='$font_end_path$row[img_name]'></td>
      
        <td>

           $thumb_btn
        </td>
        <td>
        <button type='button' onclick='delete_rooms_img($row[sr_no],$row[rooms_id])' class='btn btn-danger btn-sm'><i class='bi bi-trash3-fill'></i></button>
        </td>
        </tr>"

        ;
   
        
        }}
        echo  $data;
}
// add thumbnil 
if(isset($_POST['add_tumb'])){
    $frm_data = filtaration($_POST);
    $valu = [$frm_data['room_id'],$frm_data['room_sr_no']];
    $quer_1 = "UPDATE `rooms_images` SET `thumb`=? WHERE `rooms_id`=?";
    update($quer_1,[0,$frm_data['room_id']],'ii');
    

    // change the thumbnil status 
    $thum_q = "UPDATE `rooms_images` SET`thumb`=? WHERE sr_no=? AND  rooms_id=?";
    $thum_u = update($thum_q,[1,$frm_data['room_sr_no'],$frm_data['room_id']],'iii');
    if($thum_u){
    echo $thum_u;    
    }



}


// delete all rooms images 

if(isset($_POST['delete_rooms_img'])){

$frm_data = filtaration($_POST);
$value = [$frm_data['delete_rooms_img']];
 $select_img_q = "SELECT * FROM `rooms_images` WHERE sr_no =?";
 $res = select($select_img_q,$value,'i');
 $data = mysqli_fetch_assoc($res);
 $m_img = $data['img_name']; 


 if(deleteImage($m_img,ROOMS_FOLDER)){
    
    
    $delet_q = "DELETE FROM `rooms_images` WHERE sr_no =?";
    $del_row = deletes($delet_q,$value,'i');
    if($del_row){
      echo $del_row;
    }else{
      echo "Can't delete the member";
    }
  }else{
    echo  'Delete faild';
  }
}



// delete rooms 
if(isset($_POST['delete_rooms'])){
    $frm_data = filtaration($_POST);
    // $value = [$frm_data['delete_rooms']];
    // $delete_q = "DELETE FROM `rooms` WHERE id =?";  
    // $del_row = deletes($delete_q,$value,'i');

    // delete rooms images 
    
    $res1= select("SELECT * FROM `rooms_images` WHERE rooms_id =?",[$frm_data['delete_rooms']],'i');
    while($row= mysqli_fetch_assoc($res1)){
        deleteImage($row['img_name'],ROOMS_FOLDER);
    }
    $res2 = deletes("DELETE FROM `rooms_images` WHERE rooms_id=?",[$frm_data['delete_rooms']],'i');
    $res3 = deletes("DELETE FROM `room_facility` WHERE rooms_id=?",[$frm_data['delete_rooms']],'i');
    $res4 = deletes("DELETE FROM `room_featurs` WHERE rooms_id=?",[$frm_data['delete_rooms']],'i');
    $res5 = update("UPDATE `rooms` SET `remove`=? WHERE `id`=?",[1,$frm_data['delete_rooms']],'ii');
    if($res2 ||$res3 ||$res4 ||$res5 ){
        echo 1;
    }else {
        echo 0;
    }
}





?>