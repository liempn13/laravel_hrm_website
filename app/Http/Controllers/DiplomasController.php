<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diplomas;
use Illuminate\Routing\Controller;

class DiplomasController extends Controller
{
    public function selectAll()
   {
        $diplomas = Diplomas::all();

        return view('/dashboard',['diplomas' => $diplomas]);
   }
}
