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
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('accounts', AccountsController::class);
//
Route::apiResource('profiles', ProfilesController::class);
//
Route::apiResource('positions', PositionsController::class);
//
Route::apiResource('departments', DepartmentsController::class);
//
Route::apiResource('decisions', DecisionsController::class);
//
Route::apiResource('diplomas', DiplomasController::class);
//
Route::apiResource('enterprises', EnterprisesController::class);
//
Route::apiResource('relatives', RelativesController::class);
//
Route::apiResource('salaries', SalariesController::class);
//
Route::apiResource('projects', ProjectsController::class);
//
Route::apiResource('workingprocesses', WorkingProcessesController::class);

Route::controller(AccountsController::class)->group(function () {
    Route::get('/superadmin/accounts', 'showAdminAccounts');
    Route::get('/admin/accounts/{id}', 'showAccountsByEnterpriseID');
    Route::get('/identity/v2/auth/login', 'login');
    Route::get('/identity/v2/auth/account', 'getUserProfileData');
    Route::put('/accounts/{id}', 'update');
    Route::post('', );
});
//
Route::controller(EnterprisesController::class)->group(function () {
    Route::get('', '');
    Route::put('', '');
    Route::post('', '');
    Route::delete('', '');
});
//
Route::controller(DiplomasController::class)->group(function () {
    Route::get('', '');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
//
Route::controller(DepartmentsController::class)->group(function () {
    Route::get('/v1/departments/{id}', 'showDepartmentsByEnterpriseID');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
//
Route::controller(DecisionsController::class)->group(function () {
    Route::get('', '');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
//
Route::controller(ProfilesController::class)->group(function () {
    Route::get('/profile/{id}', 'showProfile');
    Route::get('/v1/profiles/{id}', 'showProfilesByEnterpriseID');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
//
Route::controller(PositionsController::class)->group(function () {
    Route::get('/v1/positions/{id}', 'showPositionsByEnterpriseID');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
//
Route::controller(ProjectsController::class)->group(function () {
    Route::get('', '');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
//
Route::controller(RelativesController::class)->group(
    function () {
        Route::get('/relatives/{id}', 'showRelativesOf');
        Route::put('', '');
        Route::post('',);
        Route::delete('', '');
    }
);
//
Route::controller(WorkingProcessesController::class)->group(function () {
    Route::get('', '');
    Route::put('', '');
    Route::post('',);
    Route::delete('', '');
});
//
Route::controller(SalariesController::class)->group(function () {
    Route::get('/v1/salaries/{id}', 'getSalariesByEnterpriseID');
    // Route::get('/salaries/{id}', 'getSalariesByDepartmentID');
    // Route::get('/salary/{id}', 'getSalary');
    Route::put('', '');
    Route::post('','');
    Route::delete('', '');
});
