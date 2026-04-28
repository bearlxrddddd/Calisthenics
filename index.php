<?php
require 'functions.php';

$workouts = getAllWorkouts($pdo);
$users = getAllUsers($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Калистеника трекер</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🏋️ Калистеника трекер</h1>
    
    <div class="menu">
        <h3>📋 Тренировки</h3>
        <a href="workout_create.php">➕ Добавить тренировку</a>
        
        <h3>👤 Пользователи</h3>
        <a href="user_create.php">➕ Добавить пользователя</a>
        
        <h3>🏋️ Подходы</h3>
        <a href="set_add.php?workout_id=1">➕ Добавить подход</a>
    </div>
    
    <h2>📋 Список тренировок</h2>
    <table>
        <tr><th>ID</th><th>Дата</th><th>Длит.</th><th>Заметки</th><th>Действия</th></tr>
        <?php foreach($workouts as $workout): ?>
        <tr>
            <td><?= $workout['id'] ?></td>
            <td><?= $workout['workout_date'] ?></td>
            <td><?= $workout['duration_minutes'] ?> мин</td>
            <td><?= htmlspecialchars($workout['notes']) ?></td>
            <td>
                <a href="workout_edit.php?id=<?= $workout['id'] ?>">✏️</a>
                <a href="workout_delete.php?id=<?= $workout['id'] ?>">❌</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <h2>👥 Пользователи</h2>
    <table>
        <tr><th>ID</th><th>Имя</th><th>Email</th><th>Вес</th><th>Действия</th></tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['weight_kg'] ?> кг</td>
            <td>
                <a href="user_edit.php?id=<?= $user['id'] ?>">✏️</a>
                <a href="user_delete.php?id=<?= $user['id'] ?>">❌</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>