<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    // Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/create', [CompanyController::class, 'store']);
    Route::get('/company/edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/company/edit/{company}', [CompanyController::class, 'update']);
    Route::delete('/company/destroy/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');


    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/create', [EmployeeController::class, 'store']);
    Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/edit/{employee}', [EmployeeController::class, 'update']);
    Route::delete('/employee/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    // Route::get('/send',function (){

    //     Mail::to('sadat.himel@gmail.com')->send(new TestMail());
    //     return response( 'sending');
    // });

});
require __DIR__ . '/auth.php';
