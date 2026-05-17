<?php require './menu/header.php'; ?>

<h1>Калистеника трекер</h1>

<h2>Список тренировок</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Дата</th>
        <th>Длительность</th>
        <th>Заметки</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($workouts as $w): ?>
    <tr>
        <td><?= $w['id'] ?></td>
        <td><?= $w['workout_date'] ?></td>
        <td><?= $w['duration_minutes'] ?> мин</td>
        <td><?= htmlspecialchars($w['notes']) ?></td>
        <td>
            <a href="/index.php?page=workouts&action=edit&id=<?= $w['id'] ?>">✏️</a>
            <a href="/index.php?page=workouts&action=delete&id=<?= $w['id'] ?>">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if ($_SESSION['role'] === 'admin' && !empty($users)): ?>
    <h2>Список пользователей</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Вес</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['weight_kg'] ?> кг</td>
            <td>
                <a href="/index.php?page=users&action=edit&id=<?= $u['id'] ?>">✏️</a>
                <a href="/index.php?page=users&action=delete&id=<?= $u['id'] ?>">❌</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php require './menu/footer.php'; ?>