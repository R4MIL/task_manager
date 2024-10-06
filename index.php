<?php
    include './TaskManager.php';

    const database = 'taskManagerDB';

    $user1 = new User(['name'=>'Миша']);
    $user1->setDatabase(database)
    ->setTable('Users')
    ->insert();
    $user1->setDatabase(database)
    ->setTable('Users')
    ->get();

    $user2 = new User(['name'=>'Саша']);
    $user2->setDatabase(database)
    ->setTable('Users')
    ->insert();

    $task = new Task(['name'=>'Задача №1','deadline'=>'2024-12-01'], $user1);
    $task->setDatabase(database)
    ->setTable('Tasks')
    ->insert();
    $task->setDatabase(database)
    ->setTable('Tasks')
    ->get();
    $task->setDatabase(database)
    ->setTable('Tasks')
    ->updateTask(['name'=>'Задача №1','deadline'=>'2024-12-15'], $user2);
    $task->setDatabase(database)
    ->setTable('Tasks')
    ->delete();
    $task = null;

 ?>