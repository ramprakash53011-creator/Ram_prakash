<?php

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Setup - PHP CRUD</title>
    <link rel="stylesheet" href="assets/style2.css">
</head>
<body>
    <div class="container">';

echo "<h2> PHP CRUD Project Setup</h2>";

$conn = new mysqli('localhost', 'root', '');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Database
if ($conn->query("CREATE DATABASE IF NOT EXISTS Assignment") === TRUE) {
    echo "<p class='success'>Database <strong>Assignment</strong> created successfully.</p>";
} else {
    echo "Error: " . $conn->error;
}

$conn->select_db('Assignment');

// Create admin table
$conn->query("CREATE TABLE IF NOT EXISTS admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
)");

// Create userinfo table
$conn->query("CREATE TABLE IF NOT EXISTS userinfo (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Insert default admin
$default_username = 'admin';
$default_password = password_hash('admin123', PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT IGNORE INTO admin (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $default_username, $default_password);
$stmt->execute();

echo '
    <h3 class="success"> Setup Completed Successfully!</h3>
    <ul>
        <li> Database created</li>
        <li> Tables created</li>
        <li> Default admin account ready</li>
    </ul>
    <p><strong>Username:</strong> admin<br>
       <strong>Password:</strong> admin123</p>
    <a href="login.php">Go to Login Page →</a>
    <p style="margin-top:30px; font-size:0.9em; color:#666;">
        You only need to run this page once.<br>
        Refreshing it again is safe (it won’t create duplicates).
    </p>
</div>
</body>
</html>';

$conn->close();
?>