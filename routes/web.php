<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/post-login',  [LoginController::class, 'login'])->name('postLogin');
Route::get('/logout',  [LoginController::class, 'logout'])->name('logout');

//Forgot Password
Route::get('/forgot/password',  [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot.password');
Route::post('/password/email',  [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Reset Password
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/dashboard',  [HomeController::class, 'index'])->name('dashboard');
        Route::get('/users',  [UserController::class, 'index'])->name('users');
        Route::get('/departments',  [DepartmentController::class, 'index'])->name('departments');
        Route::get('/employees',  [EmployeeController::class, 'index'])->name('employees');
    });
});
