<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            background-color: #4CAF50; /* Зеленый цвет */
            color: white;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
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
    <div class="login-container">
        <h2>Вход</h2>
        <form action="login_process.php" method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Войти">
        </form>
        <a class="back-button" href="/html/index.html">Назад</a>
    </div>
</body>
</html>



