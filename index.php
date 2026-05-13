<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './config/config.php';
session_start();

$page = $_GET['page'] ?? 'login';
$action = $_GET['action'] ?? 'login';

if ($page === 'login') {
    require './controllers/LoginController.php';
    exit;
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /index.php?page=login&action=login");
    exit;
}

if ($page === 'workouts') {
    if ($action === 'list') {
        require './models/WorkoutModel.php';
        $workouts = getAllWorkouts($pdo);
        $users = getAllUsers($pdo);
        require './views/workouts/index.php';
    } else {
        require './controllers/WorkoutController.php';
    }
}
elseif ($page === 'users') {
    require './controllers/UserController.php';
}
elseif ($page === 'sets') {
    require './controllers/SetController.php';
}
else {
    http_response_code(404);
    echo "Страница не найдена";
}
?>