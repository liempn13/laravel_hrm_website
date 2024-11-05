<?php

use App\Http\Controllers\DecisionsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DiplomasController;
use App\Http\Controllers\EnterprisesController;
use App\Http\Controllers\LaborContractsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RelativesController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WorkingProcessesController;

use Illuminate\Support\Facades\Route;

//
Route::controller(DiplomasController::class)->group(function () {
    Route::get('/v1/diploma/{profile_id}', 'getDiplomaOfProfile');
    Route::put('/v1/diploma/update/{id}', 'update');
    Route::post('/v1/diploma/create', 'createNewDiploma');
    Route::delete('/v1/diploma/delete', 'delete');
});
//
Route::controller(DepartmentsController::class)->group(function () {
    Route::get('/v1/departments', 'index');
    Route::put('/v1/department/update', 'update');
    Route::post('/v1/department/create', 'createNewDepartment');
    Route::delete('/v1/department/delete', 'delete');
});
//
Route::controller(DecisionsController::class)->group(function () {
    Route::get('/v1/decisions', 'index');
    Route::put('/v1/decision/update', 'update');
    Route::post('/v1/decision/create', 'create');
    Route::delete('/v1/decision/delete', 'delete');
});

//
Route::controller(PositionsController::class)->group(function () {
    Route::get('/v1/positions', 'index');
    Route::put('/v1/position/update/{id}', 'update');
    Route::post('/v1/position/create', 'createNewPosition');
    Route::delete('/v1/position/delete', 'delete');
});
//
Route::controller(EnterprisesController::class)->group(function () {
    Route::get('/v1/enterprise/info', 'index');
    Route::put('/v1/enterprise/info/update', 'update');
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
        Route::get('/v1/relative/{id}', '');
        Route::get('/v1/profile/relatives/{id}', ''); //Lấy ra thông tin các thân nhân của nhân viên có id là id được truyền vào
        Route::post('/v1/relatives/create', 'addNewRelatives');
        Route::put('/v1/relatives/update/{id}', 'update');
        Route::delete('/v1/relatives/delete', 'delete');
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
    Route::get('/v1/salaries', 'index');
    Route::get('/v1/salary/{id}', 'getSalarySlip'); //Load phiếu lương của 1 nhân viên, có tham chiếu khoá ngoại nhiều bảng khác
    Route::put('/v1/salary/update', 'update');
    Route::post('/v1/salary/create', 'addNewSalary');
    Route::delete('/v1/salary/delete', 'delete');
});

Route::controller(ProfilesController::class)->group(function () {
    Route::get('/v1/profiles', 'index');
    Route::get('/v1/profile/info/{id}', 'getUserProfileInfo');
    Route::get('/v1/department/members/{department_id}', 'getDepartmentMembers'); //Load danh sách nhân viên của phòng ban theo mã phòng
    Route::post('/v1/profile/auth/register', 'registerNewProfile');
    Route::post('/v1/auth/login/email', 'emailLogin');
    Route::post('/v1/auth/login/phone', 'phoneNumberLogin');
    Route::post('/v1/logout', 'logout');
    Route::put('/v1/profile/info/update', 'update');
    Route::put('/v1/profile/lock', 'lockAndUnlock'); // khoá tài khoản tạm thời = 0 và mở khoá = 1
});

Route::controller(LaborContractsController::class)->group(function () {
    Route::get('/v1/profile/labor-contract/{id}', 'showLaborContractDetails');
    Route::get('/v1', '');
    Route::get('/v1', '');
    Route::post('v1', '');
    Route::post('v1', '');
    Route::post('v1', '');
});
Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/v1/department/members/{department_id}', 'getDepartmentMembers');
});
