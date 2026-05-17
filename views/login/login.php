<?php
if (isset($_SESSION['user_id'])) {
    header("Location: /index.php?page=workouts&action=list");
    exit;
}
?>

<?php require './menu/header.php'; ?>

<h2>Вход в систему</h2>

<?php if (isset($error)): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="/index.php?page=login&action=login">
    <p>Email: <input type="email" name="email" required></p>
    <p>Пароль: <input type="password" name="password" required></p>
    <button type="submit">Войти</button>
</form>

<p>Нет аккаунта? <a href="/index.php?page=login&action=register">Зарегистрироваться</a></p>

<?php require './menu/footer.php'; ?>