<?php

namespace App\Http\Controllers;

use App\Models\Absents;
use App\Http\Resources\AbsentsResource as AbsentsResource;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsentsController extends Controller
{
    public function index()
    {
        $absents = Absents::all();
        return response()->json($absents);
    }
    public function show(string $idprofile)
    {
        return (
            Absents::findOrFail($ID)
        );
    }
    public function attendanceStatistics(Request $request)
    {
    $today = now()->format('Y-m-d'); // Lấy ngày hiện tại
    // Lấy danh sách nghỉ phép hợp lệ (trạng thái = 1, ngày hiện tại nằm trong khoảng nghỉ phép)
    $approvedLeaves = DB::table('absents')
        ->join('profiles', 'absents.profile_id', '=', 'profiles.profile_id')
        ->select(
            'profiles.profile_id',
            'profiles.profile_name',
            'absents.from',
            'absents.to',
            'absents.reason',
            'absents.status',
            'absents.days_off'
        )
        ->where('absents.status', '=', 1) // Được duyệt
        ->where(function ($query) use ($today) {
            $query->where('absents.from', '<=', $today)
                  ->where('absents.to', '>=', $today)
                  ->orWhere('absents.from', '=', $today)
                  ->orWhere('absents.to', '=', $today);
        })
        ->get();

    // Lấy danh sách nghỉ không phép (trạng thái khác 1, nhưng ngày hiện tại nằm trong khoảng nghỉ phép)
    $unapprovedLeaves = DB::table('absents')
        ->join('profiles', 'absents.profile_id', '=', 'profiles.profile_id')
        ->select(
            'profiles.profile_id',
            'profiles.profile_name',
            'absents.from',
            'absents.to',
            'absents.reason',
            'absents.status',
            'absents.days_off'
        )
        ->where('absents.status', '!=', 1) // Chưa duyệt
        ->where(function ($query) use ($today) {
            $query->where('absents.from', '<=', $today)
                  ->where('absents.to', '>=', $today)
                  ->orWhere('absents.from', '=', $today)
                  ->orWhere('absents.to', '=', $today);
        })
        ->get();

    return response()->json([
        'status' => true,
        'message' => 'Attendance statistics fetched successfully',
        'data' => [
            'approved_leaves' => $approvedLeaves,
            'unapproved_leaves' => $unapprovedLeaves,
        ]
    ], 200);
}

    public function showAbsentOfProfile(string $profile_id)
{
    return DB::table('absents')
        ->join('profiles', 'absents.profile_id', '=', 'profiles.profile_id')
        ->select(
            'absents.*'
        )
        ->where('absents.profile_id', '=', $profile_id)
        ->get();
}
    public function createNewAbsentRequest(Request $request)
    {
        $fields = $request->validate([
            'from' => 'required|date', // Xác thực ngày từ
            'to' => 'nullable|date',   // Xác thực ngày đến, có thể là null
            "reason" => "nullable|string",
            "profile_id" => "required|string",
            "days_off" => "nullable|numeric",
            "status" => "required|integer",
        ]);
        $newDecision = Absents::create([
            'from' => ($fields['from']),
            'to' => ($fields['to']),
            'reason' => $fields['reason'],
            'status' => $fields['status'],
            'profile_id' => $fields['profile_id'],
            'days_off' => $fields['days_off'],
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $absents = Absents::find($request->ID);
        $input = $request->validate([
            "ID"=> "required|integer",
            "from" => "required|date",
            "to" => 'nullable|date',
            "reason" => "nullable|string",
            "profile_id" => "required|string",
            "days_off" => "nullable|numeric",
            "status" => "required|integer",
        ]);
        $absents->ID = $input['ID'];
        $absents->from = $input['from'];
        $absents->to = $input['to'];
        $absents->reason = $input['reason'];
        $absents->profile_id = $input['profile_id'];
        $absents->days_off = $input['days_off'];
        $absents->status = $input['status'];
        $absents->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new AbsentsResource($absents)
        ];
        return response()->json($arr, 200);
    }
    public function delete(int $ID)
    {
        $absents = Absents::find($ID);
        $absents->delete();
        $arr = [
            "status" => true,
            "message" => "Delete success",
            "data" => []
        ];
        return response()->json($arr, 200);
    }
}
