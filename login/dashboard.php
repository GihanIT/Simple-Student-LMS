<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dstyles.css">
</head>
<body>
    <div class="dashboard-container">
        <h4>Welcome, <?php echo $_SESSION['username']; ?>!</h4>
        <span class="dashboard-text">Admin Dashboard</span>
        <div class="logout-container">
       <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>
    <p> You have successfully logged in!</p>
    <div class="tab-container">
        <button class="tab active" onclick="showTab('add')">Register Student</button>
        <button class="tab" onclick="showTab('update')">Student Information</button>
        <button class="tab" onclick="showTab('search')">Search Student</button>

    </div>
    <div id="search" class="content">
        <iframe src="search/index.php" title="Search Student Information"></iframe>
    </div>
    <div id="update" class="content">
        <iframe src="update/index.php" title="Update Student Information"></iframe>
    </div>
    <div id="add" class="content active">
        <iframe src="register/index.php" title="Register Student"></iframe>
    </div>
    <footer style="
        background-color: #333; 
        color: white; 
        text-align: center; 
        padding: 20px; 
        position: fixed; 
        bottom: 0; 
        width: 100%; 
        font-family: Arial, sans-serif;
    ">
        <div style="margin-bottom: 10px;">
            © 2024 Your Company Name. All Rights Reserved.
        </div>
        <div>
            <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">Privacy Policy</a>
            <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">Terms of Service</a>
            <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">Contact</a>
        </div>
    </footer>

    <script>
        function showTab(tabId) {
            // Hide all content
            document.querySelectorAll('.content').forEach(content => content.classList.remove('active'));
            // Deactivate all tabs
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            // Show selected content
            document.getElementById(tabId).classList.add('active');
            // Activate selected tab
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
