<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачи</title>
</head>
<body>
   <h2>Добавить новую задачу</h2> 
   <form action="/task/create" method="POST">
        <p>Название: <input type="text" name="name"/></p>
        <p>Описание: <input type="text" name="description"/></p>
        <p>Дата завершения: <input type="date" name="deadline"/></p>
        <p hidden>owner_id: <input type="text" name="owner_id" value="<?= $user_id?>"/></p>
        <input type="submit" value="Добавить"/>
    </form>   
</body>
</html>