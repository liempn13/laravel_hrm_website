<?php

namespace App\Http\Controllers;

use App\Models\Decisions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DecisionsController extends Controller
{
    public function index()
    {
         $decisions = Decisions::all();

         return view('/',['decisions' => $decisions]);
    }
}
