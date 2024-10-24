<?php

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

//
Route::controller(DiplomasController::class)->group(function () {
    Route::get('/v1/diplomas', '');
    Route::put('/v1', '');
    Route::post('/v1',);
    Route::delete('/v1', '');
});
//
Route::controller(DepartmentsController::class)->group(function () {
    Route::get('/v1/departments', 'index');
    Route::put('/v1', '');
    Route::post('/v1',);
    Route::delete('/v1', '');
});
//
Route::controller(DecisionsController::class)->group(function () {
    Route::get('/v1/decisions/{id}', '');
    Route::put('/v1', '');
    Route::post('/v1',);
    Route::delete('/v1', '');
});

//
Route::controller(PositionsController::class)->group(function () {
    Route::get('/v1/positions', 'index');
    Route::put('/v1/position-update', 'update');
    Route::post('/v1', '');
    Route::delete('/v1', '');
});
//
Route::controller(ProjectsController::class)->group(function () {
    Route::get('/v1', '');
    Route::put('/v1', '');
    Route::post('/v1',);
    Route::delete('/v1', '');
});
//
Route::controller(RelativesController::class)->group(
    function () {
        Route::get('/v1/relatives/{id}', '');
        Route::put('/v1/relatives-update', '');
        Route::post('/v1',);
        Route::delete('/v1', '');
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
    Route::get('/v1/salaries/{id}', '');
    Route::put('', '');
    Route::post('', '');
    Route::delete('', '');
});

Route::controller(ProfilesController::class)->group(function () {
    Route::get('', '');
    Route::post('v1/auth/register', 'registerNewProfiles');
    Route::post('v1/auth/email-login', 'emailLogin');
    Route::post('v1/auth/phone-login', 'phoneLogin');
});