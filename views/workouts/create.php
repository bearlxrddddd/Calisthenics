<?php require './menu/header.php'; ?>

<h2>Новая тренировка</h2>

<form method="POST" action="/index.php?page=workouts&action=create">
    <p>Дата: <input type="date" name="workout_date" required></p>
    <p>Длительность (мин): <input type="number" name="duration" required></p>
    <p>Заметки: <textarea name="notes"></textarea></p>
    <button type="submit">Сохранить</button>
    <a href="/index.php?page=workouts&action=list">Назад</a>
</form>

<?php require './menu/footer.php'; ?>