<?php include 'check_auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/dashboard_style.css">
</head>
<body>

    <div class="dashboard">
        
        <!-- Header -->
        <div class="header">
            <div class="welcome-text">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
                <p>Manage your users and account settings</p>
            </div>
            <div class="user-avatar">
                <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
            </div>
        </div>

        <!-- Navigation Cards -->
        <div class="nav">
            
            <!-- Add New User -->
            <a href="add_user.php" class="card">
                <div class="icon">👤</div>
                <h3>Add New User</h3>
                <p>Create a new user account with proper permissions and access.</p>
                <div class="btn">Add User →</div>
            </a>

            <!-- View All Users -->
            <a href="view_users.php" class="card">
                <div class="icon">👥</div>
                <h3>View All Users</h3>
                <p>Browse, search and manage all registered users in the system.</p>
                <div class="btn">View Users →</div>
            </a>

            <!-- Logout -->
            <a href="logout.php" class="card logout-card" 
               onclick="return confirm('Are you sure you want to logout?')">
                <div class="icon">🚪</div>
                <h3>Logout</h3>
                <p>Securely end your current session and return to login.</p>
                <div class="btn">Logout Now →</div>
            </a>

        </div>

        <div class="footer">
            © <?php echo date("Y"); ?> Your Application • All Rights Reserved
        </div>
    </div>

</body>
</html>