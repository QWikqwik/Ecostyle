<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th, .user-table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .user-table th {
            background-color: #4CAF50;
            color: white;
        }

        .user-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .user-table tr:hover {
            background-color: #ddd;
        }

        .user-table input[type="text"], .user-table select {
            width: calc(100% - 20px);
            padding: 6px 10px;
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .user-table input[type="submit"], .user-table button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .user-table input[type="submit"]:hover, .user-table button:hover {
            background-color: #45a049;
        }

        .user-table .delete-button {
            background-color: #f44336;
        }

        .user-table .delete-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<?php
session_start();
require_once('db_connection.php');

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Обработка редактирования пользователя
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_user'])) {
    $user_id = $_POST['user_id'];
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $new_role = $_POST['new_role'];

    $sql = "UPDATE users SET username='$new_username', email='$new_email', role='$new_role' WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Пользователь успешно обновлен.";
    } else {
        echo "Ошибка при обновлении пользователя: " . $conn->error;
    }
}

// Обработка удаления пользователя
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE user_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Пользователь успешно удален.";
    } else {
        echo "Ошибка при удалении пользователя: " . $conn->error;
    }
}

// Извлекаем данные из базы данных
$sql = "SELECT user_id, username, email, role FROM users"; // Замените "users" на имя вашей таблицы пользователей
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='user-table'>";
    echo "<tr><th>User ID</th><th>Username</th><th>Email</th><th>Role</th><th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["role"] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='user_id' value='" . $row["user_id"] . "'>";
        echo "<input type='text' name='new_username' value='" . $row["username"] . "'>";
        echo "<input type='text' name='new_email' value='" . $row["email"] . "'>";
        echo "<select name='new_role'>";
        echo "<option value='admin' " . ($row["role"] == "admin" ? "selected" : "") . ">Admin</option>";
        echo "<option value='user' " . ($row["role"] == "user" ? "selected" : "") . ">User</option>";
        echo "</select>";
        echo "<input type='submit' name='edit_user' value='Save'>";
        echo "<button type='submit' name='delete_user' class='delete-button'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>



