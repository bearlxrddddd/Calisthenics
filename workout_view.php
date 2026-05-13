<?php
require 'functions.php';


$id = $_GET['id'];
$set = getWorkoutById($pdo, $id);
$sets = getSetsByWorkout($pdo, $id);
?>
    <link rel="stylesheet" href="style.css">

<h2>Тренировка от <?= $set['workout_date'] ?></h2>
<p>Длительность: <?= $set['duration_minutes'] ?> мин</p>

<h3>Подходы:</h3>
<table >
    <tr>
        <th>Упражнение</th>
        <th>Подход</th
        ><th>Повторения</th>
        <th>Вес (кг)</th>
    </tr>
    <?php foreach ($sets as $set): ?>
    <tr>
        <td><?= $set['name'] ?></td>
        <td><?= $set['set_order'] ?></td>
        <td><?= $set['repetitions'] ?></td>
        <td><?= $set['added_weight_kg'] ?></td>
        <td>
            <a href="set_edit.php?id=<?= $set['id'] ?>">Изменить</a>
                <a href="set_delete.php?id=<?= $set['id'] ?>">Удалить</a>
        </td>
    </tr>

    <?php endforeach; ?>
</table>