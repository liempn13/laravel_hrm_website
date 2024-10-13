<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decisions;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DecisionsResource as DecisionsResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class DecisionsController extends Controller
{
    public function show(string $id)
    {
        return (
             Decisions::findOrFail($id)
        );
    }
    public function showByEnterpriseID(string $id)
    {
        return (
         Decisions::where('enterprise_id',$id)->get()
        );
    }
    public function createNewdecision(Request $request)
    {
        $fields = $request->validate([
            "decision_name" => "required|string",
            "enterprise_id" => 'required|integer',
            "decision_status" => "integer"
        ]);
        $newDecision = Decisions::create([
            'decision_name'=>($fields['decision_name']),
            'enterprise_id'=>($fields['enterprise_id']),
            'decision_status'=> $fields['decision_status']
        ]);
        return response()->json([], 201);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, Decisions $decisions)
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
        $decisions->name = $input['name'];
        $decisions->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new DecisionsResource($decisions)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Decisions $decisions)
    {
        $decisions->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
