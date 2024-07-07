<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decisions;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DecisionsResource as DecisionsResource;

class DecisionsController extends Controller
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
        $decisions = Decisions::create($input);
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new DecisionsResource($decisions)
        ];
        return response()->json( $arr,201);
    }

    public function edit($id){

    }

    public function update(Request $request, Decisions $decisions){
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
        $decisions->name = $input['name'];
        $decisions->save();
        $arr = [
            "status"=> true,
            "message"=> "Save successful",
            "data"=> new DecisionsResource($decisions)
        ];
        return response()->json( $arr,200);
    }

    public function delete(Decisions $decisions){
        $decisions -> delete();
        $arr = [
            "status"=> true,
            "message"=> "Delete success",
            "data"=> []
        ];
        return response()->json( $arr,200);
    }

}
