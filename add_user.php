<?php include 'check_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="assets/add_user_style.css">
</head>
<body>

    <div class="container">
        
        <!-- Header -->
        <div class="header">
            <h2>Add New User</h2>
        </div>

        <!-- Form -->
        <div class="form-container">
            
            <?php
            include 'config.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $full_name = trim($_POST['full_name']);
                $email     = trim($_POST['email']);
                $phone     = trim($_POST['phone'] ?? '');
                $address   = trim($_POST['address'] ?? '');

                $stmt = $conn->prepare("INSERT INTO userinfo (full_name, email, phone, address) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $full_name, $email, $phone, $address);
                
                if ($stmt->execute()) {
                    echo '<div class="message success">✅ User added successfully!</div>';
                } else {
                    echo '<div class="message error">Error: ' . $conn->error . '</div>';
                }
            }
            ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label>Full Name <span style="color:red;">*</span></label>
                    <input type="text" name="full_name" required>
                </div>

                <div class="form-group">
                    <label>Email <span style="color:red;">*</span></label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" rows="3"></textarea>
                </div>

                <button type="submit">Add User</button>
            </form>

            <a href="view_users.php" class="back-link">← Back to All Users</a>
        </div>
    </div>

</body>
</html>