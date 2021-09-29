<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

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

    public function allUsersDetails()
    {
        $allUser = Client::where('role_id', '!=', 1)->get();

        return view('frontend.admin.dashboard.alluser', [
            'allUser' => $allUser,
        ]);
    }

    public function userDetails(Request $request)
    {
        if ($request->unique_id) {
            $col_name = 'unique_id';
            $col_value = $request->unique_id;
        } elseif ($request->firstname) {
            $col_name = 'firstname';
            $col_value = $request->firstname;
        }
        $user = Client::where($col_name, $col_value)->get();

        return view('frontend.admin.dashboard.alluser', ['allUser' => $user]);
    }

    public function memberData(Request $request, $id)
    {
        $user = Client::findOrFail($id);
        $route = explode('/', $request->path())[0];

        return view('frontend.admin.dashboard.memberData', [
            'user' => $user,
            'route' => $route,
        ]);
    }

    public function editUser(Request $request, $id)
    {
        $user = Client::findOrFail($id);

        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->device_id = $request->device_id;
        $user->device_name = $request->device_name;

        $user->save();

        return redirect(route('users'));
    }

    public function userStatus($id, $status)
    {
        $user = Client::findOrFail($id);

        $user->status = $status;

        $user->save();

        return redirect(route('users'));
    }

    public function createRole()
    {
        return view('frontend.admin.role.createRole');
    }

    public function saveRole(Request $request)
    {
        $data = $request->validate([
            'role_name' => 'required|unique:roles,name',
        ]);

        $role = new Role();

        $role->name = $data['role_name'];
        $role->guard_name = '0';

        $role->save();

        return redirect(route('users'));
    }
}
