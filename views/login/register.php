<?php
if (isset($_SESSION['user_id'])) {
    header("Location: /index.php?page=workouts&action=list");
    exit;
}
?>

<?php require './menu/header.php'; ?>

<h2>Регистрация</h2>

<form method="POST" action="/index.php?page=login&action=register">
    <p>Имя: <input type="text" name="username" required></p>
    <p>Email: <input type="email" name="email" required></p>
    <p>Пароль: <input type="password" name="password" required></p>
    <p>Вес (кг): <input type="number" step="0.1" name="weight"></p>
    <p>Рост (см): <input type="number" name="height"></p>
    <p>Уровень подготовки:
        <select name="experience_level">
            <option value="beginner">Начинающий</option>
            <option value="intermediate">Средний</option>
            <option value="advanced">Продвинутый</option>
        </select>
    </p>
    <button type="submit">Зарегистрироваться</button>
</form>

<p>Уже есть аккаунт? <a href="/index.php?page=login&action=login">Войти</a></p>

<?php require './menu/footer.php'; ?>