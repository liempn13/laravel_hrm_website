<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProfilesResource as ProfilesResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class ProfilesController extends Controller
{
    public function index()
    {
        $profiles = Profiles::all();
        return response()->json($profiles);
    }

    public function getUserProfile(string $id)
    {
        return (
            Profiles::findOrFail($id)
        );
    }

    public function showProfilesByDepartmentID(int $department_id)
    {
        return
            Profiles::where('department_id', $department_id)->get();
    }

    public function emailLogin(Request $request)
    {
        $fields = $request->validate([
            "email" => "required|string",
            "password" => "required|string",
        ]);

        //Check email
        $user = Profiles::where('email', $fields['email'])->first();

        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        response()->json([]);
    }
    public function phoneNumberLogin(Request $request)
    {
        $fields = $request->validate([
            "phone" => "required|string",
            "password" => "required|string",
        ]);
        //Check phone
        $user = Profiles::where('phone', $fields['phone'])->first();
        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        response()->json([]);
    }

    public function registerNewProfile(Request $request)
    {
        $fields = $request->validate([
            "profile_id" => "required|string",
            "profile_name" => "required|string",
            "profile_status" => "required|integer",
            "identify_num" => "required|string",
            "id_license_day" => "required|date",
            "gender" => "required|boolean",
            "phone" => "required|string|unique:profiles,phone",
            "email" => "nullable|string|unique:profiles,email",
            "birthday" => "required|date",
            "password" => "required|string",
            "marriage" => "required|boolean",
            "temporary_address" => "required|string",
            "current_address" => "required|string",
            "nation" => "required|string",
            "permission" => "required|integer",
            "place_of_birth" => "required|string",
            //foriegn key
            "department_id" => "nullable|string",
            "position_id" => "nullable|string",
            "salary_id" => "nullable|string",
            "labor_contract_id" => "nullable|string",
        ]);
        $newProfile = Profiles::create([
            'profile_name' => $fields['profile_name'],
            'profile_image' => $fields['profile_image'],
            'birthday' => $fields['birthday'],
            'place_of_birth' => $fields['place_of_birth'],
            'phone' => $fields['phone'],
            'email' => $fields['email'],
            'gender' => $fields['gender'],
            'nation' => $fields['nation'],
            'marriage' => $fields['marriage'],
            'temporary_address' => $fields['temporary_address'],
            'current_address' => $fields['current_address'],
            'permission' => $fields['permission'],
            'identify_num' => $fields['identify_num'],
            'id_license_day' => $fields['id_license_day'],
            'password' => bcrypt($fields['password']),
            //fk
            "department_id" => $fields["department_id"],
            "position_id" => $fields["position_id"],
            "salary_id" => $fields["salary_id"],
            "labor_contract_id" => $fields["labor_contract_id"],
        ]);

        $token = $newProfile->createToken('myapptoken')->plainTextToken;
        response()->json(['token' => $token], 201);
    }

    public function logout(Request $request)
    {
        if (Auth::check() && Auth::user()->is_active != 1) {
            Auth::logout();
        };
        return [];
    }

    public function update(Request $request, Profiles $profiles)
    {
        $input = $request->validate([
            "profile_id" => "string",
            "profile_name" => "string",
            "profile_status" => "integer",
            "identify_num" => "string",
            "id_license_day" => "date",
            "gender" => "boolean",
            "phone" => "required|string",
            "email" => "nullable|string",
            "birthday" => "required|date",
            "password" => "string",
            "marriage" => "required|boolean",
            "temporary_address" => "string",
            "current_address" => "string",
            "nation" => "required|string",
            "permission" => "integer",
            "place_of_birth" => "string",
            //foriegn key
            "department_id" => "nullable|string",
            "position_id" => "nullable|string",
            "salary_id" => "nullable|string",
            "labor_contract_id" => "nullable|string",

        ]);
        $profiles->profile_id = $input['profile_id'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->phone = $input['phone'];
        $profiles->email = $input['email'];
        $profiles->gender = $input['gender'];
        $profiles->birthday = $input['birthday'];
        $profiles->place_of_birth = $input['place_of_birth'];
        $profiles->nation = $input['nation'];
        $profiles->temporary_address = $input['temporary_address'];
        $profiles->current_address = $input['current_address'];
        $profiles->marriage = $input['marriage'];
        $profiles->profile_image = $input['profile_image'];
        $profiles->profile_status = $input['profile_status'];
        $profiles->identify_num = $input['identify_num'];
        $profiles->id_license_day = $input['id_license_day'];
        $profiles->password = $input['password'];
        $profiles->permission = $input['permission'];
        //fk
        $profiles->salary_id = $input['salary_id'];
        $profiles->department_id = $input['department_id'];
        $profiles->position_id = $input['position_id'];
        $profiles->labor_contract_id = $input['labor_contract_id'];
        $profiles->save();
        return response()->json([], 200);
    }
}