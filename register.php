<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .registration-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .registration-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .registration-container input[type="text"],
        .registration-container input[type="password"],
        .registration-container input[type="email"],
        .registration-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .registration-container input[type="submit"] {
            background-color: #4CAF50; /* Зеленый цвет */
            color: white;
            cursor: pointer;
        }
        .registration-container input[type="submit"]:hover {
            background-color: #45a049; /* Темно-зеленый цвет при наведении */
        }
        /* Стили для кнопки "Назад" */
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #808080; /* Серый цвет */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #555555; /* Темно-серый цвет при наведении */
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Регистрация</h2>
        <form action="register_process.php" method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <input type="submit" value="Зарегистрироваться">
        </form>
        <a class="back-button" href="/html/index.html">Назад</a>
    </div>
</body>
</html>
