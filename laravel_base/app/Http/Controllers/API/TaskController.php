<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function list() {
        $users = Task::where('user_id', Auth::user()->id)->get();
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
                'message' => 'Task created failed: '. $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'task_id' => $task->id
        ], 201);
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
