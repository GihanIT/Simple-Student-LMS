<?php
// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nova_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // Start the session at the beginning

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nic = $conn->real_escape_string($_POST['nic']);
    $course = $conn->real_escape_string($_POST['course']);

    // Prepare and execute SQL statement
    $sql = "SELECT * FROM students WHERE nic = ? AND course = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nic, $course);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $student = $result->fetch_assoc();
        $_SESSION['student_nic'] = $nic;
        $_SESSION['student_name'] = $student['name'];
        $_SESSION['loggedin'] = true; // Set logged-in status
        
        header("Location: student_dashboard.php");
        exit();
    } else {
        $error = "Invalid NIC or Course";
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php if(isset($error)): ?>
        <div class="error">
            <p><?php echo $error; ?></p>
            <a href="index.php">Try Again</a>
        </div>
    <?php endif; ?>
</body>
</html>
