<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingProcesses;
use Illuminate\Routing\Controller;

class WorkingProcessesController extends Controller
{
    public function selectAll()
   {
        $workingprocesses = WorkingProcesses::all();

        return view('/',['workingprocesses' => $workingprocesses]);
   }
}
