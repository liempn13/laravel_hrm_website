<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Positions;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PositionsResource as PositionsResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class PositionsController extends Controller
{
    // public function index()
    // {
    //     $position = Positions::all();
    //     return response()->json($position);
    // }

    public function showPositionsByEnterpriseID(string $enterprise_id)
    {
        return (
            Positions::where('enterprise_id',$enterprise_id)->get()
        );
    }
    public function show(string $id)
    {
        return (
            Positions::findOrFail($id)
        );
    }
    public function createNewPosition(Request $request)
    {
        $fields = $request->validate([
            "position_id"=>"required|string",
            "position_name" => "required|string",
            "enterprise_id" => 'required|integer',
        ]);
        $newAccount = Positions::create([
            'position_id'=>($fields['position_id']),
            'position_name'=>($fields['position_name']),
            'enterprise_id'=>($fields['enterprise_id'])
        ]);
        return response()->json([], 201);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, Positions $positions)
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
        $positions->name = $input['name'];
        $positions->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new PositionsResource($positions)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Positions $positions)
    {
        $positions->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
