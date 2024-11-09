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
    public function show(string $ID)
    {
        return (
            Absents::findOrFail($ID)
        );
    }
    public function showAbsentOfProfile(string $profile_id)
    {
        return DB::table('absents')
            ->join('', '')
            ->select(
                'profiles.profile_name',
                'absents.*'
            )
            ->get();
    }
    public function createNewAbsentRequest(Request $request)
    {
        $fields = $request->validate([
            'from' => 'required|date_format:d-m-Y', // Xác thực ngày từ
            'to' => 'nullable|date_format:d-m-Y',   // Xác thực ngày đến, có thể là null
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
            "from" => "required|datetime",
            "to" => 'nullable|datetime',
            "reason" => "nullable|string",
            "profile_id" => "required|string",
            "days_off" => "nullable|numeric",
            "status" => "required|integer",
        ]);
        $absents->from = $input['from'];
        $absents->to = $input['to'];
        $absents->reason = $input['reason'];
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
}