<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачи</title>
</head>
<body>
   <h2>Изменить задачу</h2> 
   <form action="/task/update" method="POST">
        <p hidden>id: <input type="text" name="id" value="<?= $task->getId() ?>"/></p>
        <p>Название: <input type="text" name="name" value="<?= $task->getName() ?>"/></p>
        <p>Описание: <input type="text" name="description" value="<?= $task->getDescription() ?>"/></p>
        <p>Дата завершения: <input type="date" name="deadline" value="<?= $task->getDeadline() ?>"/></p>
        <p hidden>owner_id: <input type="text" name="owner_id" value="<?= $task->getOwnerId() ?>"/></p>
        <input type="submit" value="Изменить"/>
    </form>
    <br>
    <form action="/task/delete" method="POST">
        <p hidden>id: <input type="text" name="id" value="<?= $task->getId() ?>"/></p>
        <p hidden>owner_id: <input type="text" name="owner_id" value="<?= $task->getOwnerId() ?>"/></p>
        <input type="submit" value="Удалить"/>
    </form>  
</body>
</html>