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
        <a href="{{ route('users.index') }}"><- На главную</a>
                <p>Имя: {{ $user->name }}</p>
                <p>Почта: {{ $user->email }}</p>
                <hr>
                <table cellspacing="2" border="1" cellpadding="5" width="600">
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Дата завeршения</th>
                        <th>Действие</th>
                    </tr>
                    @foreach ($user->tasks as $task)
                        <tr style="border: 1px solid black;">
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td><a href="{{ route('tasks.edit', $task) }}">изменить</a></td>
                        </tr>
                    @endforeach
                </table>
                <h3><a href="{{ route('tasks.add', $user->id) }}">Добавить задачу</a></h3>
    </div>
</body>

</html>
