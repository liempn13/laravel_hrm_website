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
        $decisions = Decisions::all();
        return response()->json($decisions);
    }
    public function show(string $id)
    {
        return
            Decisions::findOrFail($id);
    }
    public function showByID(string $id)
    {
        return (
            Decisions::where('profile_id', $id)->get()
        );
    }
    public function createNewdecision(Request $request)
    {
        $fields = $request->validate([
            "decision_id" => "required|string",
            "decision_name" => "required|string",
            "assign_date" => "required|date",
            "decision_status" => "required|boolean",
            "decision_image" => "required|string",
            "profile_id" => "nullable|string"
        ]);
        $newDecision = Decisions::create([
            'decision_name' => ($fields['decision_name']),
            'decision_status' => $fields['decision_status'],
            'profile_id' => $fields['profile_id'],
            'assign_date' => $fields['assign_date'],
            'decision_id' => $fields['decision_id'],
            'decision_image' => $fields['decision_image'],

        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $decisions = Decisions::find($request->decision_id);
        $input = $request->validate([
            "decision_id" => "required|string",
            "decision_name" => "required|string",
            "assign_date" => "required|datetime",
            "decision_status" => "required|boolean",
            "decision_image" => "required|string",
            "profile_id" => "nullable|string"
        ]);

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
