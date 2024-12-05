<?php
session_start();

// Predefined credentials (in a real application, use a database)
$valid_username = "admin";
$valid_password = "password123";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple authentication (replace with more secure methods in production)
    if ($username === $valid_username && $password === $valid_password) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to dashboard or home page
        header("Location: dashboard.php");
        exit();
    } else {
        // Redirect back to login with error
        header("Location: index.php?error=1");
        exit();
    }
}
?>
