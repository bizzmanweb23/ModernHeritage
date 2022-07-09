<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\SerializableClosure\Serializers\Signed;
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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ExpenseController;

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
Auth::routes();

Route::get("/", function () {
    return view("frontend.user.home.index");
});

Route::middleware('auth')->group(function () {
    Route::get("/home", [HomeController::class, "index"])->name("home");
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/productDetails', [ProductController::class, 'shop'])->name('productDetails');
    Route::get('/productShow/{id}',[ProductController::class,'show'])->name('productShow');
    Route::get('/shop/{id}',[ProductController::class,'shop'])->name('shop');   

});

Route::get('/logout', function () {
Auth::logout();
Session::flush();
});

//Backend

Route::get("admin/login", [AuthController::class, "login"])->name("adminlogin");
Route::post("/adminlogin", [AuthController::class, "adminlogin"])->name("adminLogin");

Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {


    //  Route::post("/login", [AuthController::class, "userlogin"])->name("adminlogin");

    Route::post('/userLogout', [AuthController::class, 'logoutUser'])->name('userLogout');

    //admin--dashboard
    Route::get("/admindashboard", [DashboardController::class, "index"])->name("admindashboard");

    //admin--userManagement
    Route::get('/index', [UserController::class, 'allUser'])->name('index');
    Route::get('/addUser', [UserController::class, 'addUser'])->name('addUser');
    Route::post('/saveUser', [UserController::class, 'saveUser'])->name('saveUser');
    Route::get('/userdetails/{id}', [UserController::class, 'userData']);
    Route::post('/useredit/{id}', [UserController::class, 'editUser']);
    Route::post('/save_user', [UserController::class, 'save_user'])->name('save_user');
    Route::get('/deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/viewUser/{id}', [UserController::class, 'viewUser'])->name('viewUser');
    Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
    Route::post('/update_user', [UserController::class, 'update_user'])->name('update_user');
    Route::get('/givePermission/{type}/', [UserController::class, 'givePermission']);
    Route::post('/givePermission', [UserController::class, 'givePermission_post'])->name('givePermission');

    //admin--customerManagement
    Route::get('/allcustomers', [CustomerController::class, 'allCustomerDetails'])->name('allcustomer');
    Route::get('/customer', [CustomerController::class, 'customerDetails'])->name('customer');
    Route::get('/customers', [CustomerController::class, 'addCustomer'])->name('addcustomer');
    Route::post('/customers', [CustomerController::class, 'saveCustomer'])->name('savecustomer');
    Route::get('/customerdetails/{id}', [CustomerController::class, 'customerData']);
    Route::get('/customer-contacts', [CustomerController::class, 'getCustomerContacts'])->name('getCustomerContacts');
    Route::post('/customeredit/{id}', [CustomerController::class, 'editCustomer']);
    Route::get('/customerstatus/{id}/{status}', [CustomerController::class, 'customerStatus']);
    Route::get('/viewCustomer/{id}/', [CustomerController::class, 'viewCustomer']);
    Route::get('/deleteCustomer/', [CustomerController::class, 'deleteCustomer'])->name('deleteCustomer');
    Route::get('/editCustomer/{id}/', [CustomerController::class, 'editCustomer']);
    Route::post('/updateCustomer/', [CustomerController::class, 'updateCustomer'])->name('updateCustomer');



    //admin--employeeManagement
    Route::get('/allemployee', [EmployeeController::class, 'allEmployee'])->name('allEmployee');
    Route::get('/addemployee', [EmployeeController::class, 'addEmployee'])->name('addEmployee');
    Route::post('/addemployee', [EmployeeController::class, 'saveEmployee'])->name('saveEmployee');
    Route::get('/employeedetails/{id}', [EmployeeController::class, 'employeeData']);
    Route::post('/employeeedit/{id}', [EmployeeController::class, 'employeeEdit']);
    Route::get('/job_positions', [EmployeeController::class, 'job_positions'])->name('job_positions');
    Route::get('/viewEmployee/{id}', [EmployeeController::class, 'viewEmployee'])->name('viewEmployee');
    Route::get('/editEmployee/{id}', [EmployeeController::class, 'editEmployee'])->name('editEmployee');
    Route::post('/updateEmployee', [EmployeeController::class, 'updateEmployee'])->name('updateEmployee');

    

   

    //Departments
    Route::get('/departments', [EmployeeController::class, 'allDepartment'])->name('departments');
    Route::get('/createdepartment', [EmployeeController::class, 'addDepartment'])->name('addDepartment');
    Route::post('/savedepartment', [EmployeeController::class, 'saveDepartment'])->name('saveDepartment');
    Route::get('/department-employees/{dept_id}', [EmployeeController::class, 'departmentEmployee'])->name('department.employees');
    Route::get('/editDepartment/{id}', [EmployeeController::class, 'editDepartment'])->name('editDepartment');
    Route::post('/updateDepartment', [EmployeeController::class, 'updateDepartment'])->name('updateDepartment');
    Route::get('/deleteDepartment', [EmployeeController::class, 'deleteDepartment'])->name('deleteDepartment');
    Route::get('/viewDepartment/{id}', [EmployeeController::class, 'viewDepartment'])->name('viewDepartment');

    

    //Job Positions
    Route::get('/jobpositions', [EmployeeController::class, 'allJobPosition'])->name('allJobPosition');
    Route::get('/addjobposition', [EmployeeController::class, 'addJobPosition'])->name('addJobPosition');
    Route::post('/savejobposition', [EmployeeController::class, 'saveJobPosition'])->name('saveJobPosition');
    Route::get('/editJobPosition/{id}', [EmployeeController::class, 'editJobPosition'])->name('editJobPosition');
    Route::post('/updateJobPosition', [EmployeeController::class, 'updateJobPosition'])->name('updateJobPosition');
    Route::get('/deleteJob', [EmployeeController::class, 'deleteJob'])->name('deleteJob');
    Route::get('/viewJobPosition/{id}', [EmployeeController::class, 'viewJobPosition'])->name('viewJobPosition');


    
    
  
    //admin--role
    // Route::get('/role', [DashboardController::class, 'createRole'])->name('createRole');




    //admin--CRM
    Route::get('/crm', [CrmController::class, 'getRequest'])->name('getRequest');
    Route::get('/searchrequest', [CrmController::class, 'searchCustomer'])->name('searchcustomer');
    // Route::get('/request', [CrmController::class,'addRequest'])->name('addrequest');
    Route::post('/request', [CrmController::class, 'saveRequest'])->name('saverequest');
    Route::get('/viewrequest/{lead_id}', [CrmController::class, 'viewRequest']);
    Route::get('/updatestage/{lead_id}/{stage_id}', [CrmController::class, 'updateStage']);
    Route::post('/updaterequest', [CrmController::class, 'updateRequest'])->name('updaterequest');

    //admin--quotation
    Route::get('/newquotation/{id}', [QuotationController::class, 'addQuotation']);
    Route::post('/savequotation', [QuotationController::class, 'saveQuotation'])->name('savequotation');
    Route::get('/searchproduct', [QuotationController::class, 'searchProduct'])->name('searchproduct');
    Route::post('/addproduct', [QuotationController::class, 'addProduct'])->name('addproduct');
    Route::get('/confirmquotation/{id}', [QuotationController::class, 'confirmQuotation']);
    Route::post('/confirmquotation/{id}', [QuotationController::class, 'postConfirmQuotation']);
    Route::get('/viewquotation/{lead_id}', [QuotationController::class, 'viewQuotation']);

    //admin---inventory
    Route::get('/inventory', [InventoryController::class, 'getinventory'])->name('inventory');
    Route::get('/allproducts', [InventoryController::class, 'allProducts'])->name('allproducts');
    Route::get('/addproduct', [InventoryController::class, 'addProduct'])->name('addproduct');
    Route::get('/allwarehouse', [InventoryController::class, 'allWarehouse'])->name('allwarehouse');
    Route::get('/allproductcategory', [InventoryController::class, 'allProductCategory'])->name('allproductcategory');
    Route::get('/addproductcategory', [InventoryController::class, 'addProductCategory'])->name('addproductcategory');
    Route::post('/addproductcategory', [InventoryController::class, 'saveProductCategory'])->name('addproductcategory');
    Route::get('/allattributes', [InventoryController::class, 'allAttributes'])->name('allattributes');
    Route::get('/addattributes', [InventoryController::class, 'addAttributes'])->name('addattributes');
    Route::post('/addattributes', [InventoryController::class, 'saveAttributes'])->name('addattributes');
    Route::get('/allUOMcategory', [InventoryController::class, 'allUOMcategory'])->name('allUOMcategory');
    Route::post('/saveUOMcategory', [InventoryController::class, 'saveUOMcategory'])->name('UOMcategory');
    Route::get('/allUOM', [InventoryController::class, 'allUOM'])->name('allUOM');
    Route::post('/saveuom', [InventoryController::class, 'saveUOM'])->name('saveuom');
    Route::post('/saveuom', [InventoryController::class, 'saveUOM'])->name('saveuom');
    Route::get('/allservices', [InventoryController::class, 'allServices'])->name('allServices');
    Route::post('/saveservices', [InventoryController::class, 'saveServices'])->name('saveServices');
    Route::post('/order_update', [OrdersController::class, 'orderUpdate'])->name('order_update');
    Route::get('/editCategory/{id}', [InventoryController::class, 'editCategory'])->name('editCategory');
    Route::post('/updateproductcategory', [InventoryController::class, 'updateproductcategory'])->name('updateproductcategory');
    Route::get('/deleteCategory', [InventoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::post('/saveProduct', [InventoryController::class, 'saveProduct'])->name('saveProduct');
    Route::get('/viewProduct/{id}', [InventoryController::class, 'viewProduct'])->name('viewProduct');
    Route::get('/editProduct/{id}', [InventoryController::class, 'editProduct'])->name('editProduct');
    Route::post('/updateProduct', [InventoryController::class, 'updateProduct'])->name('updateProduct');
    Route::get('/deleteProduct', [InventoryController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('/generateBarcode', [InventoryController::class, 'generateBarcode'])->name('generateBarcode');



    //order management
    Route::get('/order-management', [OrdersController::class, 'index'])->name('orderList');
    Route::get('/order-details/{id}', [OrdersController::class, 'orderDetails'])->name('orderDetails');
    Route::get('/assign_to_delivery/{id}', [OrdersController::class, 'assign_to_delivery'])->name('assign_to_delivery');
    Route::get('/createOrder', [OrdersController::class, 'createOrder'])->name('createOrder');
    Route::post('/addOrder', [OrdersController::class, 'addOrder'])->name('addOrder');
    Route::get('/collection_form', [OrdersController::class, 'collection_form'])->name('collection_form');
    Route::get('/order_collection', [OrdersController::class, 'order_collection'])->name('order_collection');
    Route::get('/order_collection/{id}', [OrdersController::class, 'order_collection_form'])->name('order_collection_form');
    
    //order status
    Route::get('/order-status', [OrdersController::class, 'orderStatus'])->name('orderStatus');
    Route::get('/addOrderStatus', [OrdersController::class, 'addOrderStatus'])->name('addOrderStatus');
    Route::post('/saveOrderStatus', [OrdersController::class, 'saveOrderStatus'])->name('saveOrderStatus');
    Route::get('/editStatus/{id}', [OrdersController::class, 'editStatus'])->name('editStatus');
    Route::post('/editOrderStatus', [OrdersController::class, 'editOrderStatus'])->name('editOrderStatus');
    Route::get('/deleteStatus/{id}', [OrdersController::class, 'deleteStatus'])->name('deleteStatus');
    Route::get('/orderStatusEdit/{id}', [OrdersController::class, 'orderStatusEdit'])->name('orderStatusEdit');
    Route::post('/addToDelivery', [DriverController::class, 'addToDelivery'])->name('addToDelivery');
    Route::get('/assign_to_driver/{id}', [OrdersController::class, 'assign_to_driver'])->name('assign_to_driver');
    Route::get('/order-edit/{id}', [OrdersController::class, 'orderEdit'])->name('orderEdit');
    Route::post('/order-update', [OrdersController::class, 'updateOrder'])->name('updateOrder');
    Route::get('/order-view/{id}', [OrdersController::class, 'orderView'])->name('orderView');
    //driver management
    Route::get('/drivers', [DriverController::class, 'drivers'])->name('drivers');
    Route::get('/addDriver', [DriverController::class, 'addDriver'])->name('addDriver');
    Route::get('/viewDriver/{id}', [DriverController::class, 'viewDriver'])->name('viewDriver');
    Route::get('/editDriver/{id}', [DriverController::class, 'editDriver'])->name('editDriver');

    //color
    Route::get('/colors', [ColorController::class, 'index'])->name('colors');
    Route::get('/addcolors', [ColorController::class, 'addcolors'])->name('addcolors');
    Route::post('/savecolors', [ColorController::class, 'savecolors'])->name('saveColors');
    Route::get('/editColor/{id}', [ColorController::class, 'editcolors'])->name('editColors');
    Route::post('/editColor', [ColorController::class, 'updatecolors'])->name('updateColors');
    Route::get('/deleteColor', [ColorController::class, 'deletecolor'])->name('deleteColor');

    //sizes
    Route::get('/sizes', [SizeController::class, 'index'])->name('sizes');
    Route::get('/addsizes', [SizeController::class, 'addSizes'])->name('addSizes');
    Route::post('/addSize', [SizeController::class, 'saveSize'])->name('saveSize');
    Route::get('/editSize/{id}', [SizeController::class, 'editSize'])->name('editSize');
    Route::post('/updateSize', [SizeController::class, 'updateSize'])->name('updateSize');
    Route::get('/deleteSize', [SizeController::class, 'deleteSize'])->name('deleteSize');

    //user profile
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user_profile');
    Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');



    //role management
    Route::get('/roles', [RoleController::class, 'allRoles'])->name('roles');
    Route::get('/createRole', [RoleController::class, 'createRole'])->name('createRole');
    Route::post('/role', [RoleController::class, 'saveRole'])->name('saveRole');
    Route::get('/editRole/{id}', [RoleController::class, 'editRole'])->name('editRole');
    Route::post('/updateRole', [RoleController::class, 'updateRole'])->name('updateRole');
    Route::get('/deleteRole', [RoleController::class, 'deleteRole'])->name('deleteRole');


    //sub category
    Route::get('/subCategory', [InventoryController::class, 'allSubCategory'])->name('allproductsubcategory');
    Route::get('/addsubCategory', [InventoryController::class, 'addsubcategory'])->name('addsubcategory');
    Route::post('/addprosubCategory', [InventoryController::class, 'addproductsubcategory'])->name('addproductsubcategory');
    Route::get('/deleteSubCategory', [InventoryController::class, 'deleteSubCategory'])->name('deleteSubCategory');
    Route::get('/editSubCategory/{id}', [InventoryController::class, 'editSubCategory'])->name('editSubCategory');
    Route::post('/updateproductsubcategory', [InventoryController::class, 'updateproductsubcategory'])->name('updateproductsubcategory');
    Route::get('/subcat', [InventoryController::class, 'subCat'])->name('subCat');

    //warehouse management
    Route::get('/warehouses', [WarehouseController::class, 'index'])->name('wareHouses');
    Route::get('/addWarehouse', [WarehouseController::class, 'addWarehouse'])->name('addWarehouse');
    Route::post('/saveWarehouse', [WarehouseController::class, 'saveWarehouse'])->name('saveWarehouse');
    Route::get('/editWarehouse/{id}', [WarehouseController::class, 'editWarehouse'])->name('editwareHouses');
    Route::post('/updateWarehouse', [WarehouseController::class, 'updateWarehouse'])->name('updateWarehouse');
    Route::get('/viewWarehouse/{id}', [WarehouseController::class, 'viewWarehouse'])->name('viewWarehouse');
    Route::get('/deleteWarehouse', [WarehouseController::class, 'deleteWarehouse'])->name('deleteWarehouse');

    //warehouse product management
    Route::get('/proList/{id}', [WarehouseController::class, 'proList'])->name('proList');
    Route::get('/addProductStock', [WarehouseController::class, 'addProductStock'])->name('addProductStock');
    Route::get('/warehouseProducts', [WarehouseController::class, 'warehouseProducts'])->name('warehouseProducts');
    Route::post('/saveWarePro', [WarehouseController::class, 'saveWarePro'])->name('saveWarePro');
    Route::get('/editWarePro/{id}', [WarehouseController::class, 'editWarePro'])->name('editWarePro');
    Route::post('/updateWarePro', [WarehouseController::class, 'updateWarePro'])->name('updateWarePro');
    Route::get('/viewWarePro/{id}', [WarehouseController::class, 'viewWarePro'])->name('viewWarePro');


    //warehouses
    Route::get('/otherWareHouse', [WarehouseController::class, 'otherWareHouse'])->name('otherWareHouse');

    
    Route::get('/assign_driver/{id}', [OrdersController::class, 'assign_driver'])->name('assign_driver_for_collection');
    Route::post('/saveCollection', [OrdersController::class, 'saveCollection'])->name('saveCollection');
    Route::get('/orderProductStatus', [OrdersController::class, 'orderProductStatus'])->name('orderProductStatus');
    Route::get('/other_collection/{id}', [OrdersController::class, 'other_collection'])->name('other_collection');
    Route::post('/otherCollection', [OrdersController::class, 'otherCollection'])->name('otherCollection');


    
 
    Route::get('/payStructure', [EmployeeController::class, 'payStructure'])->name('payStructure');
    Route::get('/payStructureAdd', [EmployeeController::class, 'payStructureAdd'])->name('payStructureAdd');
    Route::post('/payStructureCreate', [EmployeeController::class, 'payStructureCreate'])->name('payStructureCreate');
    Route::get('/editPayStructure/{id}', [EmployeeController::class, 'editPayStructure'])->name('editPayStructure');
    Route::post('/payStructureUpdate', [EmployeeController::class, 'payStructureUpdate'])->name('payStructureUpdate');
    Route::post('/postSalary', [EmployeeController::class, 'postSalary'])->name('postSalary');


    Route::get('/salary', [EmployeeController::class, 'salaryEmployee'])->name('salaryEmployee');
    Route::get('/addSalary', [EmployeeController::class, 'addSalary'])->name('addSalary');
    Route::get('/editSalary/{id}', [EmployeeController::class, 'editSalary'])->name('editSalary');
    Route::post('/updateSalary', [EmployeeController::class, 'updateSalary'])->name('updateSalary');
    Route::get('/deleteEmployeeSalary', [EmployeeController::class, 'deleteEmployeeSalary'])->name('deleteEmployeeSalary');
    Route::get('/generatePayslip/{id}', [EmployeeController::class, 'generatePayslip'])->name('generatePayslip');
    
    Route::get('/tripDetails', [EmployeeController::class, 'tripDetails'])->name('tripDetails');
    //Holiday
    Route::get('/holidayList', [HolidayController::class, 'holidayList'])->name('holidayList');
    Route::get('/addHoliday', [HolidayController::class, 'addHoliday'])->name('addHoliday');
    Route::post('/saveHoliday', [HolidayController::class, 'saveHoliday'])->name('saveHoliday');
    Route::get('/editHoliday/{id}', [HolidayController::class, 'editHoliday'])->name('editHoliday');
    Route::post('/updateHoliday', [HolidayController::class, 'updateHoliday'])->name('updateHoliday');
    Route::get('/deleteHoliday', [HolidayController::class, 'deleteHoliday'])->name('deleteHoliday');

    //Leave structure
    Route::get('/leave_structure', [HolidayController::class, 'leaveStructure'])->name('leaveStructure');
    Route::get('/addleaveStructure', [HolidayController::class, 'addleaveStructure'])->name('addleaveStructure');
    Route::post('/addleave', [HolidayController::class, 'addleave'])->name('addleave');
    Route::get('/deleteLeaveStructure', [HolidayController::class, 'deleteLeaveStructure'])->name('deleteLeaveStructure');
    Route::get('/editLeave/{id}', [HolidayController::class, 'editLeave'])->name('editLeave');
    Route::post('/updateLeave', [HolidayController::class, 'updateLeave'])->name('updateLeave');

    //attendance
    Route::get('/attendanceDetails', [HolidayController::class, 'attendanceDetails'])->name('attendanceDetails');
    Route::post('/exportAttendanceSheet', [HolidayController::class, 'exportAttendanceSheet'])->name('exportAttendanceSheet');
    Route::get('/getEmployee', [HolidayController::class, 'getEmployee'])->name('getEmployee');
    Route::post('/status_update_leave', [HolidayController::class, 'status_update_leave'])->name('status_update_leave');



    Route::get('/giveAttendance', [EmployeeController::class, 'giveAttendance'])->name('giveAttendance');
    Route::get('/addAttendance', [EmployeeController::class, 'addAttendance'])->name('addAttendance');
    Route::post('/postAttendance', [EmployeeController::class, 'postAttendance'])->name('postAttendance');
    Route::get('/editLoginTime/{id}', [EmployeeController::class, 'editLoginTime'])->name('editLoginTime');
    Route::post('/updateAttendance', [EmployeeController::class, 'updateAttendance'])->name('updateAttendance');
    Route::get('/employeeLeave', [EmployeeController::class, 'employeeLeave'])->name('employeeLeave');
    Route::get('/addLeave', [EmployeeController::class, 'addLeave'])->name('addLeave');
    Route::post('/postLeave', [EmployeeController::class, 'postLeave'])->name('postLeave');
    Route::get('/editLeave/{id}', [EmployeeController::class, 'editLeave'])->name('editLeave');
    Route::post('/updateLeave', [EmployeeController::class, 'updateLeave'])->name('updateLeave');

    //claim management
    Route::get('/employeeClaims', [EmployeeController::class, 'employeeClaims'])->name('employeeClaims');
    Route::get('/addClaims', [EmployeeController::class, 'addClaims'])->name('addClaims');
    Route::post('/addClaims', [EmployeeController::class, 'postClaim'])->name('postClaim');
    Route::get('/editClaim/{id}', [EmployeeController::class, 'editClaim'])->name('editClaim');
    Route::post('/updateClaim', [EmployeeController::class, 'updateClaim'])->name('updateClaim');
    Route::get('/deleteClaim', [EmployeeController::class, 'deleteClaim'])->name('deleteClaim');
    //claim management admin panel
    Route::get('/claims', [EmployeeController::class, 'claims'])->name('claims');
    Route::post('/status_update_claim', [EmployeeController::class, 'status_update_claim'])->name('status_update_claim');
    Route::get('/viewClaim/{id}', [EmployeeController::class, 'viewClaim'])->name('viewClaim');
    //employee leave
    Route::get('/employeeLeaves', [EmployeeController::class, 'employeeLeaves'])->name('employeeLeaves');

    //Expense Reports
    Route::get('/allExpenses', [ExpenseController::class, 'allExpenses'])->name('allExpenses');
    Route::get('/addExpenses', [ExpenseController::class, 'addExpenses'])->name('addExpenses');
    Route::post('/saveExpenses', [ExpenseController::class, 'saveExpenses'])->name('saveExpenses');
    Route::get('/deleteExpense', [ExpenseController::class, 'deleteExpense'])->name('deleteExpense');
    Route::get('/allExpensesReports', [ExpenseController::class, 'allExpensesReports'])->name('allExpensesReports');


   //Sales Reports
   Route::get('/allSalesReports', [ExpenseController::class, 'allSalesReports'])->name('allSalesReports');
   Route::post('/exportSalesReport', [ExpenseController::class, 'exportSalesReport'])->name('exportSalesReport');
   Route::post('/exportExpensesReport', [ExpenseController::class, 'exportExpensesReport'])->name('exportExpensesReport');


   //allClientReports
   Route::get('/allClientReports', [ExpenseController::class, 'allClientReports'])->name('allClientReports');
   Route::post('/exportCustomerReport', [ExpenseController::class, 'exportCustomerReport'])->name('exportCustomerReport');
   Route::get('/kb_articles', [ExpenseController::class, 'kb_articles'])->name('kb_articles');
   Route::get('/addArticles', [ExpenseController::class, 'addArticles'])->name('addArticles');
   Route::post('/saveArticle', [ExpenseController::class, 'saveArticle'])->name('saveArticle');
   Route::get('/deleteArticle', [ExpenseController::class, 'deleteArticle'])->name('deleteArticle');
   Route::get('/editArticle/{id}', [ExpenseController::class, 'editArticle'])->name('editArticle');
   Route::post('/updateArticle', [ExpenseController::class, 'updateArticle'])->name('updateArticle');
  
  
   
    //admin--logistic
    Route::group(['prefix' => 'logistic', 'middleware' => 'admin_auth'], function () {

        //admin--logistic--client
        Route::get("/allclients", [LogisticController::class, "allClients"])->name("allclients");
        Route::get("/saveclient", [LogisticController::class, "addClient"])->name("saveclient");
        Route::post("/saveclient", [LogisticController::class, "saveClient"])->name("saveclient");

        //admin--logistic--crm
        Route::get('/crm', [LogisticController::class, 'getRequest'])->name('logistic_crm');
        Route::get('/addrequest', [LogisticController::class, 'addRequest'])->name('addLogisticLead');
        Route::post('/addrequest', [LogisticController::class, 'saveRequest'])->name('addLogisticLead');
        Route::get('/searchcontact', [LogisticController::class, 'searchContact'])->name('searchcontact');
        Route::get('/viewrequest/{lead_id}/{prev_route?}', [LogisticController::class, 'viewRequest']);
        Route::post('/updaterequest/{lead_id}', [LogisticController::class, 'updateRequest']);
        Route::get('/update-stage/{lead_id}/{stage_id}', [LogisticController::class, 'updateLogisticStage']);
        Route::post('/update-dashboard', [LogisticController::class, 'updateLogisticDashboard'])->name('assign-driver');

        ///admin--logistic-quotation
        Route::get('/newquotation/{lead_id}', [LogisticController::class, 'addQuotation']);
        Route::post('/newquotation/{lead_id}', [LogisticController::class, 'saveQuotation']);
        Route::get('/viewquotation/{lead_id}', [LogisticController::class, 'viewQuotation']);

        //admin--logistic--sales--person Activity
        Route::get('/allSalesperson', [SalesController::class, 'allSalesperson'])->name('salespersons');
        Route::get('/assignedleads/{salesperson_id}', [SalesController::class, 'assignedLeads'])->name('assignedleads');

        //admin--logistic--dashboard
        Route::get('/viewCalander1', [LogisticController::class, 'viewcalander'])->name('ViewCalander1');
        Route::post('/search-order/{order_no}', [LogisticController::class, 'SearchOrder'])->name('Search');
        Route::get('/viewDriverCalander', [LogisticController::class, 'viewdrivercalander'])->name('ViewDriverCalander');
        Route::get('/driver_status', [LogisticController::class, 'driver_status'])->name('driver_status');
        Route::post('/chekDriver', [LogisticController::class, 'chekDriver'])->name('chekDriver');



        //Testing for Ajax
        Route::post('/assign-driver', [LogisticController::class, 'AssignDriverAjax']);
        Route::get('/driver-listing', [LogisticController::class, 'listing']);


        Route::get('/viewCalander', [LogisticController::class, 'viewcalander1'])->name('ViewCalander');


        //admin--logistic--delivery_orders
        Route::get('/delivery-orders', [LogisticController::class, 'viewDeliveryOrders'])->name('Delivery-Orders');
        Route::get('/detailed-delivery-orders/{lead_id}', [LogisticController::class, 'viewDetailedOrders'])->name('DetailedOrders');


        //fleet-management
        Route::get('/allvehicles', [FleetController::class, 'allVehicles'])->name('allVehicles');
        Route::get('/addvehicles', [FleetController::class, 'addVehicles'])->name('addVehicles');
        Route::post('/savevehicle', [FleetController::class, 'saveVehicle'])->name('saveVehicle');
        Route::get('/allbrands', [FleetController::class, 'allBrands'])->name('allBrands');
        Route::get('/addbrands', [FleetController::class, 'addBrands'])->name('addBrands');
        Route::post('/savebrands', [FleetController::class, 'saveBrands'])->name('saveBrands');
        Route::get('/deleteBrand', [FleetController::class, 'deleteBrand'])->name('deleteBrand');
        Route::get('/editBrand/{id}', [FleetController::class, 'editBrand'])->name('editBrand');
        Route::post('/updateBrands', [FleetController::class, 'updateBrands'])->name('updateBrands');
        Route::get('/deleteVehicle', [FleetController::class, 'deleteVehicle'])->name('deleteVehicle');
        Route::get('/editVehicle/{id}', [FleetController::class, 'editVehicle'])->name('editVehicle');
        Route::get('/viewVehicle/{id}', [FleetController::class, 'viewVehicle'])->name('viewVehicle');


        //maintance
        Route::get('/maintenance', [FleetController::class, 'maintenance'])->name('maintenance');
        Route::get('/addMaintenance', [FleetController::class, 'addMaintenance'])->name('addMaintenance');
        Route::post('/saveMaintenance', [FleetController::class, 'saveMaintenance'])->name('saveMaintenance');
        Route::get('/editMaintenance/{id}', [FleetController::class, 'editMaintenance'])->name('editMaintenance');
        Route::post('/updateMaintenance', [FleetController::class, 'updateMaintenance'])->name('updateMaintenance');
        Route::get('/viewMaintenance/{id}', [FleetController::class, 'viewMaintenance'])->name('viewMaintenance');
        Route::get('/deleteMaintenance', [FleetController::class, 'deleteMaintenance'])->name('deleteMaintenance');


        
        
        Route::get('/allmodels', [FleetController::class, 'allModels'])->name('allModels');
        Route::get('/addmodels', [FleetController::class, 'addModels'])->name('addModels');
        Route::post('/savemodels', [FleetController::class, 'saveModels'])->name('saveModels');
        Route::get('/editModel/{id}', [FleetController::class, 'editModel'])->name('editModel');
        Route::post('/updateModels', [FleetController::class, 'updateModels'])->name('updateModels');
        Route::get('/deleteModel/', [FleetController::class, 'deleteModel'])->name('deleteModel');

       
       Route::get('/models', [FleetController::class, 'models'])->name('model');

       Route::post('/updateVehicle', [FleetController::class, 'updateVehicle'])->name('updateVehicle');
       
      
        
        //driver-management
        Route::get('/driver-overview', [DriverController::class, 'driverOverview'])->name('driverOverview');
        Route::get('/deliveries/{delivery_time}', [DriverController::class, 'allDeliveries'])->name('allDeliveries');
        Route::get('/deliveries', [DriverController::class, 'deliveries'])->name('deliveries');
        Route::post('/status_update', [DriverController::class, 'status_update'])->name('status_update');
        //logistic-crm -- invoices
        Route::post('/create-invoice/{lead_id}', [InvoiceController::class, 'createInvoice'])->name('createInvoice');
        Route::get('/show-invoice/{lead_id}', [InvoiceController::class, 'showInvoice'])->name('showInvoice');
        Route::post('/confirm-invoice/{lead_id}', [InvoiceController::class, 'confirmInvoice'])->name('confirmInvoice');
        Route::get('/payment-received/{lead_id}', [InvoiceController::class, 'paymentReceived'])->name('paymentReceived');
        Route::post('/save-payment-received/{lead_id}', [InvoiceController::class, 'savePaymentReceived'])->name('savePaymentReceived');
    });
});
