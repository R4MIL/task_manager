<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пользователи</title>
</head>

<body>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h2>Главная страница пользователей</h2>
        <h3>Список пользователей</h3>
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="{{ route('users.show', $user) }}">{{ $user->name }},</a>
                    количество задач: {{ $user->tasks?->count() }}
                </li>
            @endforeach
        </ul>
    </div>

</body>

</html>
