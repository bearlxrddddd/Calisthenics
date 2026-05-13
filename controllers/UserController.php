<?php
require './models/UserModel.php';
$action = $_GET['action'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'create') {
    createUser($pdo, $_POST['username'], $_POST['email'], $_POST['weight'], $_POST['height']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'create') {
    require './views/users/create.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'update') {
    updateUser($pdo, $_GET['id'], $_POST['username'], $_POST['email'], $_POST['weight'], $_POST['height']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'edit') {
    $user = getUserById($pdo, $_GET['id']);
    require './views/users/edit.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'destroy') {
    deleteUser($pdo, $_GET['id']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'delete') {
    $user = getUserById($pdo, $_GET['id']);
    require './views/users/delete.php';
    exit;
}
?>