<?php 

function seletQuery($form)
{   
    global $conn;
    $select = "SELECT * from $form";
    $sh = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($sh);

    return $row;
}
function logout($out){
if (isset($_GET[$out])) {
    session_unset();
    session_destroy();
    header('location: /hotel/userpanel/registration/login.php');
    exit();
   }
} 
function auth(){
    if(!isset($_SESSION['CustomerID'])){
        header("location: /hotel/userpanel/registration/login.php");
        exit();
      }
}