<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PositionsController extends Controller
{
    public function selectAll()
   {
        $positions = Positions::all();

        return view('/',['positions' => $positions]);
   }
}
