<?php 
require './menu/header.php'; 
?>
    <link rel="stylesheet" href="./css/style.css">

<h1> Калистеника </h1>

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
            <td><?=$user['height_cm'] ?> см</td>
            <td>
                <a href="user_edit.php?id=<?= $user['id'] ?>">Изменить</a>
                <a href="user_delete.php?id=<?= $user['id'] ?>">Удалить</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php require './menu/footer.php';?>
