<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DepartmentsResource as DepartmentsResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class DepartmentsController extends Controller
{
    public function index()
    {
        $department = Departments::all();
        return response()->json($department);
        // return DepartmentsResource::collection($department);
    }
    public function showDepartmentsByEnterpriseID(string $enterprise_id)
    {
        return ([
            'departments' => Departments::where(['','enterprise_id'], [$enterprise_id])->get()
        ]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "department_id" => "required",
            "department_name" => "required",
            "department_status" => "required",
            "enterprise_id" => "required",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $departments = Departments::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new DepartmentsResource($departments)
        ];
        return response()->json($arr, 201);
    }

    public function edit($id) {}

    public function update(Request $request, Departments $departments)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "department_id" => "",
            "department_name" => "",
            "department_status" => "",
            "enterprise_id" => "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $departments->department_id = $input['department_id'];
        $departments->department_name = $input['department_name'];
        $departments->department_status = $input['department_status'];
        $departments->enterprise_id = $input['enterprise_id'];
        $departments->update();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new DepartmentsResource($departments)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Departments $departments)
    {
        $departments->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
