<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $new_password = $_POST['new_password'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
   
    
    $result = mysqli_query($conn,"UPDATE `siginup` SET `password` = '$hashed_password'  WHERE `phone` = '$phone' ");

    if ($result == true) {
        echo 'Password Updated';
    } else {
        echo 'Failed to update password. Please try again.';
    }
}
?>