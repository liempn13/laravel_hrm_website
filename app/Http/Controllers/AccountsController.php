<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AccountsResource as AccountsResource;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Accounts::all();
        return response()->json($accounts);
        // return AccountsResource::collection($accounts);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "account_id" => "",
            "username" => "required",
            "password" => "required",
            "enterprise_id" => "",
            "permission" => "required",
            "account_status" => "required"
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $accounts = Accounts::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new AccountsResource($accounts)
        ];
        return response()->json($arr, 201);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, Accounts $accounts)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "username" => "",
            "password" => "",
            "enterprise_id" => "",
            "permission" => "",
            "account_status" => ""
        ]);
        if ($validator->fails()) {
            $arr = [
                "success" => false,
                "message" => "Data check error",
                $validator->errors(),
            ];
            return response()->json($arr, 200);
        }
        $accounts->username = $input['username'];
        $accounts->password = $input['password'];
        $accounts->enterprise_id = $input['enterprise_id'];
        $accounts->permission = $input['permission'];
        $accounts->account_status = $input['account_status'];
        $accounts->update();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new AccountsResource($accounts)
        ];
        return response()->json($arr, 200);
    }

    public function delete(Accounts $accounts)
    {
        $accounts->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
