<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RolesController extends Controller
{
    public function index(){
        return Role::all();
    }
}
