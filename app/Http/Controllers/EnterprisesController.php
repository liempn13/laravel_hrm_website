<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class EnterprisesController extends Controller
{
    public function index()
    {
        $enterprise = Enterprises::all();
        return response()->json($enterprise);
    }
    public function show(string $id)
    {
        return (
             Enterprises::findOrFail($id)
        );
    }
    public function createNewEnterprise(Request $request)
    {
        $fields = $request->validate([
            "license_num" => "required|string",
            "name"=>"required|string",
            "phone"=>"nullable|string",
            "email"=>"nullable|string",
            "assign_date"=>"date",

        ]);
        $newAccount = Enterprises::create([
            'license_num'=>($fields['license_num']),
            'name'=>($fields['name']),
            'phone'=>($fields['phone']),
            'email'=>($fields['email']),
            'assign_date'=>($fields['assign_date']),
        ]);
        $token = $newAccount->createToken('')->plainTextToken; // chưa chạy
        return response()->json(['token'=> $token], 201);
    }

    public function edit($id) {}

    public function update(Request $request, Enterprises $enterprises)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "" => "",
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                "data" => $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $enterprises->name = $input['name'];
        $enterprises->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new EnterprisesResource($enterprises)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Enterprises $enterprises)
    {
        $enterprises->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
