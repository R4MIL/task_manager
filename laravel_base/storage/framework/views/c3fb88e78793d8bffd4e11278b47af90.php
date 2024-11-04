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
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(route('users.show', $user)); ?>"><?php echo e($user->name); ?>,</a>
                    количество задач: <?php echo e($user->tasks?->count()); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

</body>

</html>
<?php /**PATH C:\Users\r.asadullin\Documents\Обучения\обучение PHP Laravel разработчик\php\task_manager\laravel_base\resources\views/users/index.blade.php ENDPATH**/ ?>