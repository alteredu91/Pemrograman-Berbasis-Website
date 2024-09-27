<?php
session_start();
require_once 'controllers/AdminController.php';

$adminController = new AdminController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($adminController->login($username, $password)) {
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
    } else {
        $error = "Username atau password salah!";
    }
}

include 'views/admin_login.php';

if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>