<?php
ob_start();
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


if (!isset($_SESSION['id'])) {
    header("location: /hotel/adminpanle/pages-login.php");
    exit();
}


// include path css
$include_header_css = __DIR__ . '/assets/';
$include_footer_js = __DIR__ .  '/assets/';
require __DIR__ . '/includes/functions/functions.php';
require __DIR__ . '/env.php';


// include file 
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/headers.php';
require __DIR__ . '/includes/aside.php';

// require __DIR__ . '../init.php';

// $host = "localhost";
// $user = "root";
// $password = '';
// $name = "hotel";
// $conn = mysqli_connect($host, $user, $password, $name);
