<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './config/config.php';

$email = 'admin@gmail.com';  // поменяй на свой email
$password = 'bearlxrd2007'; // поменяй на свой пароль

echo "Проверка входа для: " . $email . "<br><br>";

// 1. Проверяем, есть ли пользователь
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if (!$user) {
    die("Пользователь с email " . $email . " не найден!");
}

echo "1. Пользователь найден: " . $user['username'] . "<br>";
echo "2. ID пользователя: " . $user['id'] . "<br>";
echo "3. Хеш пароля в БД: " . $user['password'] . "<br>";
echo "4. Длина хеша: " . strlen($user['password']) . " символов<br><br>";

// 2. Проверяем пароль
if (password_verify($password, $user['password'])) {
    echo "✅ Пароль верный!<br>";
    echo "Попробуй войти через форму.";
} else {
    echo "❌ Пароль НЕ верный!<br>";
    echo "Нужно обновить пароль.<br>";
    
    // Создаём правильный хеш
    $correct_hash = password_hash($password, PASSWORD_DEFAULT);
    echo "Правильный хеш для пароля '{$password}': <br>" . $correct_hash . "<br>";
    echo "Обнови пароль в БД этим хешем.";
}

// 3. Проверяем функцию loginUser
$result = loginUser($pdo, $email, $password);
echo "<br><br>5. Результат loginUser(): " . ($result ? "✅ true" : "❌ false");
?>