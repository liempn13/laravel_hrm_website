<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AccountsResource as AccountsResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Enterprises;
use App\Models\Profiles;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class AccountsController extends Controller
{
    public function show(string $id)
    {
        return (
            Accounts::findOrFail($id)
        );
    }

    public function showAdminAccounts() //Superadmin
    {
        return (
            Accounts::where('permission', '<', 2)->get() // chỉ lấy ra những tài khoản admin của doanh nghiệp và tài khoản superadmin
        );
    }

    public function showAccountsByEnterpriseID(int $enterprise_id) //Admin of Enterprise
    {
        return (
            Accounts::where('enterprise_id', $enterprise_id)
            ->where('permission', '>', 0)
            ->get() // lấy ra những tài khoản thuộc doanh nghiệp
        );
    }

    // public function getUserProfileData(int $account_id)
    // {
    //     return (
    //         Profiles::where('profile_id',$account_id)->get()
    //     );
    // }
    public function registerNewAccount(Request $request)
    {
        $fields = $request->validate([
            "email_or_phone" => "required|string",
            "password" => "required|string",
            "enterprise_id" => 'nullable|integer',
            "permission" => "integer",
            "account_status" => "integer"
        ]);
        $newAccount = Accounts::create([
            'email_or_phone'=>($fields['email_or_phone']),
            'password' => bcrypt($fields['password']),
            'enterprise_id'=>($fields['enterprise_id']),
            'permission'=> $fields['permission'],
            'account_status'=> $fields['account_status']
        ]);
        $token = $newAccount->createToken('')->plainTextToken; // chưa chạy
        return response()->json(['token'=> $token], 201);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email_or_phone', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = Accounts::where(['email_or_phone'=> $request['email_or_phone'],'password'=>$request['password']])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Hello '.$user->username,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout()
    {
        // auth()->user()->tokens()->delete();
        return ['message' => 'Logout success and token has been deleted !'];
    }

    public function changePassword($id) {}

    public function update(Request $request, Accounts $accounts)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "email_or_phone" => "",
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
        $accounts->email_or_phone = $input['email_or_phone'];
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
