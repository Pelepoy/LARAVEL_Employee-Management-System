<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

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

Route::redirect('/', 'employees', 301);

Route::controller(EmployeeController::class)->group(function () {
    Route::get('employees', 'index')->name('employee.index')->middleware('auth');
    Route::get('employee/create',  'create')->name('employee.create');
    Route::post('employee/create',  'store')->name('employee.store');
    Route::get('employee/{employeeID}',  'show')->name('employee.show');
    Route::get('employee/{employeeID}/edit',  'edit')->name('employee.edit');
    Route::put('employee/{employeeID}/edit',  'update')->name('employee.update');
    Route::delete('employee/{employeeID}',  'destroy')->name('employee.destroy');
});


Route::controller(UserController::class)->group(function () {
    Route::get('register', 'register')->name('user.register');
    Route::post('register/store', 'store')->name('user.store');
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('login/auth', 'authenticate')->name('user.authenticate');
    Route::post('logout', 'logout')->name('user.logout');
});
