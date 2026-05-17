<?php require './menu/header.php'; ?>

<h2>Мой профиль</h2>

<p><strong>Имя:</strong> <?= $user['username'] ?></p>
<p><strong>Email:</strong> <?= $user['email'] ?></p>
<p><strong>Вес:</strong> <?= $user['weight_kg'] ?> кг</p>
<p><strong>Рост:</strong> <?= $user['height_cm'] ?> см</p>
<p><strong>Уровень:</strong> 
    <?php
    $levels = [
        'beginner' => 'Начинающий',
        'intermediate' => 'Средний',
        'advanced' => 'Продвинутый'
    ];
    echo $levels[$user['experience_level']];
    ?>
</p>

<a href="/index.php?page=workouts&action=list">Назад</a>

<?php require './menu/footer.php'; ?>