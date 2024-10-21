<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карточка пользователя</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h2>Данные пользователя</h2>
        <a href="/users/list"><- На главную</a>
        <p>Имя: <?= $user->getName() ?></p>
        <p>Почта: <?= $user->getEmail() ?></p>
        <hr>
        <h2>Задачи: <?= count($user->tasks())?></h2>
        <table cellspacing="2" border="1" cellpadding="5" width="600">
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Дата завeршения</th>
                <th>Действие</th>
            </tr>
            <?php foreach ($user->tasks() as $task): ?>
                <tr style="border: 1px solid black;">
                    <td><?= $task->getName() ?></td>
                    <td><?= $task->getDescription() ?></td>
                    <td><?= $task->getDeadline() ?></td>
                    <td><a href="/task/edit?id=<?= $task->getId() ?>">изменить</a></td>
                </tr>
            <?php endforeach ?>
        </table>
        <h3><a href="/task/add?user_id=<?= $user->getId()?>">Добавить задачу</a></h3>
    </div>
</body>
</html>