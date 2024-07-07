<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProfilesResource as ProfilesResource;

class ProfilesController extends Controller
{
    public function index(){

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "enterprise_id"=> "required",
            ""=> "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success"=> false,
                "message"=> "Data check error",
                "data"=> $validator->errors(),
            ];
            return response()->json($arr,200);
        }
        $profiles = Profiles::create($input);
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new ProfilesResource($profiles)
        ];
        return response()->json( $arr,201);
    }

    public function edit($id){

    }

    public function update(Request $request, Profiles $profiles){
        $input = $request->all();
        $validator = Validator::make($input, [
            ""=> "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success"=> false,
                "message"=> "Data check error",
                "data"=> $validator->errors(),
            ];
            return response()->json($arr,200);
        }
        $profiles->name = $input['name'];
        $profiles->save();
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new ProfilesResource($profiles)
        ];
        return response()->json( $arr,200);
    }

    public function delete(Profiles $profiles){
        $profiles -> delete();
        $arr = [
            "status"=> true,
            "message"=> "Delete success",
            "data"=> []
        ];
        return response()->json( $arr,200);
    }
}
