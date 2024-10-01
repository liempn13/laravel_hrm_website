<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class EnterprisesController extends Controller
{
    public function index()
    {
        $enterprise = Enterprises::all();
        return response()->json($enterprise);
    }
    public function show(string $id)
    {
        return ([
            'enterprises' => Enterprises::findOrFail($id)
        ]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "enterprise_id" => "required",
            "" => "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $enterprises = Enterprises::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new EnterprisesResource($enterprises)
        ];
        return response()->json($arr, 201);
    }

    public function edit($id) {}

    public function update(Request $request, Enterprises $enterprises)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "" => "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $enterprises->name = $input['name'];
        $enterprises->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new EnterprisesResource($enterprises)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Enterprises $enterprises)
    {
        $enterprises->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
