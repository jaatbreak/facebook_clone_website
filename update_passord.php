<?php
session_start();
include './save_data.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE signupform SET password = ? WHERE phone = ?");
    $stmt->bind_param("ss", $hashed_password, $_SESSION['phone']); // Assuming phone is stored in session
    if ($stmt->execute()) {
        echo 'Password Updated';
    } else {
        echo 'Failed to update password. Please try again.';
    }

    $stmt->close();
    $conn->close();
}
?>