<?php
session_start();
require './models/UserModel.php';

$action = $_GET['action'] ?? 'login';

// === РЕГИСТРАЦИЯ ===
if ($action === 'register') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['password'] !== $_POST['confirm_password']) {
            $error = "Пароли не совпадают";
        } else {
            registerUser($pdo, $_POST['username'], $_POST['email'], $_POST['password'], $_POST['weight'], $_POST['height']);
            header("Location: /index.php?page=login&action=login");
            exit;
        }
    }
    require './views/login/register.php';
    exit;
}

// === ВХОД ===
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

// === ВЫХОД ===
if ($action === 'logout') {
    session_destroy();
    header("Location: /index.php?page=login&action=login");
    exit;
}

// Если action не распознан — перенаправляем на логин
header("Location: /index.php?page=login&action=login");
exit;
?>