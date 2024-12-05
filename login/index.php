<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <img src="img/logologin.jpg" alt="Logo" class="logo">
        <form action="process.php" method="post" class="login-form">
            <h2>Login</h2>
            <?php
            // Check for error messages
            if(isset($_GET['error'])) {
                echo "<p class='error-message'>Invalid username or password!</p>";
            }
            ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
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
