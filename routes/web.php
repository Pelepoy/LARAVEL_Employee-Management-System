<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'employees', 301);

Route::get('employees', [EmployeeController::class, 'index'])->name('employee.index');

Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/create', [EmployeeController::class, 'store'])->name('employee.store');

Route::get('employee/{employeeID}', [EmployeeController::class, 'show'])->name('employee.show');

Route::get('employee/{employeeID}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('employee/{employeeID}/edit', [EmployeeController::class, 'update'])->name('employee.update');

Route::delete('employee/{employeeID}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
