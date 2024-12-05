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

// Fetch student data for update
$student = null;
$error_message = "";

if(isset($_GET['nic'])) {
    $nic = $conn->real_escape_string($_GET['nic']);
    $sql = "SELECT * FROM students WHERE nic='$nic'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        $error_message = "Student not found";
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $nic = $conn->real_escape_string($_POST['nic']);
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $telephone = $conn->real_escape_string($_POST['telephone']);
    $course = $conn->real_escape_string($_POST['course']);

    // Update SQL
    $update_sql = "UPDATE students SET 
                    name='$name', 
                    address='$address', 
                    telephone='$telephone', 
                    course='$course' 
                   WHERE nic='$nic'";

    if ($conn->query($update_sql) === TRUE) {
        // Redirect to list page with success message
        header("Location: index.php?update=success");
        exit();
    } else {
        $error_message = "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Update Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Student Information</h1>
        
        <?php if($error_message): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <?php if($student): ?>
        <form method="POST" class="update-form">
            <div class="form-group">
                <label>NIC Number</label>
                <input type="text" name="nic" value="<?php echo htmlspecialchars($student['nic']); ?>" readonly>
            </div>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" required><?php echo htmlspecialchars($student['address']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Telephone</label>
                <input type="tel" name="telephone" value="<?php echo htmlspecialchars($student['telephone']); ?>" required>
            </div>

            <div class="form-group">
                <label>Course</label>
                <select name="course" required>
                    <option value="Computer Science" <?php echo ($student['course'] == 'Computer Science') ? 'selected' : ''; ?>>Computer Science</option>
                    <option value="Engineering" <?php echo ($student['course'] == 'Engineering') ? 'selected' : ''; ?>>Engineering</option>
                    <option value="Business Administration" <?php echo ($student['course'] == 'Business Administration') ? 'selected' : ''; ?>>Business Administration</option>
                    <option value="Data Science" <?php echo ($student['course'] == 'Data Science') ? 'selected' : ''; ?>>Data Science</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-update">Update Student</button>
                <a href="index.php" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
