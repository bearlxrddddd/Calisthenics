<?php
require_once './config/config.php';
session_start();

$page = $_GET['page'] ?? 'login';
$action = $_GET['action'] ?? 'login';

if ($page === 'login') {
    require_once './controllers/LoginController.php';
    exit;
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /index.php?page=login&action=login");
    exit;
}

if ($page === 'workouts') {
    if ($action === 'list') {
        require_once './models/WorkoutModel.php';
        $workouts = getAllWorkouts($pdo);
        
        if ($_SESSION['role'] === 'admin') {
            require_once './models/UserModel.php';
            $users = getAllUsers($pdo);
        } else {
            $users = [];
        }
        
        require './views/workouts/index.php';
    } else {
        require_once './controllers/WorkoutController.php';
    }
}
elseif ($page === 'users') {
    if ($action === 'profile') {
        require_once './models/UserModel.php';
        $user = getUserById($pdo, $_SESSION['user_id']);
        require './views/users/profile.php';
        exit;
    }
    
    if ($_SESSION['role'] !== 'admin') {
        header("Location: /index.php?page=workouts&action=list");
        exit;
    }
    require_once './controllers/UserController.php';
}
elseif ($page === 'sets') {
    require_once './controllers/SetController.php';
}
else {
    http_response_code(404);
    echo "Страница не найдена";
}
?>