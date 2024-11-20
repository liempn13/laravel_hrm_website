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
    public function index()
    {
    $hirings = Decisions::join('profiles', 'decisions.profile_id', '=', 'profiles.profile_id')
                      ->select('decisions.*', 'profiles.profile_name')
                      ->get();
    return response()->json($hirings);
    }

    public function createNewdecision(Request $request)
    {
        $fields = $request->validate([
            "decision_id" => "required|string",
            "decision_name" => "required|string",
            "assign_date" => "required|date",
            "decision_status" => "required|integer",
            "decision_image" => "required|string",
            "profile_id" => "nullable|string",
            "decision_content" => "required|string",
        ]);
        $newDecision = Decisions::create([
            'decision_name' => ($fields['decision_name']),
            'decision_status' => $fields['decision_status'],
            'profile_id' => $fields['profile_id'],
            'assign_date' => $fields['assign_date'],
            'decision_id' => $fields['decision_id'],
            'decision_image' => $fields['decision_image'],
            'decision_content' => $fields['decision_content'],

        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $decisions = Decisions::find($request->decision_id);
        $input = $request->validate([
            "decision_id" => "required|string",
            "decision_name" => "required|string",
            "assign_date" => "required|date",
            "decision_status" => "required|integer",
            "decision_image" => "required|string",
            "profile_id" => "nullable|string",
            "decision_content" => "required|string",
        ]);

        $decisions->decision_id = $input['decision_id'];
        $decisions->decision_name = $input['decision_name'];
        $decisions->assign_date = $input['assign_date'];
        $decisions->decision_status = $input['decision_status'];
        $decisions->decision_image = $input['decision_image'];
        $decisions->decision_content = $input['decision_content'];
        $decisions->profile_id = $input['profile_id'];
        $decisions->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new DecisionsResource($decisions)
        ];
        return response()->json($arr, 200);
    }

    public function delete($id)
    {
        $decisions = Decisions::find($id);
    
        if (!$decisions) {
            return response()->json([
                "status" => false,
                "message" => "Shifts not found",
                "data" => []
            ], 404);
        }
    
        $decisions->delete();
        return response()->json([
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ], 200);
    }
}
