<?php

namespace App\Http\Controllers\API;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\GST;
use App\Models\Tag;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\CustomerContact;
use App\Models\PaymentTerms;
use App\Models\SalesPerson;
use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class APIEmployeeController extends Controller
{
    public function getEmployees()
    {
        $employee = Employee::get();
        $response = ['employee' => $employee];
        return response($response,200);
    }
}
