<?php
// Подключаемся к базе данных
$servername = "localhost"; // Имя сервера
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$dbname = "eco_shop"; // Имя вашей базы данных

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные заказа из POST запроса
$orderData = json_decode(file_get_contents("php://input"), true);

// Извлекаем данные из массива $orderData
$user_id = $orderData['user_id'];
$order_date = $orderData['order_date'];
$total_price = $orderData['total_price'];

// Подготавливаем SQL запрос для вставки данных в таблицу "Заказы"
$sql = "INSERT INTO Orders (user_id, order_date, total_price)
VALUES ('$user_id', '$order_date', '$total_price')";

// Выполняем SQL запрос
if ($conn->query($sql) === TRUE) {
    echo "Заказ успешно добавлен";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрываем соединение с базой данных
$conn->close();
?>
