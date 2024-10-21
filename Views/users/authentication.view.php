<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h2>Авторизация</h2>
        <form action="/authentication" method="POST">
            <p>Логин: <input type="text" name="login"/></p>
            <p>Пароль: <input type="password" name="password"/></p>
            <input type="submit" value="Войти"/>
        </form>   
        <br>
        <a href="/reg">Регистрация</a>
    </div>
</body>
</html>