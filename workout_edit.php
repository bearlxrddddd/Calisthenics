<?php
require 'functions.php';

$id = $_GET['id'];
$workout = getWorkoutById($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateWorkout($pdo, $id, $_POST['workout_date'], $_POST['duration'], $_POST['notes']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Редактировать тренировку</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>✏️ Редактировать тренировку</h2>
    <form method="POST">
        <p>Дата: <input type="date" name="workout_date" value="<?= $workout['workout_date'] ?>" required></p>
        <p>Длительность (мин): <input type="number" name="duration" value="<?= $workout['duration_minutes'] ?>" required></p>
        <p>Заметки: <textarea name="notes"><?= htmlspecialchars($workout['notes']) ?></textarea></p>
        <button type="submit">Обновить</button>
        <a href="index.php">Отмена</a>
    </form>
</body>
</html>