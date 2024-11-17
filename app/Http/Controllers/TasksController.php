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
            'task_name' => "required|string",
            'task_content' => "required|string",
            'task_status' => "required|integer",
        ]);
        $tasks = Tasks::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new TasksResource($tasks)
        ];
        return response()->json($arr, 201);
    }


    public function showTaskDetail(int $task_id)
    {
        return Tasks::findOrFail($task_id);
    }
    public function index()
    {
        $tasks = Tasks::all();
        return response()->json($tasks);
    }


    public function update(Request $request)
    {
        $task = Tasks::find($request->ID);
        $input = $request->validate([
            'task_id' => "required|integer",
            'task_name' => "required|string",
            'task_content' => "required|string",
            'task_status' => "required|integer",
        ]);
        $task->task_id = $input['task_id'];
        $task->task_name = $input['task_name'];
        $task->task_content = $input['task_content'];
        $task->task_status = $input['task_status'];
        $task->save();
        return response()->json([], 200);
    }
    public function delete(int $task_id)
    {
        $task = Tasks::find($task_id);
        $task->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}