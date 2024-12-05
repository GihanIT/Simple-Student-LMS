<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="registration-container">
        <form action="process.php" method="post" class="registration-form">
            <h2>Student Registration</h2>
            
            <?php
            // Display success or error messages
            if(isset($_GET['status'])) {
                $status = $_GET['status'];
                if($status == 'success') {
                    echo "<p class='success-message'>Registration Successful!</p>";
                } elseif($status == 'error') {
                    echo "<p class='error-message'>Registration Failed. Please check your inputs.</p>";
                }
            }
            ?>

            <div class="form-group">
                <label for="nic">NIC Number</label>
                <input type="text" id="nic" name="nic" pattern="\d{12}" title="12 digit NIC number" required>
            </div>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <div class="form-group">
                <label for="telephone">Telephone Number</label>
                <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" title="10 digit telephone number" required>
            </div>

            <div class="form-group">
                <label for="course">Select Course</label>
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
            </div>

            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
</body>
</html>
