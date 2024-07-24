<?php
// Enable error reporting
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // It's a signup request

        $phone = $_POST['phone'];

    $result = mysqli_query($conn,"SELECT * FROM `siginup` WHERE `email`=$phone OR `phone` = $phone ");


    // Mysql_num_row is counting table row
    $count = mysqli_num_rows($result);

    if($count == 1){
        echo "1";die;
    }    
    elseif($count == 0){
        echo "0";die;
    }
}

// Close connection
$conn->close();
?>
