<?php

namespace App\Http\Controllers\API;

use App\Actions\Policy\PolicyAction;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function list() {
        $users = Task::all();
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function create(Request $request) {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'deadline' => 'required|date'
            ]);

            $task = Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'deadline' => $request->deadline,
                'user_id' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Task create failed: '. $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'task_id' => $task->id
        ], 201);
    }

    public function update(Request $request) {
        try {
            $request->validate([
                'task_id' => 'required',
            ]);

            $task = Task::find($request->task_id);
            if ($task == null) {
                throw new Exception("Task id not found");
            } else {
                PolicyAction::check('update',$task);
                if ($request->name == null && $request->description == null && $request->deadline == null) {
                    throw new Exception("No field to update");   
                } else {
                    $task->update([
                        'name' => ($request->name) ? $request->name : $task->name,
                        'description' => ($request->description) ? $request->description : $task->description,
                        'deadline' => ($request->deadline) ? $request->deadline : $task->deadline
                    ]); 
                }
            } 
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Task update failed: '. $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully',
            'task_id' => $task->id
        ]);
    }

    public function delete(Request $request) {
        try {
            $request->validate([
                'id' => 'required'
            ]); 

            $task = Task::find($request->id);
            if ($task == null) {
                throw new Exception("Task id not found");
            } else {
                PolicyAction::check('delete',$task);
                $task->delete();    
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Task delete failed: '. $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ]);
        
    }
}
