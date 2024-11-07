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
        $shifts = Shifts::create($input);
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new ShiftsResource($shifts)
        ];
        return response()->json($arr, 201);
    }

    public function show(string $shift_id)
    {
        return Shifts::where('shift_id', $shift_id)->get();
    }

    public function update(Request $request) {
        
    }

    public function delete(Shifts $shifts) {
        $shifts->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}
