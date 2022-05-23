<?php 

if(isset($_SESSION['ALERT'])) {
    $alert = json_decode($_SESSION['ALERT'], true);
    $message = $alert['message'];
    $type = $alert['status'];

    echo "<script> 
            swal('$message', '', '$type') 
        </script>";
}

unset($_SESSION['ALERT']);

?>