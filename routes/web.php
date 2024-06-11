<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', [StudentController::class, 'index'])->name('index');
Route::get('/register', [StudentController::class, 'register'])->name('register');
Route::post('/register', [StudentController::class, 'register_user'])->name('register_user');


Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.login');
    Route::get('/unit', [AdminController::class, 'show_unit'])->name('show_unit');
    Route::post('/create_unit', [AdminController::class, 'create_unit'])->name('create_unit');
    Route::get('/admin/units', [AdminController::class, 'show_all_units'])->name('show_all_units');
    Route::delete('/destroy_unit/{id}', [AdminController::class, 'destroy_unit'])->name('destroy_unit');


    Route::get('/create_users', [AdminController::class, 'create_users'])->name('create_users');
    Route::post('/create-staff', [AdminController::class, 'save_users'])->name('create_staff');
    Route::get('/users', [AdminController::class, 'show_all_users'])->name('show_all_users');
    Route::delete('/destroy_users/{id}', [AdminController::class, 'destroy_users'])->name('destroy_user');


    Route::get('/assign-role', [AdminController::class, 'showAssignForm'])->name('assign_role_form');
    Route::post('/assign-role', [AdminController::class, 'assignRole'])->name('assign_role');
    Route::get('/unassign-role', [AdminController::class, 'showUnAssignForm'])->name('assign_role_form');
    Route::post('/unassign-role', [AdminController::class, 'unassignRole'])->name('unassign_role');
});
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');


Route::prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'student_dashboard'])->name('student_dashboard');
    Route::get('/clearance-unit/{unit_id}', [StudentController::class, 'clearance_approval_unit'])->name('clearance_approval_unit');
});


