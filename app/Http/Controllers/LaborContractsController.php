<?php

namespace App\Http\Controllers;

use App\Http\Resources\LaborContractsResource;
use Illuminate\Routing\Controller;
use App\Models\LaborContracts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaborContractsController extends Controller
{

    public function index()
    {
        $laborcontracts = Laborcontracts::all();
        return response()->json($laborcontracts);
    }

    public function show(string $id)
    {
        return LaborContracts::findOrFail($id);
    }

    public function showLaborContractDetails(string $profile_id)
    {
        return DB::table('labor_contract')
            ->join('profiles', 'labor_contract_id', '=', 'profiles.labor_contract_id')
            //  ->join('profiles', 'profiles.profile_id', '=', 'CEO') // Lấy ra thông tin người đại diện công ty (Giám đốc)
            ->join('enterprises', 'enterprise_id', '=', 'enterprises.enterprise_id')
            ->select(
                'labor_contract.*',
                'enterprises.*',
                "profiles.profile_name",
                "profiles.birthday",
                "profiles.identify_num",
                "profiles.id_license_day",
                "profiles.gender",
                "profiles.phone",
                "profiles.current_address",
            )
            ->where([
                ['profiles.profile_id' => $profile_id],
                ['labor_contract.labor_contract_id' => 'profiles.labor_contract_id']
            ])
            ->get();
    }
    public function createNewLaborContract(Request $request)
    {
        $fields = $request->validate([
            "labor_contract_id" => "required|string",
            "end_time" => "required|datetime",
            "start_time" => "required|datetime",
            "image" => "nullable|string",
            "enterprise_id" => "integer|required",
            "deparment_id" => "required|string",
        ]);
        $newLaborContract = LaborContracts::create([
            'labor_contract_id' => ($fields['labor_contract_id']),
            'enterprise_id' => ($fields['enterprise_id']),
            'start_time' => ($fields['start_time']),
            'image' => ($fields['image']),
            'end_time' => ($fields['end_time']),
            'deparment_id' => ($fields['deparment_id']),
        ]);
        return response()->json([], 201);
    }
    public function update(Request $request)
    {
        $laborContracts = LaborContracts::find($request->labor_contract_id);
        $input = $request->validate([
            "labor_contract_id" => "required|string",
            "end_time" => "required|datetime",
            "start_time" => "required|datetime",
            "image" => "nullable|string",
            "enterprise_id" => "boolean|required",
            "deparment_id" => "required|string",
        ]);
        $laborContracts->labor_contract_id = $input['labor_contract_id'];
        $laborContracts->start_time = $input['start_time'];
        $laborContracts->end_time = $input['end_time'];
        $laborContracts->enterprise_id = $input['enterprise_id'];
        $laborContracts->deparment_id = $input['deparment_id'];
        $laborContracts->image = $input['image'];
        $laborContracts->save();
        return response()->json([], 200);
    }
}
