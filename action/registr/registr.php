<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form action="registration.php" method="POST">
        <p>Имя: <input type="text" name="name"/></p>
        <p>Пол: 
            <input type="radio" name="gender" value="male">мужской</input>
            <input type="radio" name="gender" value="female">женский</input>
        </p>
        <p>Логин: <input type="text" name="login"/></p>
        <p>Пароль: <input type="password" name="password"/></p>
        <p>Почта: <input type="email" name="mail"/></p>
        <p>Получать рассылку: <input type="checkbox" name="receive_letter" checked="checked" value="true"/></p>
        <input type="submit" value="Войти"/>
    </form>     
</body>
</html>