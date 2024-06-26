<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
   public function index(){
    $account_list = Accounts::all();
    return view('tên trang views',['tên đối tượng model (1 thuộc tính hoặc 1 danh sách)'=>$account_list]);
   }
}
