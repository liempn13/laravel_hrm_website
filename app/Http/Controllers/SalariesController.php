<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salaries;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SalariesResource as SalariesResource;
use App\Models\Enterprises;
use App\Http\Resources\EnterprisesResource as EnterprisesResource;

class SalariesController extends Controller
{
    public function index()
    {
        $salaries = Salaries::all();
        return response()->json($salaries);
    }
    public function show(string $id)
    {
        return (
            Salaries::findOrFail($id)
        );
    }
    public function getSalarySlip(string $salary_id)
    {
        return
            DB::table('salaries')
            ->join('profiles', 'salaries.salarie_id', '=', 'profiles.salarie_id')
            ->join('positions', 'profiles.position_id', '=', 'positions.position_id')
            ->select(
                'profiles.profile_name',
                'positions.position_name',
                'salaries.*'
            )
            ->where([['salaries.salarie_id', '=', $salary_id]],)
            ->get()
        ;
    }

    public function addNewSalary(Request $request)
    {
        $fields = $request->validate([
            "salary_id" => "required|string",
            "salary_coefficient" => "required|numeric",
            "allowances" => "nullable|numeric",
            "personal_tax" => "required|numeric",
        ]);
    
        $newSalary = Salaries::create([
            'salary_id' => $fields['salary_id'],
            'salary_coefficient' => $fields['salary_coefficient'],
            'allowances' => $fields['allowances'],
            'personal_tax' => $fields['personal_tax']
        ]);
    
        return response()->json($newSalary, 201);
    }
    

    public function update(Request $request, Salaries $salaries)
    {
        $input = $request->validate([
            "salary_id" => "required|string",
            "salary_coefficient" => "required|numeric",
            "allowances" => "nullable|numeric",
            "personal_tax" => "nullable|numeric",

        ]);
        $salaries->salary_id = $input['salary_id'];
        $salaries->salary_coefficient = $input['salary_coefficient'];
        $salaries->allowances = $input['allowances'];
        $salaries->personal_tax = $input['personal_tax'];
        $salaries->save();
        response()->json([], 200);
    }

    public function delete(Salaries $salaries)
    {
        $salaries->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}