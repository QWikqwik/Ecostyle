<?php
session_start();
require_once('db_connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

// Подготавливаем SQL запрос для получения данных о пользователе
$sql = "SELECT user_id, username, password, role FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $db_username, $db_password, $role);
    $stmt->fetch();
    if ($password === $db_password) { // Простое сравнение паролей
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $db_username;
        
        if ($role === 'admin') { // Проверяем роль пользователя
            header("Location: admin_panel.php"); // Перенаправляем администратора на административную панель
        } else {
            header("Location: profile.php"); // Перенаправляем обычного пользователя на его профиль
        }
        exit();
    } else {
        echo "Неверное имя пользователя или пароль.";
    }
} else {
    echo "Неверное имя пользователя или пароль.";
}

$stmt->close();
$conn->close();
?>





