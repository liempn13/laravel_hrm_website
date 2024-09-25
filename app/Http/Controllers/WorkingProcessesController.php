<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingProcesses;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\WorkingProcessesResource as WorkingProcessesResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class WorkingProcessesController extends Controller
{
    public function index()
    {
        $workingprocess = WorkingProcesses::all();
        return response()->json($workingprocess);
        // return WorkingProcessesResource::collection($workingprocess);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'workingprocesses_id' => "",
            'profile_id' => "required",
            'workingprocesses_content' => "",
            'workingprocesses_starttime' => "",
            'workingprocesses_endtime' => "",
            'workingprocesses_status' => "",
            'workingprocesses_workplace' => "",
            'enterprise_id' => "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $workingProcesses = WorkingProcesses::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new WorkingProcessesResource($workingProcesses)
        ];
        return response()->json($arr, 201);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, WorkingProcesses $workingProcesses)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'workingprocesses_id' => "",
            'profile_id' => "",
            'workingprocesses_content' => "",
            'workingprocesses_starttime' => "",
            'workingprocesses_endtime' => "",
            'workingprocesses_status' => "",
            'workingprocesses_workplace' => "",
            'enterprise_id' => "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }

        $workingProcesses->workingprocesses_content = $input['workingprocesses_content'];
        $workingProcesses->workingprocesses_workplace = $input['workingprocesses_content'];

        $workingProcesses->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new WorkingProcessesResource($workingProcesses)
        ];
        return response()->json($arr, 200);
    }

    public function delete(WorkingProcesses $workingProcesses)
    {
        $workingProcesses->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}