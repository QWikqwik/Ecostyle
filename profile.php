<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Профиль пользователя</title>
</head>
<body>
    <h2>Профиль пользователя</h2>
    <p>Привет, <?php echo $_SESSION['username']; ?>!</p>
    <p><a href="logout.php">Выйти</a></p>
</body>
</html>
