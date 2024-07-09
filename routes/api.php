<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\DecisionsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DiplomasController;
use App\Http\Controllers\EnterprisesController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RelativesController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WorkingProcessesController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Resources\AccountsResource;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::resource('accounts', AccountsController::class);
//
Route::resource('profiles', ProfilesController::class);
//
Route::resource('positions', PositionsController::class);
//
Route::resource('departments', DepartmentsController::class);
//
Route::resource('decisions', DecisionsController::class);
//
Route::resource('diplomas', DiplomasController::class);
//
Route::resource('enterprises', EnterprisesController::class);
//
Route::resource('relatives', RelativesController::class);
//
Route::resource('salaries', SalariesController::class);
//
Route::resource('projects', ProjectsController::class);
//
Route::resource('workingprocesses', WorkingProcessesController::class);
