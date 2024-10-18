<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProfilesResource as ProfilesResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilesController extends Controller
{
    // public function index()
    // {
    //     $profile = Profiles::all();
    //     return response()->json($profile);
    // }

    public function getUserProfile(string $id)
    {
        return (
             Profiles::findOrFail($id)

        );
    }

    public function showProfilesByEnterpriseID(int $enterprise_id)
    {
        return
            //  Profiles::where('enterprise_id', $enterprise_id)->  get()
            Enterprises::select('name')->whereColumn('enterprise_id','profiles.id')

        ;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "profile_id",
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
            "diploma_id",
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

    public function edit($id) {}

    public function update(Request $request, Profiles $profiles)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "profile_id",
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
            "diploma_id",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $profiles->profile_id=$input['profile_id'];
        $profiles->profile_name = $input['profile_name'];
        $profiles->phone = $input['phone'];
        $profiles->email = $input['email'];
        $profiles->gender = $input['gender'];
        $profiles->birthday = $input['birthday'];
        $profiles->salary_id = $input['salary_id'];
        $profiles->enterprise_id = $input['enterprise_id'];
        $profiles->department_id = $input['department_id'];
        $profiles->position_id = $input['position_id'];
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
