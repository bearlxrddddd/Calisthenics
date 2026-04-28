<?php
require 'functions.php';

$id = $_GET['id'];
$user = getUserById($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateUser($pdo, $id, $_POST['username'], $_POST['email'], $_POST['weight'], $_POST['height']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Редактировать пользователя</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Редактировать пользователя</h2>
    <form method="POST">
        <p>Имя: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required></p>
        <p>Email: <input type="email" name="email" value="<?= $user['email'] ?>" required></p>
        <p>Вес (кг): <input type="number" step="0.1" name="weight" value="<?= $user['weight_kg'] ?>"></p>
        <p>Рост (см): <input type="number" name="height" value="<?= $user['height_cm'] ?>"></p>
        <button type="submit">Обновить</button>
        <a href="index.php">Отмена</a>
    </form>
</body>
</html>