<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DepartmentsResource as DepartmentsResource;

class DepartmentsController extends Controller
{
    public function index(){

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "enterprise_id"=> "required",
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
        $departments = Departments::create($input);
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new DepartmentsResource($departments)
        ];
        return response()->json( $arr,201);
    }

    public function edit($id){

    }

    public function update(Request $request, Departments $departments){
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
        $departments->name = $input['name'];
        $departments->save();
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new DepartmentsResource($departments)
        ];
        return response()->json( $arr,200);
    }

    public function delete(Departments $departments){
        $departments -> delete();
        $arr = [
            "status"=> true,
            "message"=> "Delete success",
            "data"=> []
        ];
        return response()->json( $arr,200);
    }

}
