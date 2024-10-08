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
    public function showRelativesOf(string $profile_id)//
    {
        return (
           Relatives::where('profile_id',$profile_id)->get()//
        );
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, []);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $relatives = Relatives::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new RelativesResource($relatives)
        ];
        return response()->json($arr, 201);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, Relatives $relatives)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "relatives_birthday" => "",
            "relatives_name" => "",
            "relatives_phone" => ""
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
        $relatives->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new RelativesResource($relatives)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Relatives $relatives)
    {
        $relatives->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
