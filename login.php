<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/style1.css">
</head>
<body>

    <div class="login-container">
        <?php
        // Show error message if login failed
        if (isset($_SESSION['login_error'])) {
            echo '<div class="error">' . $_SESSION['login_error'] . '</div>';
            unset($_SESSION['login_error']);   // clear message after showing
        }
        ?>
        <div class="login-header">
            <h1>Admin Panel</h1>
            <p>Sign in to access the dashboard</p>
        </div>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="setup-link">
            First time? 
            <a href="setup.php">→ Click here to Setup Database</a>
        </div>

        <div class="footer">
            &copy; <?php echo date("Y"); ?> Admin System
        </div>
    </div>
</body>
</html>