<?php

require ("../db/phplinks.php");

if (isset($_GET['featch_rooms'])) {
   $check_aval = json_decode($_GET['check_aval'],true);

   

    $output = "";
    $count = 0;
    // Fetch rooms that are active and not removed
    $res = select("SELECT * FROM `rooms` WHERE `status`=? AND `remove`=?", [1, 0], 'ii');

    $rooms_path = ROOM_IMG_PATH;
    while ($row = mysqli_fetch_assoc($res)) {
        // Fetch the room ID from the current room row
        $room_id = $row['id']; // Assuming there's an 'id' column in your `rooms` table

        // Fetch facilities for the current room
        $rooms_facilities = mysqli_query($conn, "SELECT f.name FROM `facilities` f INNER JOIN `room_facility` rfec ON f.id = rfec.facility_id WHERE rfec.rooms_id = $room_id");

        // Loop through the facilities and collect them
        $facilities = "";
        while ($room_f = mysqli_fetch_assoc($rooms_facilities)) {
            $facilities .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_f['name']}</span> ";
        }

        // Fetch features for the current room
        $room_featuress = mysqli_query($conn, "SELECT feature.name FROM `feature_facility` feature INNER JOIN `room_featurs` rFeaturs ON feature.id = rFeaturs.featurs_id WHERE rFeaturs.room_id = $room_id");

        // Loop through the features and collect them
        $featurss = "";
        while ($room_feat = mysqli_fetch_assoc($room_featuress)) {
            $featurss .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_feat['name']}</span> ";
        }

        // Get room's image
        $room_image = mysqli_query($conn, "SELECT * FROM `rooms_images` WHERE `rooms_id` = $room_id AND `thumb` = 1");
        $room_img_path = ROOM_IMG_PATH . 'thumbnail.jpg';
        if (mysqli_num_rows($room_image) > 0) {
            $room_img_paths = mysqli_fetch_assoc($room_image);
            $room_img_path = ROOM_IMG_PATH . $room_img_paths['img_name'];
        }

        // Output the collected data

        $output .="<div class='card mb-3 border-0 shadow'>
        <div class='row g-3 p-3 align-items-center'>
            <div class='col-md-5'>
                <img src='$room_img_path' class='w-100 rounded' alt='Room Image'>
            </div>
            <div class='col-md-5'>
                <div class='card-body p-0'>
                    <h5 class='card-title'>{$row['rooms_names']}</h5>
                    <!-- Features -->
                    <div class='features mb-4'>
                        <h6 class='mb-1'>Features</h6>
                        $featurss
                    </div>
                    <!-- Facilities -->
                    <div class='facilities mb-4'>
                        <h6 class='mb-1'>Facilities</h6>
                        $facilities
                    </div>
                </div>
            </div>
            <div class='col-md-2 text-center'>
                <h6 class='mb-4'>$$row[price] per night</h6>
                <a href='books_room.php?room_id= $room_id'  class='btn btn-sm w-100 text-white custom_bg mb-2'>Book Now</a>

                <a href='rooms_description.php?id=$room_id' class='btn btn-sm w-100 btn-outline-dark shadow-none'>More Details</a>
            </div>
        </div>
    </div>";
        $count ++;

    }

    if($count  > 0){

        echo $output;
    }else{
        echo '<h3 class="text-center text-danger "> No Rooms  to Show  </h3>';
    }

}
?>