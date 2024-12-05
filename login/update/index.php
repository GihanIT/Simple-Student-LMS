<?php
// Database connection
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

// Handle search functionality
$search_query = "";
$sql = "SELECT * FROM students";

if(isset($_GET['search'])) {
    $search_query = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM students WHERE 
            nic LIKE '%$search_query%' OR 
            name LIKE '%$search_query%' OR 
            course LIKE '%$search_query%'";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Management System</h1>
        
        <!-- Search Form -->
        <div class="search-section">
            <form method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search by NIC, Name, or Course" 
                       value="<?php echo htmlspecialchars($search_query); ?>">
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>

        <!-- Student List -->
        <div class="student-list">
            <table>
                <thead>
                    <tr>
                        <th>NIC</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nic']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['course']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['telephone']) . "</td>";
                            echo "<td class='action-buttons'>";
                            echo "<a href='update.php?nic=" . urlencode($row['nic']) . "' class='btn btn-update'>Update</a>";
                            echo "<a href='delete.php?nic=" . urlencode($row['nic']) . "' class='btn btn-delete' onclick='return confirmDelete()'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No students found</td></tr>";
                    }
                    
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this student record?");
    }
    </script>
</body>
</html>
