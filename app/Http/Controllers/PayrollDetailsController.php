<?php

namespace App\Http\Controllers;

use App\Models\PayrollDetails;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PayrollDetailsController extends Controller
{
    public function insertPayDetails(Request $request)
    {
        $fields = $request->validate([
            "salary_id" => "string",
            "sum" => "double",
            "bonus" => "double",
            "minus" => "double",
            "advance_money" => "double",
            "month" => "date",
            "status" => "boolean",
        ]);

        $newSalary = PayrollDetails::create([
            'salary_id' => $fields['salary_id'],
            'bonus' => $fields['bonus'],
            'minus' => $fields['minus'],
            'sum' => $fields['sum'],
            'month' => $fields['month'],
            'status' => $fields['status'],
            'advance_money' => $fields['advance_money'],
        ]);

        return response()->json($newSalary, 201);
    }


    public function update(Request $request, PayrollDetails $payroll)
    {
        $input = $request->validate([
            "salary_id" => "string",
            "sum" => "numeric",
            "bonus" => "numeric",
            "minus" => "numeric",
            "advance_money" => "numeric",
            "month" => "date",
            "status" => "boolean",
        ]);
        $payroll->salary_id = $input['salary_id'];
        $payroll->bonus = $input['bonus'];
        $payroll->minus = $input['minus'];
        $payroll->month = $input['month'];
        $payroll->status = $input['status'];
        $payroll->advance_money = $input['advance_money'];
        $payroll->save();
        response()->json([], 200);
    }

    public function delete(PayrollDetails $payroll)
    {
        $payroll->delete();
        return response()->json(["message" => "Delete success",], 200);
    }
}