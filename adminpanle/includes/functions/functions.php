<?php

function seletQuery($form, $where = null)
{
    global $conn;
    $select = "SELECT * from $form $where";
    $sh = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($sh);
    return COUNT($row);
}
function SeleetQuery($form)
{
    global $conn;
    $select = "SELECT * from $form ";
    $sh = mysqli_query($conn, $select);
    $row = mysqli_fetch_all($sh);
    return($row);
}
