<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LogisticController;

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

//login
Route::get("/login", [AuthController::class, "login"])->name("userlogin");
Route::post("/login", [AuthController::class, "userlogin"])->name("userlogin");

Route::group(['prefix' => 'admin'], function () {


    Route::get("/login", [AuthController::class, "login"])->name("adminlogin");
    Route::post("/login", [AuthController::class, "userlogin"])->name("adminlogin");

    //admin--dashboard
    Route::get("/admindashboard", [DashboardController::class, "index"])->name("admindashboard");

    //admin--userManagement
    Route::get('/index', [UserController::class,'allUser'])->name('index');
    Route::get('/addUser', [UserController::class,'addUser'])->name('addUser');
    Route::post('/saveUser', [UserController::class,'saveUser'])->name('saveUser');
    Route::get('/userdetails/{id}', [UserController::class,'userData']);
    Route::post('/useredit/{id}', [UserController::class,'editUser']);

    //admin--customerManagement
    Route::get('/allcustomers', [CustomerController::class,'allCustomerDetails'])->name('allcustomer');
    Route::get('/customer', [CustomerController::class,'customerDetails'])->name('customer');
    Route::get('/customers', [CustomerController::class,'addCustomer'])->name('addcustomer');
    Route::post('/customers', [CustomerController::class,'saveCustomer'])->name('savecustomer');
    Route::get('/customerdetails/{id}', [CustomerController::class,'customerData']);
    Route::get('/customer-contacts', [CustomerController::class,'getCustomerContacts'])->name('getCustomerContacts');
    Route::post('/customeredit/{id}', [CustomerController::class,'editCustomer']);
    Route::get('/customerstatus/{id}/{status}', [CustomerController::class,'customerStatus']);

    //admin--employeeManagement
    Route::get('/allemployee', [EmployeeController::class,'allEmployee'])->name('allEmployee');
    Route::get('/addemployee', [EmployeeController::class,'addEmployee'])->name('addEmployee');
    Route::post('/addemployee', [EmployeeController::class,'saveEmployee'])->name('saveEmployee');


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
    
    //admin---inventory
    Route::get('/inventory', [InventoryController::class,'getinventory'])->name('inventory');
    Route::get('/allproducts', [InventoryController::class,'allProducts'])->name('allproducts');
    Route::get('/addproduct', [InventoryController::class,'addProduct'])->name('addproduct');
    Route::get('/allwarehouse', [InventoryController::class,'allWarehouse'])->name('allwarehouse');
    Route::get('/allproductcategory', [InventoryController::class,'allProductCategory'])->name('allproductcategory');
    Route::get('/addproductcategory', [InventoryController::class,'addProductCategory'])->name('addproductcategory');
    Route::post('/addproductcategory', [InventoryController::class,'saveProductCategory'])->name('addproductcategory');
    Route::get('/allattributes', [InventoryController::class,'allAttributes'])->name('allattributes');
    Route::get('/addattributes', [InventoryController::class,'addAttributes'])->name('addattributes');
    Route::post('/addattributes', [InventoryController::class,'saveAttributes'])->name('addattributes');
    Route::get('/allUOMcategory', [InventoryController::class,'allUOMcategory'])->name('allUOMcategory');
    Route::post('/saveUOMcategory', [InventoryController::class,'saveUOMcategory'])->name('UOMcategory');
    Route::get('/allUOM', [InventoryController::class,'allUOM'])->name('allUOM');
    Route::post('/saveuom', [InventoryController::class,'saveUOM'])->name('saveuom');
    
    //admin--logistic
    Route::group(['prefix' => 'logistic'], function () {
        
        //admin--logistic--client
        Route::get("/allclients", [LogisticController::class, "allClients"])->name("allclients");
        Route::get("/saveclient", [LogisticController::class, "addClient"])->name("saveclient");
        Route::post("/saveclient", [LogisticController::class, "saveClient"])->name("saveclient");
        
        //admin--logistic--crm
        Route::get('/crm', [LogisticController::class,'getRequest'])->name('logistic_crm');
        Route::get('/addrequest', [LogisticController::class,'addRequest'])->name('addLogisticLead');
        Route::post('/addrequest', [LogisticController::class,'saveRequest'])->name('addLogisticLead');
        Route::get('/searchclientrequest', [LogisticController::class,'searchClientRequest'])->name('searchclientrequest');
        Route::get('/viewrequest/{lead_id}', [LogisticController::class,'viewRequest']);
        Route::post('/updaterequest/{lead_id}', [LogisticController::class,'updateRequest']);
        Route::get('/update-stage/{lead_id}/{stage_id}', [LogisticController::class,'updateLogisticStage']);
        
        //admin--logistic-quotation
        Route::get('/newquotation/{lead_id}', [LogisticController::class,'addQuotation']);
        Route::post('/newquotation/{lead_id}', [LogisticController::class,'saveQuotation']);
    });
    
});
