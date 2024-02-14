<?php 
    ob_start();
    session_start();
    session_unset();
    session_destroy();
    header("location: /hotel/adminpanle/pages-login.php");
    
    exit();
