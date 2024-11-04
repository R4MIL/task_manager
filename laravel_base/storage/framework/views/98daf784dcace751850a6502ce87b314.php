<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачи</title>
</head>

<body>
    <h2>Добавить новую задачу</h2>
    <a href="<?php echo e(route('users.show', $owner_id)); ?>"><- Назад</a>
            <form action="<?php echo e(route('tasks.create')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <p>Название: <input type="text" name="name" value="<?php echo e(old('name')); ?>" /></p>
                <p>Описание: <input type="text" name="description" value="<?php echo e(old('description')); ?>" /></p>
                <p>Дата завершения: <input type="date" name="deadline" value="<?php echo e(old('deadline')); ?>" /></p>
                <p hidden>owner_id: <input type="text" name="owner_id" value="<?php echo e($owner_id); ?>" /></p>
                <input type="submit" value="Добавить" />
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
<?php /**PATH C:\Users\r.asadullin\Documents\Обучения\обучение PHP Laravel разработчик\php\task_manager\laravel_base\resources\views/tasks/add.blade.php ENDPATH**/ ?>