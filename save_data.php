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
    // Check if it's a signup or login request based on form fields
    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        // It's a signup request

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];

        // Ensure none of the fields are empty
        if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($birthdate) || empty($gender) || empty($phone)) {
            die('Please fill in all the fields.');
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO `siginup` (`firstname`, `lastname`, `email`, `password`, `birthdate`, `gender`, `phone`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("sssssss", $firstname, $lastname, $email, $hashed_password, $birthdate, $gender, $phone);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to success page or handle success message
            header("Location: success.php");
            exit();
        } else {
            // Redirect to error page with the MySQL error message
            header("Location: error.php?message=" . urlencode("Error occurred: " . $stmt->error));
            exit();
        }

        // Close statement
        $stmt->close();
    } elseif (isset($_POST['email']) && isset($_POST['password'])) {
        // It's a login request
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Ensure email and password are provided
        if (empty($email) || empty($password)) {
            die('Please provide both email and password.');
        }

        // Validate user credentials
        $stmt = $conn->prepare("SELECT * FROM siginup WHERE email = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start session and redirect
                $_SESSION['user_detail'] = $user; // Example: store user session
                header("Location: Dashboard.html"); // Redirect to success page
                exit();
            } else {
                // Password is incorrect
                header("Location: error.php?message=" . urlencode("Incorrect password."));
                exit();
            }
        } else {
            // User not found
            header("Location: error.php?message=" . urlencode("User with that email does not exist."));
            exit();
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
