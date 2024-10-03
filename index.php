<?php
    include './TaskManager.php';




    $user1 = new User('taskManagerDB','Миша');
    $user1->addUser();
    $user1->infoUser();
    $user2 = new User('taskManagerDB','Саша');
    $user2->addUser();
    $user2->infoUser();

    $task = new Task('taskManagerDB','Задача №1',$user1,'01.12.2024');
    $task->createTask();
    $task->infoTask();
    $task->updateTask($user2,'15.12.2024');
    $task->infoTask();
    $task = null;
?>