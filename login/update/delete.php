<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lmsdb"; // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if NIC is provided
if(isset($_GET['nic'])) {
    $nic = $conn->real_escape_string($_GET['nic']);
    
    // Delete SQL
    $delete_sql = "DELETE FROM students WHERE nic='$nic'";
    
    if ($conn->query($delete_sql) === TRUE) {
        // Redirect to list page with success message
        header("Location: index.php?delete=success");
    } else {
        // Redirect to list page with error message
        header("Location: index.php?delete=error");
    }
} else {
    // Redirect if no NIC provided
    header("Location: index.php");
}

$conn->close();
exit();
?>
