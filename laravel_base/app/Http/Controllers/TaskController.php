<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function add(int $owner_id) {
        return view('tasks.add',['owner_id' => $owner_id]);
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required|date'
        ]);

        Task::create($request->all());
        return redirect()->route('users.show', $request->owner_id);
    }

    public function edit(Task $task) {
        return view('tasks.edit',['task' => $task]);
    }

    public function update(Request $request, Task $task) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required|date'
        ]);

        $task->update($request->all());
        return redirect()->route('users.show', $task->owner_id);
    }

    public function delete(Task $task) {
        $task->delete();
        return redirect()->route('users.show', $task->owner_id);
    }
}
