<?php 
require './menu/header.php'; 
?>
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
    </table>\

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
<?php require './menu/footer.php';?>
