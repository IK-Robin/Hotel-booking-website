<?php

require ("../db/phplinks.php");

if (isset($_GET['featch_rooms'])) {
    $check_aval = json_decode($_GET['check_aval'], true);
    // check date filter 
    if ($check_aval['checkout_date'] !== '' && $check_aval['checkin_date'] !== '') {

        $today_date = new DateTime(date("Y-m-d"));
        $check_in_date = new DateTime($check_aval['checkin_date']);
        $check_out_date = new DateTime($check_aval['checkout_date']);

        // Check if check-in and check-out dates are equal
        if ($check_in_date == $check_out_date) {
            echo '<h3 class="text-center text-danger "> Invlid Date  </h3>';
            exit;
        }
        // Check if check-out date is earlier than check-in date
        else if ($check_out_date < $check_in_date) {
            echo '<h3 class="text-center text-danger "> Invlid Date  </h3>';
            exit;
        }
        // Check if check-in date is earlier than today's date
        else if ($check_in_date < $today_date) {
            echo '<h3 class="text-center text-danger "> Invlid Date  </h3>';
            exit;
        }

    }

    // check totoal guest 



    $guest = json_decode($_GET['guest_filter'], true);
    $audalt = $guest['audalt'] !== '' ? $guest['audalt'] : 0;
    $children = $guest['children'] !== '' ? $guest['children'] : 0;




    // check facility_list 


    $facility_list = json_decode($_GET['facility_list'],true);

print_r($facility_list);

    $output = "";
    $count = 0;
    // Fetch rooms that are active and not removed
    $res = select("SELECT * FROM `rooms` WHERE `audlt` >= ? AND `children` >= ? AND `status`= ? AND `remove`= ?", [$audalt, $children, 1, 0], 'iiii');

    $rooms_path = ROOM_IMG_PATH;
    while ($row = mysqli_fetch_assoc($res)) {
        // Fetch the room ID from the current room row
        $room_id = $row['id']; // Assuming there's an 'id' column in your `rooms` table

        // check the availabe date on room page 
        if ($check_aval['checkout_date'] !== '' && $check_aval['checkin_date'] !== '') {
            // Define the query to check for overlapping bookings
            $total_booking_query = "SELECT COUNT(*) AS total_bookings
                FROM book_now
                WHERE booking_status = ?
                AND room_id = ?
                AND (
                    (check_in >= ? AND check_in < ?)  -- Check-in between May 24th and 26th (excluding 26th)
                    OR (check_out > ? AND check_out <= ?) -- OR Check-out within May 24th to 26th (including 24th and 26th)
                );";

            // Bind the values in the correct order
            $total_booking_val = [
                'booked',              // booking_status
                // Room ID from session
                $room_id,              // room_id
                $check_aval['checkin_date'],   // The requested checkin_date date (for the condition check_out > ?)
                $check_aval['checkout_date'],   // The requested checkout_date date (for the condition check_in < ?)
                $check_aval['checkin_date'],   // The requested checkin date (for the condition check_out > ?)
                $check_aval['checkout_date'],   // The requested checkout date (for the condition check_in < ?)
            ];

            // Fetch the result using the select function
            $tootal_book_count = mysqli_fetch_assoc(select($total_booking_query, $total_booking_val, 'sissss'));

            $room_quentity = "SELECT  `quentity` FROM `rooms` WHERE id =?";
            $room_quentity_val = [$room_id];
            $room_quentity_count = mysqli_fetch_assoc(select($room_quentity, $room_quentity_val, 'i'));


            if ($tootal_book_count['total_bookings'] >= $room_quentity_count['quentity']) {
                continue;
            }
        }


        // Fetch facilities for the current room

        // count the total facility 
        $facility_count = 0;

        $rooms_facilities = mysqli_query($conn, "SELECT f.name, f.id FROM `facilities` f INNER JOIN `room_facility` rfec ON f.id = rfec.facility_id WHERE rfec.rooms_id = $room_id");

        // Loop through the facilities and collect them
        $facilities = "";
        while ($room_f = mysqli_fetch_assoc($rooms_facilities)) {
            if(in_array($room_f['id'],$facility_list['facilites_list'])){
                $facility_count++;
            }
            $facilities .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$room_f['name']}</span> ";
        }
        print_r(count($facility_list['facilites_list'])!=$facility_count);

        if(count($facility_list['facilites_list'])!=$facility_count){
            continue;
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

        $output .= "<div class='card mb-3 border-0 shadow'>
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
        $count++;

    }

    if ($count > 0) {

        echo $output;
    } else {
        echo '<h3 class="text-center text-danger "> No Rooms  to Show  </h3>';
    }

}
?>