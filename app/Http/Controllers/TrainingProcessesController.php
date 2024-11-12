<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainingProcessesResource;
use Illuminate\Routing\Controller;
use App\Models\TrainingProcesses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainingProcessesController extends Controller
{
    public function showTrainingProcessesOfProfile(string $profile_id)
    {
        return TrainingProcesses::where('profile_id', $profile_id)->get();
    }

    public function addNewTrainingProccess(Request $request)
    {
        $input = $request->validate([
            'trainingprocesses_id' => "string",
            'profile_id' => "required|string",
            'trainingprocesses_name' => "required|string",
            'trainingprocesses_content' => "required|string",
            'start_time' => "required|date",
            'end_time' => "nullable|date",
            'trainingprocesses_status' => "boolean|required",
        ]);
        $trainingProcesses = TrainingProcesses::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new TrainingProcessesResource($trainingProcesses)
        ];
        return response()->json($arr, 201);
    }

    public function update(Request $request)
    {
        $trainingprocesses = TrainingProcesses::find($request->ID);
        $input = $request->validate([
            'trainingprocesses_id' => "string",
            'profile_id' => "required|string",
            'trainingprocesses_name' => "required|string",
            'trainingprocesses_content' => "required|string",
            'start_time' => "required|date",
            'end_time' => "nullable|date",
            'trainingprocesses_status' => "integer",
        ]);
        $trainingprocesses->start_time = $input['start_time'];
        $trainingprocesses->end_time = $input['end_time'];
        $trainingprocesses->reason = $input['reason'];
        $trainingprocesses->profile_id = $input['profile_id'];
        $trainingprocesses->trainingprocesses_status = $input['trainingprocesses_status'];
        $trainingprocesses->trainingprocesses_name = $input['trainingprocesses_name'];
        $trainingprocesses->trainingprocesses_content = $input['trainingprocesses_content'];
        $trainingprocesses->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new TrainingProcessesResource($trainingprocesses)
        ];
        return response()->json($arr, 200);
    }
    public function delete(TrainingProcesses $trainingProcesses)
    {
        $trainingProcesses->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}
