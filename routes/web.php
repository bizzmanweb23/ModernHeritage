<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CrmController;

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
    return view('welcome');
});

//Auth::routes();

//login
Route::get('/login', [AuthController::class, 'login'])->name('userlogin');
Route::post('/login', [AuthController::class, 'userlogin'])->name('userlogin');

//register
Route::get('/register/{path?}', [AuthController::class, 'getRegister']);
Route::post('/register/{path?}', [AuthController::class, 'register']);

//logout
Route::post('/logout', [AuthController::class, 'logoutUser'])->name(
    'userLogout'
);

//admin
Route::get('/admindashboard', [DashboardController::class, 'index'])->name(
    'admindashboard'
);

//admin--userDetails
Route::get('/users', [DashboardController::class, 'allUsersDetails'])->name(
    'users'
);
Route::get('/user', [DashboardController::class, 'userDetails'])->name('user');
Route::get('/details/{id}', [DashboardController::class, 'memberData']);
Route::get('/edit/{id}', [DashboardController::class, 'memberData']);
Route::post('/edit/{id}', [DashboardController::class, 'editUser']);
Route::get('/userstatus/{id}/{status}', [DashboardController::class,'userStatus',]);

//admin--role
Route::get('/role', [DashboardController::class, 'createRole'])->name('createRole');
Route::post('/role', [DashboardController::class, 'saveRole'])->name('saveRole');

//admin--CRM
Route::get('/crm', [CrmController::class,'getRequest'])->name('getRequest');
Route::get('/request', [CrmController::class,'addRequest'])->name('addrequest');
Route::post('/request', [CrmController::class,'saveRequest'])->name('saverequest');
