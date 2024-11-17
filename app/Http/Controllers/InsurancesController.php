<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Insurances;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsurancesController extends Controller
{

    public function index()
    {
        $insurances = Insurances::all();
        return response()->json($insurances);
    }
    public function getInsurancesOfProfile(string $profile_id)
    {
        return Insurances::where('profile_id', $profile_id)->get();
    }
    public function store(Request $request)
    {
        $fields = $request->validate([
            "profile_id" => "required|string",
            "start_time" => "required|date",
            "end_time" => "required|date",
            "insurance_type_name" => "required|string",
            "insurance_id" => "string|required",
            "insurance_percent" => "required|numeric",
        ]);
        $newInsurance = Insurances::create([
            'insurance_type_name' => ($fields['insurance_type_name']),
            'insurance_percent' => ($fields['insurance_percent']),
            'start_time' => ($fields['start_time']),
            'insurance_id' => ($fields['insurance_id']),
            'end_time' => ($fields['end_time']),
            'profile_id' => ($fields['profile_id']),

        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $insurances = Insurances::find($request->insurance_id);
        $input = $request->validate([
            "profile_id" => "required|string",
            "start_time" => "required|date",
            "end_time" => "required|date",
            "insurance_type_name" => "required|string",
            "insurance_id" => "string|required",
            "insurance_percent" => "required|numeric",
        ]);
        $insurances->profile_id = $input['profile_id'];
        $insurances->start_time = $input['start_time'];
        $insurances->end_time = $input['end_time'];
        $insurances->insurance_id = $input['insurance_id'];
        $insurances->insurance_percent = $input['insurance_percent'];
        $insurances->insurance_type_name = $input['insurance_type_name'];
        $insurances->save();
        return response()->json([], 200);
    }

    public function delete($id)
    {
        $insurances = Insurances::find($id);
    
        if (!$insurances) {
            return response()->json([
                "status" => false,
                "message" => "diplomas not found",
                "data" => []
            ], 404);
        }
    
        $insurances->delete();
        return response()->json([
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ], 200);
    }
}
