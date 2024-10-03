<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            "username" => "required",
            "password" => "required|confirmed",
            "enterprise_id" => "",
            "permission" => "required",
            "account_status" => "required"
        ]);
        $newaccounts = Accounts::create([

            'password' => bcrypt($fields['password']),
            'permission'=> $fields['permission'],
            'account_status'=> $fields['account_status']
        ]);

        $token = $newaccounts->createToken('')->plainTextToken;
        $response = [
            "data" => $newaccounts,
            'token'=> $token
        ];
        return response()->json($response, 201);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = Accounts::where('username', $request['username'])->firstOrFail();
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
}
