<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калистеника трекер</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="user-info">
                Привет, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> 
                (<?= $_SESSION['role'] ?? 'user' ?>) | 
                <a href="/index.php?page=login&action=logout">Выход</a>
            </div>
            
            <div class="menu">
                <a href="/index.php?page=workouts&action=list">Тренировки</a>
                <a href="/index.php?page=users&action=profile">Мой профиль</a>
                <a href="/index.php?page=sets&action=add">Добавить подход</a>
                
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="/index.php?page=users&action=create">Добавить пользователя</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>