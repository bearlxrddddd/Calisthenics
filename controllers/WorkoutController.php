<?php
require './models/WorkoutModel.php';
$action = $_GET['action'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'create') {
    createWorkout($pdo, $_POST['user_id'], $_POST['workout_date'], $_POST['duration'], $_POST['notes']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'create') {
    require './views/workouts/create.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'update') {
    updateWorkout($pdo, $_GET['id'], $_POST['workout_date'], $_POST['duration'], $_POST['notes']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'edit') {
    $workout = getWorkoutById($pdo, $_GET['id']);
    require './views/workouts/edit.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'destroy') {
    deleteWorkoutSets($pdo, $_GET['id']);
    deleteWorkout($pdo, $_GET['id']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'delete') {
    $workout = getWorkoutById($pdo, $_GET['id']);
    require './views/workouts/delete.php';
    exit;
}
?>