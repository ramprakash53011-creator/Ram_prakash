<?php 
include 'check_auth.php'; 
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id        = $_POST['user_id'];
    $full_name = $_POST['full_name'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $address   = $_POST['address'];

    $stmt = $conn->prepare("UPDATE userinfo SET full_name=?, email=?, phone=?, address=? WHERE user_id=?");
    $stmt->bind_param("ssssi", $full_name, $email, $phone, $address, $id);
    $stmt->execute();
    header("Location: view_users.php");
}

$id = intval($_GET['id']); // Security: prevent SQL injection
$result = $conn->query("SELECT * FROM userinfo WHERE user_id = $id");
$row = $result->fetch_assoc();

if (!$row) {
    echo "<h2>User not found!</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="assets/edit_user_style.css">
</head>
<body>

    <div class="container">
        
        <!-- Header -->
        <div class="header">
            <h2>Edit User</h2>
        </div>

        <!-- Form -->
        <div class="form-container">
            
            <form action="" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">

                <div class="form-group">
                    <label>Full Name <span style="color:red;">*</span></label>
                    <input type="text" name="full_name" value="<?php echo htmlspecialchars($row['full_name']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Email <span style="color:red;">*</span></label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" rows="4"><?php echo htmlspecialchars($row['address']); ?></textarea>
                </div>

                <button type="submit">Update User</button>
            </form>

            <a href="view_users.php" class="back-link">← Back to All Users</a>
        </div>
    </div>

</body>
</html>