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

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.login');
    Route::get('/unit', [AdminController::class, 'show_unit'])->name('show_unit');
    Route::post('/create_unit', [AdminController::class, 'create_unit'])->name('create_unit');
    Route::get('/admin/units', [AdminController::class, 'show_all_units'])->name('show_all_units');
    Route::delete('/destroy_unit/{id}', [AdminController::class, 'destroy_unit'])->name('destroy_unit');


});



