<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function index()
    {
        $salary = Salary::all();
        return view('',[
            ''=>$salary
        ]);
    }
    // public function createTextfield($placeholder,$texttype)
    // {
    //     return view('partial.textfield', [
    //         'placeholder' => $placeholder,
    //         'texttype' => $texttype
    //     ]);
    // }
}
?>
