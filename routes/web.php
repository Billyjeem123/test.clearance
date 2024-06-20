<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
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
Route::get('/register/student', [StudentController::class, 'register'])->name('register_student');
Route::post('/register', [StudentController::class, 'register_user'])->name('register_user');
Route::get('/student/login', [StudentController::class, 'login'])->name('login');
Route::get('/staff-login', [StudentController::class, 'staff_login'])->name('staff_login');
Route::post('/login', [StudentController::class, 'login_user'])->name('login_user');
Route::post('/process-staff-login', [StudentController::class, 'login_staff'])->name('login_staff');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth.staff')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.login');
    Route::get('/unit', [AdminController::class, 'show_unit'])->name('show_unit');
    Route::post('/create_unit', [AdminController::class, 'create_unit'])->name('create_unit');
    Route::get('/admin/units', [AdminController::class, 'show_all_units'])->name('show_all_units');
    Route::delete('/destroy_unit/{id}', [AdminController::class, 'destroy_unit'])->name('destroy_unit');


    Route::get('/create_users', [AdminController::class, 'create_users'])->name('create_users');
    Route::post('/create-staff', [AdminController::class, 'save_users'])->name('create_staff');
    Route::get('/users', [AdminController::class, 'show_all_users'])->name('show_all_users');
    Route::get('/staffs', [AdminController::class, 'show_all_staffs'])->name('show_all_staffs');
    Route::delete('/destroy_users/{id}', [AdminController::class, 'destroy_users'])->name('destroy_user');


    Route::get('/assign-role-staff', [AdminController::class, 'showAssignForm'])->name('assign_role_form');
    Route::post('/assign-role', [AdminController::class, 'assignRole'])->name('assign_role');
    Route::get('/unassign-role', [AdminController::class, 'showUnAssignForm'])->name('unassign_role_form');
    Route::post('/unassign-role', [AdminController::class, 'unassignRole'])->name('unassign_role');
});


Route::prefix('student')->middleware('auth.student')->group(function () {
    Route::get('/', [StudentController::class, 'student_dashboard'])->name('student_dashboard');
    Route::get('/clearance-unit/{unit_id}', [StudentController::class, 'clearance_approval_unit'])->name('clearance_approval_unit');
    Route::post('/save/documents', [StudentController::class, 'save_documents'])->name('save_documents');
    Route::get('/logout', [AdminController::class, 'logout'])->name('student_logout');
    Route::get('/all_docs', [StudentController::class, 'all_docs'])->name('all_docs');
    Route::post('/future-docs', [StudentController::class, 'save_docs'])->name('future-docs.store');
    Route::get('/download/{id}', [StudentController::class, 'download_docs'])->name('future-docs.download');
    Route::get('/delete/{id}', [StudentController::class, 'delete_docs'])->name('delete_docs');

});



Route::prefix('staff')->middleware('auth.staff')->group(function () {
    Route::get('/', [StaffController::class, 'staff_dashboard'])->name('staff_dashboard');
    Route::get('/submitted/documents', [StaffController::class, 'submitted_docs'])->name('submitted_docs');
    Route::get('/approve/{documentId}', [StaffController::class, 'showApprovalForm'])->name('document.approvalForm');
    Route::post('/approval', [StaffController::class, 'approveOrReject'])->name('document.approval');
});


