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
    public function index()
    {
        $salaries = Salaries::all();
        return response()->json($salaries);
    }
    public function show(string $id)
    {
        return ([
            'salaries' => Salaries::findOrFail($id)
        ]);
    }
    public function getSalariesByEnterpriseID(string $enterprise_id)//
    {
        return ([
            'salaries' => Salaries::where('enterprise_id',$enterprise_id)->get()//
        ]);
    }

    public function store(Request $request)
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
        $salaries = Salaries::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new SalariesResource($salaries)
        ];
        return response()->json($arr, 201);
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
