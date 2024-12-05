# Simple-Student-LMS  
A simple Student Learning Management System (LMS) with separate user and admin logins.  

## Features  
- **Admin Functionality**:  
  - Add, update, and delete student records in the database.  
- **Student Functionality**:  
  - Students can log in using their NIC and view their dashboard, including course information.  

---

## How to Set Up and Use  

### **Step 1: Download the Project Files**  
Download the entire project folder from this repository.  

### **Step 2: Set Up the Project on Your Localhost**  
1. Copy the project folder into your web server's root directory:  
   - For XAMPP: Paste it in the `htdocs` folder.  
   - For WAMP: Paste it in the `www` folder.  

### **Step 3: Create the Database**  
1. Open **PhpMyAdmin** from your localhost (e.g., `http://localhost/phpmyadmin`).  
2. Create a new database named `lmsdb`.  

### **Step 4: Import the Sample Database**  
1. Navigate to the `database` folder in the project directory.  
2. Locate the file `lmsdb.sql`.  
3. Import the database file:  
   - Open the `lmsdb` database in PhpMyAdmin.  
   - Click on the **Import** tab.  
   - Select `Choose File` and upload the `lmsdb.sql` file.  
   - Click **Go** to complete the import.  

---

## How to Access the System  

### **Admin Login**  
1. Open the project in your browser (e.g., `http://localhost/project-folder-name`).  
2. Use the admin credentials to log in:  
   - **Username**: `admin`  
   - **Password**: `password123`  
   - *(You can change the admin username and password in the `login/process.php` file.)*  
3. Navigate to the admin dashboard to manage student records.  

### **Student Login**  
1. Students can log in using their National Identity Card (NIC) and course information as credentials.  
2. Upon login, students will be redirected to their dashboard.  

---

## Requirements  
- Web Server: XAMPP, WAMP, or any server with PHP and MySQL support.  
- Browser: Google Chrome, Mozilla Firefox, or any modern browser.  

---
### Contacts
**Email** : gihanhareendra@gmail.com

## Folder Structure  
```plaintext
/project-folder
├── /database
│   └── lmsdb.sql        # Sample database file
├── /admin
│   └── ...              # Admin functionality scripts
├── /student
│   └── ...              # Student functionality scripts
├── index.php            # Main landing page
├── README.md            # Project documentation
