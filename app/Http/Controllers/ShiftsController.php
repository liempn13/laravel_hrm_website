<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShiftsResource;
use Illuminate\Routing\Controller;
use App\Models\Shifts;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function index()
    {
        $shifts = Shifts::all();
        return response()->json($shifts);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'shift_id' => "required|string",
            'shift_name' => "required|string",
            'start_time' => "required|time",
            'end_time' => "required|time",
        ]);
        Shifts::create($input);
        return response()->json([], 201);
    }

    public function show(string $shift_id)
    {
        return Shifts::where('shift_id', $shift_id)->get();
    }

    public function update(Request $request)
    {
        $checkOut = Shifts::find($request->timekeeping_id);
        $input = $request->validate([
            'shift_id' => "required|string",
            'shift_name' => "required|string",
            'start_time' => "required|time",
            'end_time' => "required|time",
        ]);
        $checkOut->shift_id = $input['shift_id'];
        $checkOut->shift_name = $input['shift_name'];
        $checkOut->start_time = $input['start_time'];
        $checkOut->end_time = $input['end_time'];
        $checkOut->save();
        return response()->json([], 200);
    }

    public function delete(Shifts $shifts)
    {
        $shifts->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}
