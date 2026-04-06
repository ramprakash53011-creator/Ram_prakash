<?php include 'check_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="assets/view_style.css">
</head>
<body>

    <div class="container">
        
        <!-- Header -->
        <div class="header">
            <h2>All Users</h2>
            <a href="dashboard.php" class="dashboard-btn"> Back to Dashboard</a>
            <a href="add_user.php" class="add-btn">+ Add New User</a>
        </div>

        <!-- Table -->
        <div class="table-container">
            <?php
            include 'config.php';
            $result = $conn->query("SELECT * FROM userinfo ORDER BY user_id DESC");

            if ($result->num_rows > 0) {
            ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['user_id']}</td>
                                <td>" . htmlspecialchars($row['full_name']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['phone']) . "</td>
                                <td>" . htmlspecialchars($row['address'] ?? '—') . "</td>
                                <td>" . htmlspecialchars($row['created_at'] ?? '—') . "</td>
                                <td class='actions'>
                                    <a href='edit_user.php?id={$row['user_id']}'>Edit</a> |
                                    <a href='delete_user.php?id={$row['user_id']}' 
                                       onclick=\"return confirm('Are you sure you want to delete this user?')\">Delete</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </table>
            <?php
            } else {
                echo "<div class='no-data'>No users found.</div>";
            }
            ?>
        </div>

        <div class="footer">
            © <?php echo date("Y"); ?> Your Application • All Rights Reserved
        </div>
    </div>

</body>
</html>