<?php
include('database.php');
session_start();

$msg = $_GET["msg"];
$phone = $_SESSION["phone"];
$date = date("Y-m-d H:i:s");

$q = "SELECT * FROM user WHERE unumber = '$phone'";
if ($rq = mysqli_query($conn, $q)) {
    if (mysqli_num_rows($rq) == 1) {
        $q = "INSERT INTO `msg`(`phone`, `msg`, `date`) VALUES ('$phone','$msg','$date')";
        $rq = mysqli_query($conn, $q);
    }
}
