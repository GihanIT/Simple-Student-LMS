<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['student_nic']) || !isset($_SESSION['student_name'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Dashboard</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --bg-light: #f4f7f6;
            --text-dark: #333;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }
        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .sidebar {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
        }
        .sidebar-nav {
            list-style: none;
        }
        .sidebar-nav li {
            margin-bottom: 15px;
        }
        .sidebar-nav a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar-nav a:hover {
            background-color: rgba(255,255,255,0.2);
        }
        .main-content {
            padding: 30px;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        .course-card {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .progress-bar {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }
        .progress {
            height: 10px;
            background-color: var(--secondary-color);
        }
        .grades-summary {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
        }
        .grade-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 10px;
            background-color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Student Portal</h2>
            <ul class="sidebar-nav">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Assignments</a></li>
                <li><a href="#">Grades</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Welcome, <?php echo $_SESSION['student_name']; ?>!</h1>
            <div class="dashboard-grid">
                <div>
                    <h2>Current Courses</h2>
                    <div class="course-card">
                        <h3>Web Development 101</h3>
                        <div class="progress-bar">
                            <div class="progress" style="width: 65%"></div>
                        </div>
                        <p>Progress: 65% Complete</p>
                        <p>Next Assignment: Responsive Design Project</p>
                    </div>
                    <div class="course-card">
                        <h3>Python Programming</h3>
                        <div class="progress-bar">
                            <div class="progress" style="width: 45%"></div>
                        </div>
                        <p>Progress: 45% Complete</p>
                        <p>Next Assignment: Data Analysis Homework</p>
                    </div>
                </div>
                <div class="grades-summary">
                    <h2>Grade Summary</h2>
                    <div class="grade-item">
                        <span>Web Development</span>
                        <span>A- (88%)</span>
                    </div>
                    <div class="grade-item">
                        <span>Python Programming</span>
                        <span>B+ (82%)</span>
                    </div>
                    <div class="grade-item">
                        <span>Database Management</span>
                        <span>A (93%)</span>
                    </div>
                    <div class="grade-item">
                        <strong>Semester GPA</strong>
                        <strong>3.7</strong>
                    </div>
                </div>
            </div>
        </div>
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
</body>
</html>