<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class ProfilesController extends Controller
{
    public function index()
    {

        $profiles = Profiles::all();
        return response()->json($profiles);
    }

    public function show(string $profile_id)
    {
        return Profiles::findOrFail($profile_id);
    }

    public function getUserProfileInfo(string $profile_id)
    {
        return DB::table('profiles')
            ->join('departments', 'department_id', '=', 'departments.department_id')
            ->join('positions', 'position_id', '=', 'positions.position_id')
            ->join('salaries', 'salary_id', '=', 'salaries.salary_id')
            ->join('labor_contract', 'labor_contract_id', '=', 'labor_contract.labor_contract_id')
            ->select(
                "profiles.profile_id",
                "profiles.profile_name",
                "profiles.identify_num",
                "profiles.id_license_day",
                "profiles.gender",
                "profiles.profiles.phone",
                "profiles.email",
                "profiles.birthday",
                "profiles.marriage",
                "profiles.temporary_address",
                "profiles.current_address",
                "profiles.nation",
                "profiles.place_of_birth",
                'departments.*',
                'positions.*'
            )->where('profiles.profile_id', $profile_id)
            ->get();
    }
    public function getDepartmentMembers(string $department_id)
    {
        $this->authorize('view_department_members');
        return
            DB::table('departments')
            ->join('profiles', 'departments.department_id', '=', 'profiles.department_id')
            ->join('positions', 'profiles.position_id', '=', 'positions.position_id')
            ->select(
                'profiles.profile_name',
                'positions.position_name'
            )
            ->where([['departments.department_id', '=', $department_id]],)
            ->get()
        ;
    }

    public function emailLogin(Request $request)
    {
        $fields = $request->validate([
            "email" => "required|string",
            "password" => "required|string",
        ]);

        //Check email
        $user = Profiles::where(["email" => $fields['email'], "profile_status" => 1])->first();

        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        return response()->json(
            $user,
            200
        );
    }
    public function phoneNumberLogin(Request $request)
    {
        $fields = $request->validate([
            "phone" => "required|string",
            "password" => "required|string",
        ]);

        //Check phone
        $user = Profiles::where(["phone" => $fields['phone'], "profile_status" => 1])->first();
        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        return response()->json(
            $user,
            200
        );
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
            "place_of_birth" => "required|string",
            "role_id" => "required|integer",
            "profile_image" => "required|string",
            //foriegn key
            "department_id" => "nullable|string",
            "position_id" => "nullable|string",
            "salary_id" => "nullable|string",
            "labor_contract_id" => "nullable|string",
        ]);

        $newProfile = Profiles::create([
            'profile_id' => $fields['profile_id'],
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
            'identify_num' => $fields['identify_num'],
            'id_license_day' => $fields['id_license_day'],
            'password' => bcrypt($fields['password']),
            'role_id' => $fields['role_id'],
            'profile_status' => $fields['profile_status'],
            //fk
            "department_id" => $fields["department_id"],
            "position_id" => $fields["position_id"],
            "salary_id" => $fields["salary_id"],
            "labor_contract_id" => $fields["labor_contract_id"],
        ]);

        $token = $newProfile->createToken('API TOKEN')->plainTextToken;
        return response()->json([
            'profile' => $newProfile,
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            "message" => "Logged out"
        ]);
    }
    public function update(Request $request)
    {
        $profiles = Profiles::find($request->profile_id);
        // Kiểm tra xem hồ sơ có tồn tại không
        if (!$profiles) {
            return response()->json(['message' => 'Profile not found'], 404);
        }
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
            "place_of_birth" => "string",
            "role_id" => "integer",
            "profile_image" => "nullable|string",
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
        $profiles->role_id = $input['role_id'];
        if (isset($input['profile_image'])) {
            $profiles->profile_image = $input['profile_image'];
        }
        // Chỉ cập nhật mật khẩu nếu nó có giá trị
        if (isset($input['password'])) {
            $profiles->password = bcrypt($input['password']); // Mã hóa mật khẩu trước khi lưu
        }
        //fk
        $profiles->salary_id = $input['salary_id'];
        $profiles->department_id = $input['department_id'];
        $profiles->position_id = $input['position_id'];
        $profiles->labor_contract_id = $input['labor_contract_id'];
        $profiles->save();
        return response()->json([], 200);
    }
    public function lockAndUnlock(Request $request)
    {
        $profiles = Profiles::find($request->profile_id);
        // Kiểm tra xem hồ sơ có tồn tại không
        if (!$profiles) {
            return response()->json(['message' => 'Profile not found'], 404);
        }
        $input = $request->validate([
            "profile_status" => "required|integer",
        ]);

        $profiles->profile_status = $input['profile_status'];
        $profiles->save();
        return response()->json([], 200);
    }
}
