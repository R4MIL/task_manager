<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачи</title>
</head>

<body>
    <h2>Изменить задачу</h2>
    <a href="{{ route('users.show', $task) }}"><- Назад</a>
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                <p>Название: <input type="text" name="name" value="{{ $task->name }}" /></p>
                <p>Описание: <input type="text" name="description" value="{{ $task->description }}" /></p>
                <p>Дата завершения: <input type="date" name="deadline" value="{{ $task->deadline }}" /></p>
                <input type="submit" value="Изменить" />
            </form>
            <br>
            <form action="{{ route('tasks.delete', $task) }}" method="POST">
                <input type="submit" value="Удалить" />
            </form>

            <div style="color:red;">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
            </div>
</body>

</html>
