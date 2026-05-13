<?php
require './models/SetModel.php';
require './models/ExerciseModel.php';
$action = $_GET['action'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'store') {
    addSet($pdo, $_POST['workout_id'], $_POST['exercise_id'], $_POST['set_order'], $_POST['repetitions'], $_POST['weight']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'add') {
    $exercises = getAllExercises($pdo);
    require './views/sets/add.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'update') {
    updateSet($pdo, $_GET['id'], $_POST['exercise_id'], $_POST['set_order'], $_POST['repetitions'], $_POST['weight']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'edit') {
    $set = getSetById($pdo, $_GET['id']);
    $exercises = getAllExercises($pdo);
    require './views/sets/edit.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'destroy') {
    deleteSet($pdo, $_GET['id']);
    header("Location: /index.php?page=workouts&action=list");
    exit;
}

if ($_GET['action'] === 'delete') {
    $set = getSetById($pdo, $_GET['id']);
    require './views/sets/delete.php';
    exit;
}
?>