<?php require './menu/header.php'; ?>

<h2>Новый пользователь (только для админа)</h2>

<form method="POST" action="/index.php?page=users&action=create">
    <p>Имя: <input type="text" name="username" required></p>
    <p>Email: <input type="email" name="email" required></p>
    <p>Вес (кг): <input type="number" step="0.1" name="weight"></p>
    <p>Рост (см): <input type="number" name="height"></p>
    <button type="submit">Создать</button>
    <a href="/index.php?page=workouts&action=list">Назад</a>
</form>

<?php require './menu/footer.php'; ?>