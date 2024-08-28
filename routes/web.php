<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', [SalaryController::class, 'index']);

Route::get('/view/{year?}', [DataController::class, 'show'])->name('view');


Route::get('/add',[DataController::class, 'showAddForm']);

Route::post('/save', [DataController::class, 'save']);
Route::get('/get-days-in-month', [DataController::class, 'getDaysInMonthAjax']);


Route::get('/salaries/{year?}', [DataController::class, 'showSalaries'])->name('salaries');
Route::post('/save-salary', [DataController::class, 'saveSalary'])->name('saveSalary');

