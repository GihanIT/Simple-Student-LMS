<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Search</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="search-container">
        <h1>Search Student Details</h1>
        <form action="results.php" method="GET" class="search-form">
            <div class="search-options">
                <select name="search_by" required>
                    <option value="">Search By</option>
                    <option value="nic">NIC Number</option>
                    <option value="name">Name</option>
                    <option value="course">Course</option>
                </select>
                
                <input type="text" name="search_term" placeholder="Enter search term" required>
                
                <button type="submit" class="search-button">Search</button>
            </div>
        </form>
    </div>
</body>
</html>
