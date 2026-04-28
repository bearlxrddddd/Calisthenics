<?php
require 'functions.php';

$id = $_GET['id'];
$set = getSetById($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteSet($pdo, $id);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Удалить подход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>⚠️ Удалить подход</h2>
    <p>Вы уверены, что хотите удалить подход №<strong><?= $set['set_order'] ?></strong>?</p>
    <form method="POST">
        <button type="submit" style="color:red">Да, удалить</button>
        <a href="index.php">Отмена</a>
    </form>
</body>
</html>