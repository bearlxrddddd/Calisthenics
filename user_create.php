<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createUser($pdo, $_POST['username'], $_POST['email'], $_POST['weight'], $_POST['height']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Новый пользователь</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Новый пользователь</h2>
    <form method="POST">
        <p>Имя: <input type="text" name="username" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Вес (кг): <input type="number" step="0.1" name="weight"></p>
        <p>Рост (см): <input type="number" name="height"></p>
        <button type="submit">Создать</button>
        <a href="index.php">Назад</a>
    </form>
</body>
</html>