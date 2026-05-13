<?php require './menu/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Добавить подход</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h2> Добавить подход</h2>
    <form method="POST">
        <p>Упражнение:
            <select name="exercise_id" >
                <?php foreach($exercises as $ex): ?>
                    <option value="<?= $ex['id'] ?>"><?= htmlspecialchars($ex['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>Номер подхода: <input type="number" name="set_order" ></p>
        <p>Повторения: <input type="number" name="repetitions" ></p>
        <p>Вес (кг): <input type="number" step="0.5" name="weight" value="0"></p>
        <button type="submit">Добавить</button>
        <a href="index.php">Назад</a>
    </form>
</body>
</html>
<?php require './menu/footer.php';?>
