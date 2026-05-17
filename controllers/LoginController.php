<?php
require './models/UserModel.php';

$action = $_GET['action'] ?? 'login';

if ($action === 'logout') {
    session_start();
    session_destroy();
    header("Location: /index.php?page=login&action=login");
    exit;
}

if ($action === 'register') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        registerUser($pdo, $_POST['username'], $_POST['email'], $_POST['password'], $_POST['weight'], $_POST['height'], $_POST['experience_level']);
        header("Location: /index.php?page=login&action=login");
        exit;
    }
    require './views/login/register.php';
    exit;
}

if ($action === 'login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (loginUser($pdo, $_POST['email'], $_POST['password'])) {
            header("Location: /index.php?page=workouts&action=list");
            exit;
        } else {
            $error = "Неверный email или пароль";
        }
    }
    require './views/login/login.php';
    exit;
}

header("Location: /index.php?page=login&action=login");
exit;
?>