<?php

namespace App\Http\Controllers;

use App\Models\Enterprises;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EnterprisesController extends Controller
{
    public function selectAll()
   {
        $enterprises = Enterprises::all();

        return view('/dashboard',['enterprises' => $enterprises]);
   }
}
