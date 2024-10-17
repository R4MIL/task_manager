<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form action="/registr" method="POST">
        <p>Имя: <input type="text" name="name"/></p>
        <p>Почта: <input type="email" name="email"/></p>
        <p>Логин: <input type="text" name="login"/></p>
        <p>Пароль: <input type="password" name="password"/></p>
        <input type="submit" value="Зарегистрироваться"/>
    </form>   
    <br>
    <a href="/index">Авторизация</a>
</body>
</html>