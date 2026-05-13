<?php
require 'functions.php';

$workouts = getAllWorkouts($pdo);
$users = getAllUsers($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Калистеника </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="registrу.php">Регистрация</a><br>
    <a href="login.php">Авторизация</a>
    <h1> Калистеника </h1>
    
    <div class="menu">
        <h3> Тренировки</h3>
        <a href="workout_create.php">Добавить тренировку</a>
        
        <h3> Пользователи</h3>
        <a href="user_create.php">Добавить пользователя</a>
        
    </div>
    
    <h2> Список тренировок</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Дата</th>
            <th>Длит.</th>
            <th>Заметки</th>
            <th>Действия</th>
        </tr>
        <?php foreach($workouts as $workout): ?>
        <tr>
            <td><?= $workout['id'] ?></td>
            <td><?= $workout['workout_date'] ?></td>
            <td><?= $workout['duration_minutes'] ?> мин</td>
            <td><?= htmlspecialchars($workout['notes']) ?></td>
            <td>                
                <a href="workout_view.php?id=<?= $workout['id'] ?>">Просмотр</a>
                <a href="workout_edit.php?id=<?= $workout['id'] ?>">Изменить</a>
                <a href="workout_delete.php?id=<?= $workout['id'] ?>">Удалить</a>
                        <a href="set_create.php?workout_id=<?= $workout['id']?>">Добавить подход</a>

            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <h2> Пользователи</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Вес</th>
            <th>Рост</th>
            <th>Действия</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['weight_kg'] ?> кг</td>
            <td>$user['height_cm']</td>
            <td>
                <a href="user_edit.php?id=<?= $user['id'] ?>">Изменить</a>
                <a href="user_delete.php?id=<?= $user['id'] ?>">Удалить</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>