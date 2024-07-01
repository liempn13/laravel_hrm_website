<?php

use App\Http\Controllers\AccountsController;
use App\Models\Accounts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgot_password', function () {
    return view('forgot_password');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/textfield', function () {
    return view('partial.textfield');
});

Route::get('/staff', function () {
    return view('staff');
});

Route::get('/department', function () {
    return view('department');
});

//Select
Route::get('/dashboard', [AccountsController::class,'selectAll']);

//create
Route::get('/', [AccountsController::class, 'create']);
Route::post('/', [AccountsController::class, 'store']);

// Update account
Route::get('/{id}', [AccountsController::class, 'edit']);
Route::post('/{id}', [AccountsController::class, 'update']);

// Delete account
// Vẫn nhớ phải truyền id vào nhá
Route::get('/{id}', [AccountsController::class, 'delete']);
