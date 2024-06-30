<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DepartmentsController extends Controller
{
    public function selectAll()
   {
        $departments = Departments::all();

        return view('/dashboard',['departments' => $departments]);
   }
}
