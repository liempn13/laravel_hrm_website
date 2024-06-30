<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Relatives;

class RelativesController extends Controller
{
    public function selectAll()
   {
        $relatives = Relatives::all();

        return view('/',['relatives' => $relatives]);
   }
}
