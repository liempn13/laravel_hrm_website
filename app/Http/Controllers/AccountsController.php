<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function selectAll()
    {
        $accounts = Accounts::all();

        return view('/dashboard', ['accounts' => $accounts]);
    }

    public function create(){
        return view('/');
    }

    public function store(Request $request)
    {
        // Kiểm tra xem dữ liệu từ client gửi lên bao gốm những gì
        // dd($request);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        $data['password'] = Hash::make($request->password);
        // Tạo mới accounts với các dữ liệu tương ứng với dữ liệu được gán trong $data
        Accounts::create($data);
        echo'success create';
    }

    public function edit($id){
        // Tìm đến đối tượng muốn update
        $accounts = Accounts::findOrFail($id);

        // điều hướng đến view edit accounts và truyền sang dữ liệu về accounts muốn sửa đổi
        return view('/', compact('accounts'));
    }

    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $account = Accounts::findOrFail($id);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        // mã hóa password trước khi đẩy lên DB
        $data['password'] = Hash::make($request->password);

        // Update Accounts
        Accounts::update($data);
        echo"success update";
    }

    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        $account = Accounts::findOrFail($id);

        $account->delete();
        echo"success delete";
    }

}
