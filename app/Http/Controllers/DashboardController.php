<?php

namespace App\Http\Controllers;

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

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.admin.dashboard.index');
    }

    // public function createRole()
    // {
    //     return view('frontend.admin.role.createRole');
    // }

    // public function saveRole(Request $request)
    // {
    //     $data = $request->validate([
    //         'role_name' => 'required|unique:roles,name',
    //     ]);

    //     $role = new Role();

    //     $role->name = $data['role_name'];
    //     $role->guard_name = '0';

    //     $role->save();

    //     return redirect(route('users'));
    // }
}
