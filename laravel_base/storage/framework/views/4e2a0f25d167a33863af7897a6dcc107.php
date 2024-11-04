<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачи</title>
</head>

<body>
    <h2>Изменить задачу</h2>
    <a href="<?php echo e(route('users.show', $task)); ?>"><- Назад</a>
            <form action="<?php echo e(route('tasks.update', $task)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <p>Название: <input type="text" name="name" value="<?php echo e($task->name); ?>" /></p>
                <p>Описание: <input type="text" name="description" value="<?php echo e($task->description); ?>" /></p>
                <p>Дата завершения: <input type="date" name="deadline" value="<?php echo e($task->deadline); ?>" /></p>
                <input type="submit" value="Изменить" />
            </form>
            <br>
            <form action="<?php echo e(route('tasks.delete', $task)); ?>" method="POST">
                <input type="submit" value="Удалить" />
            </form>

            <div style="color:red;">
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
</body>

</html>
<?php /**PATH C:\Users\r.asadullin\Documents\Обучения\обучение PHP Laravel разработчик\php\task_manager\laravel_base\resources\views/tasks/edit.blade.php ENDPATH**/ ?>