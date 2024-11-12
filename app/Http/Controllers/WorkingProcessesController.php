<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingProcesses;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\WorkingProcessesResource as WorkingProcessesResource;

class WorkingProcessesController extends Controller
{
    public function showWorkingProcessesOfProfileID(string $profile_id)
    {
        return WorkingProcesses::where('profile_id', $profile_id)->get();
    }
    public function addNewWWorkingProcesses(Request $request)
    {
        $input = $request->validate([
            'workingprocesses_id' => "string",
            'profile_id' => "required|string",
            'workingprocesses_content' => "required|string",
            'start_time' => "required|date",
            'end_time' => "nullable|date",
            'workingprocesses_status' => "required|boolean",
            'workplace_name' => "required|string",
        ]);
        $workingProcesses = WorkingProcesses::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new WorkingProcessesResource($workingProcesses)
        ];
        return response()->json($arr, 201);
    }

    public function update(Request $request)
    {
        $workingProcesses = WorkingProcesses::find($request->workingprocesses_id);
        $input = $request->validate([
            'workingprocesses_id' => "string",
            'profile_id' => "string|required",
            'workingprocesses_content' => "string|required",
            'start_time' => "date|required",
            'end_time' => "nullable|date",
            'workingprocesses_status' => "boolean",
            'workplace_name' => "string",
        ]);
        $workingProcesses->workingprocesses_content = $input['workingprocesses_content'];
        $workingProcesses->workplace_name = $input['workplace_name'];
        $workingProcesses->workingprocesses_status = $input['workingprocesses_status'];
        $workingProcesses->start_time = $input['start_time'];
        $workingProcesses->end_time = $input['end_time'];
        $workingProcesses->profile_id = $input['profile_id'];
        $workingProcesses->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
        ];
        return response()->json($arr, 200);
    }

    public function delete(WorkingProcesses $workingProcesses)
    {
        $workingProcesses->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}
