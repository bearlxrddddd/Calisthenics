<?php

$id = $_GET['id'];
$workout = getWorkoutById($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteWorkoutSets($pdo, $id);
    deleteWorkout($pdo, $id);
    header("Location: index.php");
    exit;
}
 require './menu/header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Удалить тренировку</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Удалить тренировку</h2>
    <p>Вы уверены, что хотите удалить тренировку от <strong><?= $workout['workout_date'] ?></strong>?</p>
    <form method="POST">
        <button type="submit" style="color:red">Да, удалить</button>
        <a href="index.php">Отмена</a>
    </form>
</body>
</html>
<?php require './menu/footer.php';?>
