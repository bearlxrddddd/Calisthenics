<?php
require "config.php";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/registry.css">



          <form action="index.php" method="post">
        <label class="username" id="username">Логин</label>
        <input type="text" name="username">
        <label class="email" id="email">Email</label>
        <input type="email">
        <!-- <label>Изображение пользователя</label>
        <input type="file" name="avatar"> -->

        <button type="submit" onclick="">Зарегистрироваться</button>
        <p>
            у вас есть аккаунт? - <a href="login.php">Авторизуйтесь</a>
        </p>
        <a href="/">назад</a>
    </form>