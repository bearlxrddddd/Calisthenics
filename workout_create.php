<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createWorkout($pdo, $_POST['user_id'], $_POST['workout_date'], $_POST['duration'], $_POST['notes']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавить тренировку</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2> Новая тренировка</h2>
    <form method="POST">
        <p>User ID: <input type="number" name="user_id" required></p>
        <p>Дата: <input type="date" name="workout_date" required></p>
        <p>Длительность (мин): <input type="number" name="duration" required></p>
        <p>Заметки: <textarea name="notes"></textarea></p>
        <button type="submit">Сохранить</button>
        <a href="index.php">Назад</a>
    </form>
</body>
</html>