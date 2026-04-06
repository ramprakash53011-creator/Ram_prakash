<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM userinfo WHERE user_id = $id");
header("Location: view_users.php");
?>