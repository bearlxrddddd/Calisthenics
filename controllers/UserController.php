<?php
require './models/UserModel.php';

$action = $_GET['action'] ?? '';

if ($action === 'profile') {
    $user = getUserById($pdo, $_SESSION['user_id']);
    require './views/users/profile.php';
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'create') {
    createUser($pdo, $_POST['username'], $_POST['email'], $_POST['weight'], $_POST['height']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($action === 'create') {
    require './views/users/create.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'update') {
    updateUser($pdo, $_GET['id'], $_POST['username'], $_POST['email'], $_POST['weight'], $_POST['height']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($action === 'edit') {
    $user = getUserById($pdo, $_GET['id']);
    require './views/users/edit.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'destroy') {
    deleteUser($pdo, $_GET['id']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($action === 'delete') {
    $user = getUserById($pdo, $_GET['id']);
    require './views/users/delete.php';
    exit;
}
?>