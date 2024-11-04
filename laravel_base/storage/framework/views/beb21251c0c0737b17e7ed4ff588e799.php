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
        <a href="<?php echo e(route('users.index')); ?>"><- На главную</a>
                <p>Имя: <?php echo e($user->name); ?></p>
                <p>Почта: <?php echo e($user->email); ?></p>
                <hr>
                <table cellspacing="2" border="1" cellpadding="5" width="600">
                    <tr>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Дата завeршения</th>
                        <th>Действие</th>
                    </tr>
                    <?php $__currentLoopData = $user->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="border: 1px solid black;">
                            <td><?php echo e($task->name); ?></td>
                            <td><?php echo e($task->description); ?></td>
                            <td><?php echo e($task->deadline); ?></td>
                            <td><a href="<?php echo e(route('tasks.edit', $task)); ?>">изменить</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <h3><a href="<?php echo e(route('tasks.add', $user->id)); ?>">Добавить задачу</a></h3>
    </div>
</body>

</html>
<?php /**PATH C:\Users\r.asadullin\Documents\Обучения\обучение PHP Laravel разработчик\php\task_manager\laravel_base\resources\views/users/show.blade.php ENDPATH**/ ?>