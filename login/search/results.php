<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="search-container">
        <h2>Search Results</h2>
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

        // Check if search parameters are set
        if (isset($_GET['search_by']) && isset($_GET['search_term'])) {
            $search_by = $conn->real_escape_string($_GET['search_by']);
            $search_term = $conn->real_escape_string($_GET['search_term']);

            // Prepare SQL query based on search type
            switch ($search_by) {
                case 'nic':
                    $sql = "SELECT * FROM students WHERE nic LIKE '%$search_term%'";
                    break;
                case 'name':
                    $sql = "SELECT * FROM students WHERE name LIKE '%$search_term%'";
                    break;
                case 'course':
                    $sql = "SELECT * FROM students WHERE course LIKE '%$search_term%'";
                    break;
                default:
                    $sql = "SELECT * FROM students";
            }

            // Execute query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='results-table'>";
                echo "<tr>
                        <th>NIC</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Course</th>
                        <th>Registration Date</th>
                      </tr>";

                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["nic"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["telephone"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["course"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["registration_date"]) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-results'>No results found.</p>";
            }
        } else {
            echo "<p class='no-results'>Please provide search criteria.</p>";
        }

        // Close connection
        $conn->close();
        ?>
        <div class="search-again">
            <a href="index.php" class="back-button">Search Again</a>
        </div>
    </div>
</body>
</html>
