<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salaries;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SalariesResource as SalariesResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class SalariesController extends Controller
{
    // public function index()
    // {
    //     $salaries = Salaries::all();
    //     return response()->json($salaries);
    // }
    public function show(string $id)
    {
        return (
            Salaries::findOrFail($id)
        );
    }
    public function getSalariesByEnterpriseID(string $enterprise_id)//
    {
        return (
            Salaries::where('enterprise_id',$enterprise_id)->get()//
        );
    }

    public function createNewSalary(Request $request)
    {
        $fields = $request->validate([
            "salary_name" => "required|string",
            "salary" => "required|double",
            "enterprise_id" => 'required|integer',
            "allowances" => "nullable|double",
            "salary_status" => "integer"
        ]);
        $newSalary = Salaries::create([
            'salary_name'=>($fields['salary_name']),
            'salary' => bcrypt($fields['salary']),
            'enterprise_id'=>($fields['enterprise_id']),
            'allowances'=> $fields['allowances'],
            'salary_status'=> $fields['salary_status']
        ]);
        return response()->json([], 201);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, Salaries $salaries)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'salary_id' => "",
            'salary_name' => "",
            'salary' => "",
            'allowances' => "",
            'salary_status' => "",
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
        $salaries->name = $input['name'];
        $salaries->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new SalariesResource($salaries)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Salaries $salaries)
    {
        $salaries->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
