<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relatives;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RelativesResource as RelativesResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class RelativesController extends Controller
{
    // public function index()
    // {
    //     $relatives = Relatives::all();
    //     return response()->json($relatives);
    // }
    public function show(string $id)
    {
        return (
            Relatives::findOrFail($id)
        );
    }
    public function showRelativesOf(string $profile_id)
    {
        return (
            Relatives::where('profile_id', $profile_id)->get()
        );
    }
    public function addNewRelatives(Request $request)
    {
        $fields = $request->validate([
            "relative_id" => 'required|string',
            "relative_name" => "required|string",
            "relative_phone" => "required|string",
            "relative_birthday" => "required|date",
            "relationship" => "required|string",
            "relative_job" => "required|string",
            "relative_nation" => "required|string",
            "relative_temp_address" => "required|string",
            "relative_current_address" => "required|string",
            "profile_id" => 'required|string',
        ]);
        $newDepartment = Relatives::create(attributes: [
            "relative_id" => $fields["relative_id"],
            'profile_id' => $fields['profile_id'],
            'relative_name' => $fields['relative_name'],
            'relative_phone' => $fields['relative_phone'],
            'relative_birthday' => $fields['relative_birthday'],
            'relative_nation' => $fields['relative_nation'],
            'relative_job' => $fields['relative_job'],
            "relative_current_address" => $fields["relative_current_address"],
            "relative_temp_address" => $fields["relative_temp_address"],
            "relationship" => $fields["relationship"],
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request, Relatives $relatives)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "relative_id" => 'required|string',
            "relative_name" => "required|string",
            "relative_phone" => "required|string",
            "relative_birthday" => "required|date",
            "relationship" => "required|string",
            "relative_job" => "required|string",
            "relative_nation" => "required|string",
            "relative_temp_address" => "required|string",
            "relative_current_address" => "required|string",
            "profile_id" => 'required|string',
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $relatives->relative_name = $input['relative_name'];
        $relatives->relative_phone = $input["relative_phone"];
        $relatives->relative_birthday = $input["relative_birthday"];
        $relatives->relative_job = $input["relative_job"];
        $relatives->relationship = $input["relationship"];
        $relatives->relative_nation = $input["relative_nation"];
        $relatives->relative_temp_address = $input["relative_temp_address"];
        $relatives->relative_current_address = $input["relative_current_address"];
        $relatives->profile_id = $input["profile_id"];
        $relatives->save();

        return response()->json([], 200);
    }

    public function delete(Relatives $relatives)
    {
        $relatives->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}