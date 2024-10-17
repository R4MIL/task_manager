<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <h2>Авторизация</h2>
    <form action="/auth" method="POST">
        <p>Логин: <input type="text" name="login"/></p>
        <p>Пароль: <input type="password" name="password"/></p>
        <input type="submit" value="Войти"/>
    </form>   
    <br>
    <a href="/reg">Регистрация</a>
</body>
</html>