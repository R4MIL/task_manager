<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public $mainPath = 'public/task_img';

    public function upload(Request $request) {
        $task = Task::find($request->task_id);
        if ($task == null) {
            return response()->json([
                'status' => false, 
                'message' => "Task id not found"
            ]);
        } 
        if($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $getfilenamewitoutext = pathinfo($filename, PATHINFO_FILENAME);
            $getfileExtension = $request->file('image')->getClientOriginalExtension();
            $createnewFileName = '/'. $request->task_id .'/'.str_replace(' ','_', $getfilenamewitoutext).'.'.$getfileExtension;
            if(Storage::exists($this->mainPath . '/' . $request->task_id)) {
                Storage::deleteDirectory($this->mainPath . '/'. $request->task_id);
            } 
            $img_path = $request->file('image')->storeAs($this->mainPath, $createnewFileName);
            $task->image = $createnewFileName;
        }

        if($task->save()) { 
            return response()->json([
                'status' => true, 
                'message' => "Image uploded successfully"
            ]);      
        }
        else {     
            return response()->json([
                'status' => false, 
                'message' => "Image not uploded successfull"
            ]);   
        }
    }

    public function remove(Request $request) {
        $task = Task::find($request->task_id);
        if ($task == null) {
            return response()->json([
                'status' => false, 
                'message' => "Task id not found"
            ]);
        } 
        if ($task == null) {
            return response()->json([
                'status' => false, 
                'message' => "Task id not found"
            ]);
        } 
        if ($task->image !== null) {
            if (Storage::exists($this->mainPath . $task->image)) {
                Storage::delete($this->mainPath . $task->image);    
            }
        }

        $task -> image = null;
        if($task->save()) {
            return response()->json([
                'status' => true, 
                'message' => "Image deleted successfully"
            ]);   
        }
        else {   
            return response()->json([
                'status' => false, 
                'message' => "Image not deleted successfully"
            ]); 
        }
    }

    public function rename(Request $request) {
        $task = Task::find($request->task_id);
        if ($task == null) {
            return response()->json([
                'status' => false, 
                'message' => "Task id not found"
            ]);
        } 
        if ($task->image !== null && Storage::exists($this->mainPath . $task->image)) {
            $extension  = pathinfo($task->image, PATHINFO_EXTENSION);
            $createnewFileName = '/'. $request->task_id . '/' . $request->new_name . '.' . $extension;
            Storage::move($this->mainPath . $task->image, $this->mainPath . $createnewFileName);
            $task -> image = $createnewFileName;
            $task->save();
            return response()->json([
                'status' => true, 
                'message' => "Image rename successfully"
            ]);
        } else {
            return response()->json([
                'status' => false, 
                'message' => "Image not found"
            ]);
        }
    }

    public function preview(Request $request) {
        $task = Task::find($request->task_id);
        if ($task == null) {
            return response()->json([
                'status' => false, 
                'message' => "Task id not found"
            ]);
        } 
        if( $task->image !== null && Storage::exists($this->mainPath . $task->image)) {
            return response()->json([
                'status' => true, 
                'url' => Storage::url($this->mainPath . $task->image)
            ]);   
        } else {
            return response()->json([
                'status' => false, 
                'message' => "Image not found"
            ]);
        }
    }

    public function download(Request $request) {
        $task = Task::find($request->task_id);
        if ($task == null) {
            return response()->json([
                'status' => false, 
                'message' => "Task id not found"
            ]);
        } 
        if( $task->image !== null && Storage::exists($this->mainPath . $task->image)) {
            return Storage::download($this->mainPath . $task->image);    
        } else {
            return response()->json([
                'status' => false, 
                'message' => "Image not found"
            ]);
        }
        
    }
}
