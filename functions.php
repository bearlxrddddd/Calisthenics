<?php
require 'config.php';

// ТРЕНИРОВКИ
function getAllWorkouts($pdo) {
    $stmt = $pdo->query("SELECT * FROM workouts ORDER BY workout_date DESC");
    return $stmt->fetchAll();
}

function getWorkoutById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM workouts WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function createWorkout($pdo, $user_id, $date, $duration, $notes) {
    $stmt = $pdo->prepare("INSERT INTO workouts (user_id, workout_date, duration_minutes, notes) VALUES (:user_id, :date, :duration, :notes)");
    return $stmt->execute([
        'user_id' => $user_id,
        'date' => $date,
        'duration' => $duration,
        'notes' => $notes
    ]);
}

function updateWorkout($pdo, $id, $date, $duration, $notes) {
    $stmt = $pdo->prepare("UPDATE workouts SET workout_date = :date, duration_minutes = :duration, notes = :notes WHERE id = :id");
    return $stmt->execute([
        'id' => $id,
        'date' => $date,
        'duration' => $duration,
        'notes' => $notes
    ]);
}

function deleteWorkout($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM workouts WHERE id = :id");
    return $stmt->execute(['id' => $id]);
}

function deleteWorkoutSets($pdo, $workout_id) {
    $stmt = $pdo->prepare("DELETE FROM sets WHERE workout_id = :workout_id");
    return $stmt->execute(['workout_id' => $workout_id]);
}

//  ПОЛЬЗОВАТЕЛИ 
function getAllUsers($pdo) {
    $stmt = $pdo->query("SELECT * FROM users");
    return $stmt->fetchAll();
}

function getUserById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

function createUser($pdo, $username, $email, $weight, $height) {
    $stmt = $pdo->prepare("INSERT INTO users (username, email, weight_kg, height_cm) VALUES (:username, :email, :weight, :height)");
    return $stmt->execute([
        'username' => $username,
        'email' => $email,
        'weight' => $weight,
        'height' => $height
    ]);
}

function updateUser($pdo, $id, $username, $email, $weight, $height) {
    $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email, weight_kg = :weight, height_cm = :height WHERE id = :id");
    return $stmt->execute([
        'id' => $id,
        'username' => $username,
        'email' => $email,
        'weight' => $weight,
        'height' => $height
    ]);
}

function deleteUser($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    return $stmt->execute(['id' => $id]);
}

//  ПОДХОДЫ
function getAllExercises($pdo) {
    $stmt = $pdo->query("SELECT * FROM exercises");
    return $stmt->fetchAll();
}

function getSetsByWorkout($pdo, $workout_id) {
    $stmt = $pdo->prepare("SELECT s.*, e.name FROM sets s JOIN exercises e ON s.exercise_id = e.id WHERE workout_id = :workout_id ORDER BY set_order");
    $stmt->execute(['workout_id' => $workout_id]);
    return $stmt->fetchAll();
}

function addSet($pdo, $workout_id, $exercise_id, $set_order, $repetitions, $weight) {
    $stmt = $pdo->prepare("INSERT INTO sets (workout_id, exercise_id, set_order, repetitions, added_weight_kg) VALUES (:workout_id, :exercise_id, :set_order, :repetitions, :weight)");
    return $stmt->execute([
        'workout_id' => $workout_id,
        'exercise_id' => $exercise_id,
        'set_order' => $set_order,
        'repetitions' => $repetitions,
        'weight' => $weight
    ]);
}

function updateSet($pdo, $id, $exercise_id, $set_order, $repetitions, $weight) {
    $stmt = $pdo->prepare("UPDATE sets SET exercise_id = :exercise_id, set_order = :set_order, repetitions = :repetitions, added_weight_kg = :weight WHERE id = :id");
    return $stmt->execute([
        'id' => $id,
        'exercise_id' => $exercise_id,
        'set_order' => $set_order,
        'repetitions' => $repetitions,
        'weight' => $weight
    ]);
}

function deleteSet($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM sets WHERE id = :id");
    return $stmt->execute(['id' => $id]);
}

function getSetById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM sets WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}
?>