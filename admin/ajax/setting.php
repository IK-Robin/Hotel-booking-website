<?php
require('db/phplinks');
adminLogin();

if (isset($_POST['generel_submit'])){
    print_r($_POST);
}

?>