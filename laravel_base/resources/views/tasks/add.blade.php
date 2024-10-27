<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачи</title>
</head>

<body>
    <h2>Добавить новую задачу</h2>
    <a href="{{ route('users.show', $user_id) }}"><- Назад</a>
            <form action="{{ route('tasks.create') }}" method="POST">
                @csrf
                <p>Название: <input type="text" name="name" value="{{ old('name') }}" /></p>
                <p>Описание: <input type="text" name="description" value="{{ old('description') }}" /></p>
                <p>Дата завершения: <input type="date" name="deadline" value="{{ old('deadline') }}" /></p>
                <p hidden>user_id: <input type="text" name="user_id" value="{{ $user_id }}" /></p>
                <input type="submit" value="Добавить" />
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
