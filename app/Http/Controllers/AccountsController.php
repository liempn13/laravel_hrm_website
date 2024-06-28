<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
   public function index()
   {
        $accounts = Accounts::all();

        return view('/dashboard',['accounts' => $accounts]);
   }
}