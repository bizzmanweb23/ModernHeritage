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
use App\Http\Controllers\DriverController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdersController;

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
    Route::get('/viewCustomer/{id}/', [CustomerController::class,'viewCustomer']);
    Route::get('/deleteCustomer/', [CustomerController::class,'deleteCustomer'])->name('deleteCustomer');
    Route::get('/editCustomer/{id}/', [CustomerController::class,'editCustomer']);
    Route::post('/updateCustomer/', [CustomerController::class,'updateCustomer'])->name('updateCustomer');
 
    
    //admin--employeeManagement
    Route::get('/allemployee', [EmployeeController::class,'allEmployee'])->name('allEmployee');
    Route::get('/addemployee', [EmployeeController::class,'addEmployee'])->name('addEmployee');
    Route::post('/addemployee', [EmployeeController::class,'saveEmployee'])->name('saveEmployee');
    Route::get('/employeedetails/{id}', [EmployeeController::class,'employeeData']);
    Route::post('/employeeedit/{id}', [EmployeeController::class,'employeeEdit']);
    Route::get('/departments', [EmployeeController::class,'allDepartment'])->name('departments');
    Route::get('/createdepartment', [EmployeeController::class,'addDepartment'])->name('addDepartment');
    Route::post('/savedepartment', [EmployeeController::class,'saveDepartment'])->name('saveDepartment');
    Route::get('/department-employees/{dept_id}', [EmployeeController::class,'departmentEmployee'])->name('department.employees');
    Route::get('/jobpositions', [EmployeeController::class,'allJobPosition'])->name('allJobPosition');
    Route::get('/addjobposition', [EmployeeController::class,'addJobPosition'])->name('addJobPosition');
    Route::post('/savejobposition', [EmployeeController::class,'saveJobPosition'])->name('saveJobPosition');


    //admin--role
    Route::get('/role', [DashboardController::class, 'createRole'])->name('createRole');
    Route::post('/role', [DashboardController::class, 'saveRole'])->name('saveRole');

    //admin--CRM
    Route::get('/crm', [CrmController::class,'getRequest'])->name('getRequest');
    Route::get('/searchrequest', [CrmController::class,'searchCustomer'])->name('searchcustomer');
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
    Route::post('/saveuom', [InventoryController::class,'saveUOM'])->name('saveuom');
    Route::get('/allservices', [InventoryController::class,'allServices'])->name('allServices');
    Route::post('/saveservices', [InventoryController::class,'saveServices'])->name('saveServices');
    Route::post('/order_update', [OrdersController::class,'orderUpdate'])->name('order_update');

     //order management
     Route::get('/order-management', [OrdersController::class,'index'])->name('orderList');
     Route::get('/order-details/{id}', [OrdersController::class,'orderDetails'])->name('orderDetails');
     Route::get('/assign_to_delivery/{id}', [OrdersController::class,'assign_to_delivery'])->name('assign_to_delivery');
 
    

     //order status
     Route::get('/order-status', [OrdersController::class,'orderStatus'])->name('orderStatus');
     Route::get('/addOrderStatus', [OrdersController::class,'addOrderStatus'])->name('addOrderStatus');
     Route::post('/saveOrderStatus', [OrdersController::class,'saveOrderStatus'])->name('saveOrderStatus');
     Route::get('/editStatus/{id}', [OrdersController::class,'editStatus'])->name('editStatus');
     Route::post('/editOrderStatus', [OrdersController::class,'editOrderStatus'])->name('editOrderStatus');
     Route::get('/deleteStatus/{id}', [OrdersController::class,'deleteStatus'])->name('deleteStatus');
     Route::get('/orderStatusEdit/{id}', [OrdersController::class,'orderStatusEdit'])->name('orderStatusEdit');
     Route::post('/addToDelivery', [DriverController::class,'addToDelivery'])->name('addToDelivery');
     

     //driver management
     Route::get('/drivers', [DriverController::class,'drivers'])->name('drivers');
     Route::get('/addDriver', [DriverController::class,'addDriver'])->name('addDriver');
     Route::get('/viewDriver/{id}', [DriverController::class,'viewDriver'])->name('viewDriver');
     Route::get('/editDriver/{id}', [DriverController::class,'editDriver'])->name('editDriver');

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
        Route::get('/searchcontact', [LogisticController::class,'searchContact'])->name('searchcontact');
        Route::get('/viewrequest/{lead_id}/{prev_route?}', [LogisticController::class,'viewRequest']);
        Route::post('/updaterequest/{lead_id}', [LogisticController::class,'updateRequest']);
        Route::get('/update-stage/{lead_id}/{stage_id}', [LogisticController::class,'updateLogisticStage']);
        Route::post('/update-dashboard', [LogisticController::class,'updateLogisticDashboard'])->name('assign-driver');
        
        ///admin--logistic-quotation
        Route::get('/newquotation/{lead_id}', [LogisticController::class,'addQuotation']);
        Route::post('/newquotation/{lead_id}', [LogisticController::class,'saveQuotation']);
        Route::get('/viewquotation/{lead_id}', [LogisticController::class,'viewQuotation']);

        //admin--logistic--sales--person Activity
        Route::get('/allSalesperson', [SalesController::class,'allSalesperson'])->name('salespersons');
        Route::get('/assignedleads/{salesperson_id}', [SalesController::class,'assignedLeads'])->name('assignedleads');

        //admin--logistic--dashboard
        Route::get('/viewCalander1', [LogisticController::class,'viewcalander'])->name('ViewCalander1');
        Route::post('/search-order/{order_no}',[LogisticController::class,'SearchOrder'])->name('Search');
        Route::get('/viewDriverCalander', [LogisticController::class,'viewdrivercalander'])->name('ViewDriverCalander');
        Route::get('/driver_status', [LogisticController::class,'driver_status'])->name('driver_status');
        Route::post('/chekDriver', [LogisticController::class,'chekDriver'])->name('chekDriver');


        
        //Testing for Ajax
        Route::post('/assign-driver',[LogisticController::class,'AssignDriverAjax']);
        Route::get('/driver-listing',[LogisticController::class,'listing']);


        Route::get('/viewCalander', [LogisticController::class,'viewcalander1'])->name('ViewCalander');


        //admin--logistic--delivery_orders
        Route::get('/delivery-orders',[LogisticController::class,'viewDeliveryOrders'])->name('Delivery-Orders');
        Route::get('/detailed-delivery-orders/{lead_id}',[LogisticController::class,'viewDetailedOrders'])->name('DetailedOrders');


        //fleet-management
        Route::get('/allvehicles', [FleetController::class,'allVehicles'])->name('allVehicles');
        Route::get('/addvehicles', [FleetController::class,'addVehicles'])->name('addVehicles');
        Route::post('/savevehicle', [FleetController::class,'saveVehicle'])->name('saveVehicle');
        Route::get('/allbrands', [FleetController::class,'allBrands'])->name('allBrands');
        Route::post('/savebrands', [FleetController::class,'saveBrands'])->name('saveBrands');
        Route::get('/allmodels', [FleetController::class,'allModels'])->name('allModels');
        Route::post('/savemodels', [FleetController::class,'saveModels'])->name('saveModels');

        //driver-management
        Route::get('/driver-overview', [DriverController::class,'driverOverview'])->name('driverOverview');
        Route::get('/deliveries/{delivery_time}', [DriverController::class,'allDeliveries'])->name('allDeliveries');
        Route::get('/deliveries', [DriverController::class,'deliveries'])->name('deliveries');
        Route::post('/status_update', [DriverController::class,'status_update'])->name('status_update');
        //logistic-crm -- invoices
        Route::post('/create-invoice/{lead_id}', [InvoiceController::class,'createInvoice'])->name('createInvoice');
        Route::get('/show-invoice/{lead_id}', [InvoiceController::class,'showInvoice'])->name('showInvoice');
        Route::post('/confirm-invoice/{lead_id}', [InvoiceController::class,'confirmInvoice'])->name('confirmInvoice');
        Route::get('/payment-received/{lead_id}', [InvoiceController::class,'paymentReceived'])->name('paymentReceived');
        Route::post('/save-payment-received/{lead_id}', [InvoiceController::class,'savePaymentReceived'])->name('savePaymentReceived');

       
    });
    
});
