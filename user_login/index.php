<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="login-container">
        <h2>Student Login</h2>
        <form action="process.php" method="post" class="form-group">
            <input type="text" name="nic" placeholder="NIC Number" required>
            <select id="course" name="course" required>
                <option value="">Select a Course</option>
                <option value="ICT Basics">ICT Basics</option>
                <option value="Graphic Design">Graphic Design</option>
                <option value="Data Science">Data Science</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Programming">Programming</option>
                <option value="Networking">Networking</option>
                <option value="Web Development">Web Development</option>
                <option value="Cyber Security">Cyber Security</option>
            </select>
            <button type="submit">Login</button>
        </form>
    </div>
    <footer class="footer">
    <div style="margin-bottom: 10px;">
            © 2024 Nova Computer Academy. All Rights Reserved by GihanIT.
        </div>
        <div>
            <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">Privacy Policy</a>
            <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">Terms of Service</a>
            <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">Contact</a>
        </div>
    </footer>
</div>
</body>
</html>
