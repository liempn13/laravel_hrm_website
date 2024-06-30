<?php

namespace App\Http\Controllers;

use App\Models\Salaries;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SalariesController extends Controller
{
    public function selectAll()
    {
         $salaries = Salaries::all();

         return view('/',['salaries' => $salaries]);
    }
}
