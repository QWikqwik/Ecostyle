<?php
session_start();
require_once('db_connection.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Хэширование пароля
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Подготавливаем SQL запрос для вставки данных в таблицу "Пользователи"
$sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $email);

if ($stmt->execute()) {
    echo "Регистрация прошла успешно!";
} else {
    echo "Ошибка при регистрации: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
