<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\QuotationController;

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

Route::get("/", function () {
    return view("frontend.user.home.index");
});

Route::get("/home", [HomeController::class, "index"])->name("home");
//logout
Route::post("/logout", [AuthController::class, "logoutUser"])->name("userLogout");

//register
Route::get("/register/{path?}", [AuthController::class, "getRegister"]);
Route::post("/register/{path?}", [AuthController::class, "register"]);

Route::group(['prefix' => 'admin'], function () {

    //login
    Route::get("/login", [AuthController::class, "login"])->name("userlogin");
    Route::post("/login", [AuthController::class, "userlogin"])->name("userlogin");

    //admin--dashboard
    Route::get("/admindashboard", [DashboardController::class, "index"])->name("admindashboard");

    //admin--userDetails
    Route::get("/users", [DashboardController::class, "allUsersDetails"])->name("users");
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
    Route::get('/searchrequest', [CrmController::class,'searchRequest'])->name('searchrequest');
    // Route::get('/request', [CrmController::class,'addRequest'])->name('addrequest');
    Route::post('/request', [CrmController::class,'saveRequest'])->name('saverequest');
    Route::get('/viewrequest/{lead_id}', [CrmController::class,'viewRequest']);
    Route::get('/updatestage/{lead_id}/{stage_id}', [CrmController::class,'updateStage']);
    Route::post('/updaterequest', [CrmController::class,'updateRequest'])->name('updaterequest');

    //admin--quotation
    Route::get('/newquotation/{id}', [QuotationController::class,'addQuotation']);
    Route::post('/savequotation', [QuotationController::class,'saveQuotation'])->name('savequotation');
    Route::get('/searchproduct', [QuotationController::class,'searchProduct'])->name('searchproduct');
    Route::post('/addproduct', [QuotationController::class,'addProduct'])->name('addproduct');
    Route::get('/confirmquotation/{id}', [QuotationController::class,'confirmQuotation']);
    Route::post('/confirmquotation/{id}', [QuotationController::class,'postConfirmQuotation']);
    Route::get('/viewquotation/{lead_id}', [QuotationController::class,'viewQuotation']);
});

