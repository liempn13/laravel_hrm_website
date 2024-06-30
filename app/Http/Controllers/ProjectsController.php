<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{
    public function selectAll()
   {
        $projects = Projects::all();

        return view('/',['projects' => $projects]);
   }
}
