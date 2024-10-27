<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function index()
    {
        $department = Departments::all();
        return response()->json($department);
    }
    public function show(string $profile_id)
    {
        return Departments::findOrFail($profile_id);
    }
    
    public function createNewDepartment(Request $request)
    {
        $this->authorize('isBoardOfDirectors');
        $fields = $request->validate([
            "department_id" => "required|string|unique:departments,department_id",
            "department_name" => "required|string|unique:departments,department_name",
        ]);
        $newDepartment = Departments::create([
            'department_id' => ($fields['department_id']),
            'department_name' => ($fields['department_name']),
        ]);
        return response()->json([], 201);
    }


    public function update(Request $request)
    {
        $department = Departments::find($request->department_id);
        $input = $request->validate([
            "department_id" => "required|string",
            "department_name" => "required|string",
        ]);
        $department->department_id = $input['department_id'];
        $department->department_name = $input['department_name'];
        $department->update();
        return response()->json([], 200);
    }

    public function delete(Departments $departments)
    {
        $departments->delete();
        return response()->json([], 200);
    }
}