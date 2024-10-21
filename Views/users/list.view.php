<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователи</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h2>Главная страница пользователей</h2>
        <h3>Список пользователей</h3>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><a href="/user/get?id=<?= $user->getId()?>"><?= $user->getName() ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>  
</body>
</html>