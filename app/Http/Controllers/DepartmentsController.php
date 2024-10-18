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
    // public function index()
    // {
    //     $department = Departments::all();
    //     return response()->json($department);
    // }
    public function show(string $id)
    {
        return (
             Departments::findOrFail($id)
        );
    }
    public function showDepartmentsByEnterpriseID(string $enterprise_id)
    {
        return (
             Departments::where('enterprise_id', $enterprise_id)->get()
        );
    }
    public function createNewDepartment(Request $request)
    {
        $fields = $request->validate([
            "department_name" => "required|string",
            "enterprise_id" => 'required|integer',
            "manager_id" => "integer",
            "department_status" => "integer"
        ]);
        $newDepartment = Departments::create([
            'department_name'=>($fields['department_name']),
            'enterprise_id'=>($fields['enterprise_id']),
            'manager_id'=> $fields['manager_id'],
            'department_status'=> $fields['department_status']
        ]);
        return response()->json([], 201);
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
