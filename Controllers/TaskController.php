<?php
namespace task_manager\Controllers;

use task_manager\Models\Task;
use task_manager\Views\View;

class TaskController {

    public function add($user_id) {
        return View::render('tasks/add',['user_id' => $user_id]);
    }

    public function create($name,$description,$deadline,$owner_id) {
        Task::create([
            'name' => $name,
            'description' =>  $description,
            'deadline' => $deadline,
            'owner_id' =>  $owner_id
        ]);

        header('Location: /user/get?id=' . $owner_id);
    }

    public function edit($id) {
        $task = Task::find($id);
        return View::render('tasks/edit',['task' => $task]);
    }

    public function update($id,$name,$description,$deadline,$owner_id) {
        Task::update([
            'id' => $id,
            'name' => $name,
            'description' =>  $description,
            'deadline' => $deadline,
            'owner_id' =>  $owner_id
        ]);

        header('Location: /user/get?id=' . $owner_id);
    }

    public function delete($id,$owner_id) {
        Task::delete($id);
        header('Location: /user/get?id=' . $owner_id);
    }
}