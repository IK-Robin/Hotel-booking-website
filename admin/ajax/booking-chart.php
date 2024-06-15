<?php


require('../db/phplinks.php');



adminLogin();

// featch data form db booking status 

// select all form booking data 


if (isset($_POST['get_chart_data'])) {
    // Include the necessary file for database connection
    
    
    // SQL query to fetch data from both tables
    $query = "
        SELECT 
            bn.booking_id, 
            bn.room_id, 
            bn.check_in, 
            bn.check_out, 
            bd.room_name, 
            bd.user_name
        FROM 
            book_now bn
        INNER JOIN 
            book_discription bd ON bn.booking_id = bd.booking_id
        WHERE 
            1
    ";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if ($result) {
        $data = [];
        
        // Loop through the fetched data and format it
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                'booking_id' => $row['booking_id'],
                'room_id' => $row['room_id'],
                'check_in' => $row['check_in'],
                'check_out' => $row['check_out'],
                'room_name' => $row['room_name'],
                'user_name' => $row['user_name']
            ];
        }
        
        // Encode the data into JSON format
        echo json_encode($data);
    } else {
        // Handle query error
        echo json_encode(['error' => 'Failed to fetch data from database']);
    }
    
    // Close the database connection
    mysqli_close($conn);
}

