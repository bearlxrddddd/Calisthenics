<?php require './menu/header.php'; ?>

<h2>Регистрация</h2>

<form method="POST">
    <p>Имя: <input type="text" name="username"></p>
    <p>Email: <input type="email" name="email"></p>
    <p>Пароль: <input type="password" name="password"></p>
    <p>Вес (кг): <input type="number" step="0.1" name="weight"></p>
    <p>Рост (см): <input type="number" name="height"></p>
    <button type="submit">Зарегистрироваться</button>
</form>

<p>Уже есть аккаунт? <a href="/index.php?page=login&action=login">Войти</a></p>

<?php require './menu/footer.php'; ?>