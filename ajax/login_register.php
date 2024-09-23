<?php

require('../admin/db/phplinks.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST['register'])) {
    $data = filtaration($_POST);

    // Check for existing user by email or phone number
    $check_prev_user = select("SELECT * FROM `user_register` WHERE `email`=? OR `phone_num` = ? LIMIT 1", [$data['email'], $data['phone']], 'ss');

    if (mysqli_num_rows($check_prev_user) != 0) {
        $check_prev_user_email = mysqli_fetch_assoc($check_prev_user);

        echo ($check_prev_user_email['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    // Upload user image to the server
    $profile_img = optimize_user_Image($_FILES['formFile'], USER_PROFILE);
    echo $profile_img;
    if ($profile_img == 'inv_img') {
        exit('Invalid image format');
    } else if ($profile_img == 'inv_size') {
        exit('Image size exceeds the limit');
    } else if ($profile_img == 'upd_failed') {
        echo 'Upload failed';
        exit;
    }

    // Use PHPMailer to send an email
    $mail = new PHPMailer(true);

    try {
        // Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'jerbrihsin@gmail.com';                     // SMTP username
        $mail->Password   = 'focc umei nmou qeci
 ';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //previous ENCRYPTION_SMTPS Enable implicit TLS encryption
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($data['email'], 'Mailer');
        $mail->addAddress($data['email'], $data['name']);           // Add a recipient
       

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Try to send a new email';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
