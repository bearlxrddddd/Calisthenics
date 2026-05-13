<?php require './menu/header.php'; ?>

<h2>Вход в систему</h2>

<?php if (isset($error)): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <p>Email: <input type="email" name="email"></p>
    <p>Пароль: <input type="password" name="password"></p>
    <button type="submit">Войти</button>
</form>

<p>Нет аккаунта? <a href="/index.php?page=login&action=register">Зарегистрироваться</a></p>

<?php require './menu/footer.php'; ?>