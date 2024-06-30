<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfilesController extends Controller
{
    public function selectAll()
   {
        $profiles = Profiles::all();

        return view('/',['profiles' => $profiles]);
   }
}
