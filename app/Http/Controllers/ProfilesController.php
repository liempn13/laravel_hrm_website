<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProfilesResource as ProfilesResource;

class ProfilesController extends Controller
{
    public function index()
    {
        $profile = Profiles::all();
        return response()->json($profile);
        // return ProfilesResource::collection($profile);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "enterprise_id" => "required",
            "profile_name",
            "profile_status",
            "identify_num",
            "id_expire_day",
            "gender",
            "phone",
            "email",
            "department_id",
            "position_id",
            "birthday",
            "salary_id",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $profiles = Profiles::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new ProfilesResource($profiles)
        ];
        return response()->json($arr, 201);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, Profiles $profiles)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "profile_name" => "required",
            "profile_status" => "required",
            "identify_num" => "required",
            "id_expire_day",
            "gender" => "required",
            "phone" => "required",
            "email",
            "department_id",
            "position_id",
            "birthday",
            "enterprise_id",
            "salary_id",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $profiles->profile_name = $input['profile_name'];
        $profiles->phone = $input['phone'];
        $profiles->email = $input['email'];
        $profiles->gender = $input['gender'];
        $profiles->birthday = $input['birthday'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new ProfilesResource($profiles)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Profiles $profiles)
    {
        $profiles->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}