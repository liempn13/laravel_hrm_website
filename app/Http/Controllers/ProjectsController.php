<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectsResource as ProjectsResource;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Projects::all();
        return response()->json($projects);
        // return ProjectsResource::collection($projects);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [

        ]);
        if ($validator->fails()) {
            $arr = [
                "success"=> false,
                "message"=> "Data check error",
                "data"=> $validator->errors(),
            ];
            return response()->json($arr,200);
        }
        $projects = Projects::create($input);
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new ProjectsResource($projects)
        ];
        return response()->json( $arr,201);
    }

    public function edit($id){

    }

    public function update(Request $request, Projects $projects){
        $input = $request->all();
        $validator = Validator::make($input, [

        ]);
        if ($validator->fails()) {
            $arr = [
                "success"=> false,
                "message"=> "Data check error",
                "data"=> $validator->errors(),
            ];
            return response()->json($arr,200);
        }
        $projects->project_id = $input['project_id'];
        $projects->project_name = $input['project_name'];
        $projects->department_id = $input['department_id'];
        $projects->enterprise_id = $input['enterprise_id'];
        $projects->project_status = $input['project_status'];
        $projects->save();
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new ProjectsResource($projects)
        ];
        return response()->json( $arr,200);
    }

    public function delete(Projects $projects){
        $projects -> delete();
        $arr = [
            "status"=> true,
            "message"=> "Delete success",
            "data"=> []
        ];
        return response()->json( $arr,200);
    }

}
