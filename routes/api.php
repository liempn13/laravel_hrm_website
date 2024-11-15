<?php

use App\Http\Controllers\AbsentsController;
use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\DecisionsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DiplomasController;
use App\Http\Controllers\EnterprisesController;
use App\Http\Controllers\LaborContractsController;
use App\Http\Controllers\PayrollDetailsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RelativesController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TimekeepingsController;
use App\Http\Controllers\WorkingProcessesController;
use App\Http\Controllers\TrainingProcessesController;
use Illuminate\Support\Facades\Route;


Route::controller(ProfilesController::class)->group(function () {
    Route::post('/v1/auth/login/email', 'emailLogin');
    Route::post('/v1/auth/login/phone', 'phoneNumberLogin');
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(ProfilesController::class)->group(function () {
        Route::post('/v1/logout', 'logout');
        Route::get('/v1/profiles', 'index');
        Route::get('/v1/profiles/department/{id}', 'departmentMembersCount'); //Danh sách nhân viên thuộc phòng ban và số lượng
        Route::get('/v1/profiles/position/{id}', 'positionMembersCount'); //Danh sách nhân viên giữ chức vụ và số lượng
        Route::get('/v1/profiles/quit', 'quitMembersCount'); //Danh sách nhân viên đã nghỉ việc và số lượng
        Route::get('/v1/profiles', 'index');
        Route::post('/v1/profile/auth/register', 'registerNewProfile');
        Route::put('v1/profile/update', 'update');
        Route::put('/v1/profile/lock', 'lockAndUnlock'); // khoá tài khoản tạm thời = 0 và mở khoá = 1
        Route::post('/v1/profile/changePassword', 'changePassword'); // API đổi mật khẩu
    });
    Route::controller(PositionsController::class)->group(function () {
        Route::get('/v1/positions', 'index');
        Route::put('/v1/position/update', 'update');
        Route::post('/v1/position/create', 'createNewPosition');
        Route::delete('/v1/position/delete/{id}', 'delete');
    });
    //
    Route::controller(TasksController::class)->group(function () {
        Route::get('/v1/project/task/{id}', 'showTaskDetail');
        Route::put('/v1/project/task/update', 'update');
        Route::post('/v1/project/task/create', 'createNewTask');
        Route::delete('/v1/project/task/delete/{id}', 'delete');
    });
    //
    Route::controller(AssignmentsController::class)->group(function () {
        Route::get('/v1/assign/task/{id}', 'showTaskDetail');
        Route::put('/v1/assign/update', 'update');
        Route::post('/v1/assign/create', 'create');
        Route::delete('/v1/assign/delete/{id}', 'delete');
    });
    //
    Route::controller(DepartmentsController::class)->group(function () {
        Route::get('/v1/departments', 'index');
        Route::put('/v1/department/update', 'update');
        Route::post('/v1/department/create', 'createNewDepartment');
        Route::delete('/v1/department/delete/{id}', 'delete');
    });
    Route::controller(ShiftsController::class)->group(function () {
        Route::get('/v1/shifts', 'index');
        Route::put('/v1/shift/update', 'update');
        Route::post('/v1/shift/create', 'store');
        Route::delete('/v1/shift/delete/{id}', 'delete');
    });
    //
    Route::controller(AbsentsController::class)->group(function () {
        Route::get('/v1/absents/{profile_id}', 'showAbsentOfProfile');
        Route::put('/v1/absent/update/{id}', 'update');
        Route::post('/v1/absent/create', 'createNewAbsentRequest');
    });
    //
    Route::controller(TimekeepingsController::class)->group(function () {
        Route::get('/v1/timekeepings', 'index');
        Route::post('/v1/checkin', 'checkIn');
        Route::put('/v1/checkout/{id}', 'checkOut');
    });
    //
    // Route::controller(PayrollDetailsController::class)->group(function () {
    //     Route::get('/v1/payrolls', '');
    //     Route::put('/v1/update/{id}', 'update');
    //     Route::post('/v1', '');
    // });
    //
    Route::controller(DiplomasController::class)->group(function () {
        Route::get('/v1/diploma/{profile_id}', 'getDiplomaOfProfile');
        Route::put('/v1/diploma/update/{id}', 'update');
        Route::post('/v1/diploma/create', 'createNewDiploma');
        Route::delete('/v1/diploma/delete', 'delete');
    });
    //
    Route::controller(DecisionsController::class)->group(function () {
        Route::get('/v1/decisions', 'index');
        Route::put('/v1/decision/update', 'update');
        Route::post('/v1/decision/create', 'create');
        Route::delete('/v1/decision/delete', 'delete');
    });
    //
    Route::controller(EnterprisesController::class)->group(function () {
        Route::get('/v1/enterprise/info', 'index');
        Route::put('/v1/enterprise/info/update', 'update');
    });
    Route::controller(ProjectsController::class)->group(function () {
        Route::get('/v1/projects', 'index');
        Route::post('/v1/project/create', 'createNewProject');
        Route::put('/v1/project/update', 'update');
        Route::delete('/v1/project/delete/{id}', 'delete');
    });
    //
    Route::controller(RelativesController::class)->group(
        function () {
            Route::get('/v1/relative/{id}', '');
            Route::get('/v1/profile/relatives/{id}', 'showRelativesOf'); //Lấy ra thông tin các thân nhân của nhân viên có id là id được truyền vào
            Route::post('/v1/relatives/create', 'addNewRelatives');
            Route::put('/v1/relatives/update', 'update');
            Route::delete('/v1/relatives/delete/{relative_id}', 'delete')->where('relative_id', '[0-9]+');
        }
    );
    //
    Route::controller(WorkingProcessesController::class)->group(function () {
        Route::get('/v1/profile/workingprocesses/{id}', 'showWorkingProcessesOfProfileID');
        Route::put('/v1/profile/workingprocesses/update', 'update');
        Route::post('/v1/profile/workingprocesses/add', 'addNewWWorkingProcesses');
        Route::delete('/v1/profile/workingprocesses/delete/{id}', 'delete');
    });
    //
    Route::controller(TrainingProcessesController::class)->group(function () {
        Route::get('/v1/profile/trainingProcesses/{id}', 'showTrainingProcessesOfProfile');
        Route::put('/v1/profile/trainingProcesses/update', 'update');
        Route::post('/v1/profile/trainingProcesses/add', 'addNewTrainingProccess');
        Route::delete('/v1/profile/trainingProcesses/delete/{id}', 'delete');
    });
    //
    Route::controller(SalariesController::class)->group(function () {
        Route::get('/v1/salaries', 'index');
        Route::get('/v1/salary/{id}', 'getSalarySlip'); //Load phiếu lương của 1 nhân viên, có tham chiếu khoá ngoại nhiều bảng khác
        Route::put('/v1/salary/update', 'update');
        Route::post('/v1/salary/create', 'addNewSalary');
        Route::delete('/v1/salary/delete', 'delete');
    });
    Route::controller(LaborContractsController::class)->group(function () {
        Route::get('/v1/contract/{id}', 'showLaborContractDetails');
        Route::post('/v1/contract/create', 'createNewLaborContract');
        Route::put('v1/contract/update', 'update');
    });
});
