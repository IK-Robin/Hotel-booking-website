<?php

function alert($type,$message){

    $bs_class = ($type =='success')? 'alert-success':'alert-warning';

  
    echo <<<alert
    <div id="alert_close" class="alert custom_alert $bs_class   alert-dismissible fade show" role="alert">
            <strong class="me-3"> $message</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert shadow-none" aria-label="Close"></button>
    </div>
    <script>
    // hide the alerm after 3 sec 
    setTimeout(function(){
        document.getElementById('alert_close').style.display = 'none';
    },3000);
    </script>
    alert;
}


// make a redicrect function using js 
 function redirect ($link){
    echo <<<redirect
    <script>
    window.location.href = '$link';
    </script>
    redirect;
 }


?>