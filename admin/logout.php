<?php


require('db/eshential.php');

session_start();
session_destroy();

redirect('index.php');
exit; // Stop script execution
?>