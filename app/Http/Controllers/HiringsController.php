<?php

namespace App\Http\Controllers;

use App\Http\Resources\HiringsResource;
use App\Models\Hirings;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HiringsController extends Controller
{
    public function index()
    {
        $hirings = Hirings::all();
        return response()->json($hirings);
    }
    public function show(string $profile_id)
    {
        return Hirings::findOrFail($profile_id);
    }
    public function createNewHiringProfile(Request $request)
    {
        $fields = $request->validate([
            "educational_level" => "required|string",
            "profile_name" => "required|string",
            "phone" => "required|string",
            "email" => "nullable|string",
            "birthday" => "required|date",
            "gender" => "boolean|required",
            "apply_for" => "required|string",
            "current_address" => "required|string",
            "nation" => "required|string",
            "place_of_birth" => "required|date",
            "hiring_status" => "required|integer",
            "hiring_profile_image" => "required|string",
            "work_experience" => "required|string",
        ]);
        $newAccount = Hirings::create([
            'name' => ($fields['name']),
            'gender' => ($fields['gender']),
            'phone' => ($fields['phone']),
            'email' => ($fields['email']),
            'birthday' => ($fields['birthday']),
            'apply_for' => ($fields['apply_for']),
            'place_of_birth' => ($fields['place_of_birth']),
            'educational_level' => ($fields['educational_level']),
            'nation' => ($fields['nation']),
            'current_address' => ($fields['current_address']),
            'hiring_status' => ($fields['hiring_status']),
            "hiring_profile_image" => ($fields["hiring_profile_image"]),
            "work_experience" => ($fields["work_experience"]),
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request, Hirings $hiring)
    {
        $input = $request->validate([
            "educational_level" => "required|string",
            "profile_name" => "required|string",
            "phone" => "required|string",
            "email" => "nullable|string",
            "birthday" => "required|date",
            "gender" => "boolean|required",
            "apply_for" => "required|string",
            "current_address" => "required|string",
            "nation" => "required|string",
            "place_of_birth" => "required|string",
            "hiring_status" => "required|integer",
            "hiring_profile_image" => "required|string",
            "work_experience" => "required|string",
        ]);

        $hiring->profile_name = $input['profile_name'];
        $hiring->gender = $input['gender'];
        $hiring->phone = $input['phone'];
        $hiring->email = $input['email'];
        $hiring->birthday = $input['birthday'];
        $hiring->apply_for = $input['apply_for'];
        $hiring->nation = $input['nation'];
        $hiring->current_address = $input['current_address'];
        $hiring->profile_name = $input['profile_name'];
        $hiring->place_of_birth = $input['place_of_birth'];
        $hiring->hiring_profile_image = $input['hiring_profile_image'];
        $hiring->work_experience = $input['work_experience'];
        $hiring->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new HiringsResource($hiring)
        ];
        return response()->json($arr, 200);
    }
}