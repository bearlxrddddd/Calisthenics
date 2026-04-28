<?php
require 'functions.php';

$workout_id = $_GET['workout_id'];
$exercises = getAllExercises($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addSet($pdo, $workout_id, $_POST['exercise_id'], $_POST['set_order'], $_POST['repetitions'], $_POST['weight']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавить подход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>➕ Добавить подход</h2>
    <form method="POST">
        <p>Упражнение:
            <select name="exercise_id" required>
                <?php foreach($exercises as $ex): ?>
                    <option value="<?= $ex['id'] ?>"><?= htmlspecialchars($ex['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>Номер подхода: <input type="number" name="set_order" required></p>
        <p>Повторения: <input type="number" name="repetitions" required></p>
        <p>Вес (кг): <input type="number" step="0.5" name="weight" value="0"></p>
        <button type="submit">Добавить</button>
        <a href="index.php">Назад</a>
    </form>
</body>
</html>