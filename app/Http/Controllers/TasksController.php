<?php

namespace App\Http\Controllers;

use App\Http\Resources\TasksResource;
use Illuminate\Routing\Controller;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function createNewTask(Request $request)
    {
        $input = $request->validate([
            'task_id' => "",
            'task_name' => "required|string",
            'task_content' => "required|string",
            'status' => "required|boolean",
        ]);
        $tasks = Tasks::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new TasksResource($tasks)
        ];
        return response()->json($arr, 201);
    }


    public function showTaskDetail(string $task_id)
    {
        return Tasks::findOrFail($task_id);
    }


    public function update(Request $request) {
        $task = Tasks::where($request->task_id);
        
    }

    public function destroy(Tasks $tasks)
    {
        $tasks->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}