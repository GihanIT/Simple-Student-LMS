<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $nic = sanitize_input($_POST['nic']);
    $name = sanitize_input($_POST['name']);
    $address = sanitize_input($_POST['address']);
    $telephone = sanitize_input($_POST['telephone']);
    $course = sanitize_input($_POST['course']);

    // Basic validation
    $errors = [];

    if (!preg_match("/^\d{12}$/", $nic)) {
        $errors[] = "Invalid NIC number";
    }

    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($address)) {
        $errors[] = "Address is required";
    }

    if (!preg_match("/^\d{10}$/", $telephone)) {
        $errors[] = "Invalid telephone number";
    }

    if (empty($course)) {
        $errors[] = "Course selection is required";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Database connection parameters (replace with your actual database credentials)
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

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO students (nic, name, address, telephone, course) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nic, $name, $address, $telephone, $course);

        // Execute statement
        if ($stmt->execute()) {
            // Redirect to index with success message
            header("Location: index.php?status=success");
            exit();
        } else {
            // Redirect to index with error message
            header("Location: index.php?status=error");
            exit();
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // If there are errors, redirect back with error status
        header("Location: index.php?status=error");
        exit();
    }
}
?>
