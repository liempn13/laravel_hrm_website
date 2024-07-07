<?php

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
    return view('partial.basepage');
});

// Route::get('/forgot_password', function () {
//     return view('forgot_password');
// });

// //Select
// Route::get('/dashboard', [AccountsController::class,'selectAll']);

// //create
// Route::get('/', [AccountsController::class, 'create']);
// Route::post('/', [AccountsController::class, 'store']);

// // Update account
// Route::get('/{id}', [AccountsController::class, 'edit']);
// Route::post('/{id}', [AccountsController::class, 'update']);

// // Delete account
// // Vẫn nhớ phải truyền id vào nhá
// Route::get('/{id}', [AccountsController::class, 'delete']);
