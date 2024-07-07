<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingProcesses;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\WorkingProcessesResource as WorkingProcessesResource;

class WorkingProcessesController extends Controller
{
    public function index(){

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            ""=> "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success"=> false,
                "message"=> "Data check error",
                "data"=> $validator->errors(),
            ];
            return response()->json($arr,200);
        }
        $workingProcesses = WorkingProcesses::create($input);
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new WorkingProcessesResource($workingProcesses)
        ];
        return response()->json( $arr,201);
    }

    public function edit($id){

    }

    public function update(Request $request, WorkingProcesses $workingProcesses){
        $input = $request->all();
        $validator = Validator::make($input, [
            ""=> "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success"=> false,
                "message"=> "Data check error",
                "data"=> $validator->errors(),
            ];
            return response()->json($arr,200);
        }
        $workingProcesses->name = $input['name'];
        $workingProcesses->save();
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new WorkingProcessesResource($workingProcesses)
        ];
        return response()->json( $arr,200);
    }

    public function delete(WorkingProcesses $workingProcesses){
        $workingProcesses -> delete();
        $arr = [
            "status"=> true,
            "message"=> "Delete success",
            "data"=> []
        ];
        return response()->json( $arr,200);
    }

}
