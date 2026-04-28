<?php
require 'functions.php';

$id = $_GET['id'];
$set = getSetById($pdo, $id);
$exercises = getAllExercises($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateSet($pdo, $id, $_POST['exercise_id'], $_POST['set_order'], $_POST['repetitions'], $_POST['weight']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Редактировать подход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2> Редактировать подход</h2>
    <form method="POST">
        <p>Упражнение:
            <select name="exercise_id" required>
                <?php foreach($exercises as $ex): ?>
                    <option value="<?= $ex['id'] ?>" <?= $ex['id'] == $set['exercise_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($ex['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>Номер подхода: <input type="number" name="set_order" value="<?= $set['set_order'] ?>" required></p>
        <p>Повторения: <input type="number" name="repetitions" value="<?= $set['repetitions'] ?>" required></p>
        <p>Вес (кг): <input type="number" step="0.5" name="weight" value="<?= $set['added_weight_kg'] ?>"></p>
        <button type="submit">Обновить</button>
        <a href="index.php">Отмена</a>
    </form>
</body>
</html>