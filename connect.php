<?php
$server = 'localhost'; // Имя или адрес сервера
$user = 'root'; // Имя пользователя БД
$password = ''; // Пароль пользователя
$db = 'eco_shop'; // Название БД
 
    $conn = new mysqli($server, $user, $password, $db);

    if ($conn -> connect_error) {
        die("error: " . $conn -> connect_error);
    }
?>