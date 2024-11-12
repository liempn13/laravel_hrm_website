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
        $enterprises = Enterprises::first();
        return response()->json($enterprises);
    }
    public function update(Request $request, Enterprises $enterprises)
    {
        $this->authorize('isBoardOfDirectors');
        $input = $request->validate([
            "license_num" => "required|string",
            "name" => "required|string",
            "phone" => "required|string",
            "email" => "required|string",
            "assign_date" => "required|date",
        ]);
        $enterprises->name = $input['name'];
        $enterprises->phone = $input['phone'];
        $enterprises->email = $input['email'];
        $enterprises->license_num = $input['license_num'];
        $enterprises->assign_date = $input['assign_date'];
        $enterprises->save();
        $arr = [
            "status" => true,
            "message" => "Save successful",
            "data" => new EnterprisesResource($enterprises)
        ];
        return response()->json($arr, 200);
    }
}
