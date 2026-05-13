<?php
$id = $_GET['id'];
$user = getUserById($pdo, $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteUser($pdo, $id);
    header("Location: index.php");
    exit;
}
 require './menu/header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Удалить пользователя</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h2> Удалить пользователя</h2>
    <p>Вы уверены, что хотите удалить <strong><?= htmlspecialchars($user['username']) ?></strong>?</p>
    <form method="POST">
        <button 
type="submit" style="color:red">Да, удалить</button>
        <a href="index.php">Отмена</a>
    </form>
</body>
</html>
<?php require './menu/footer.php';?>