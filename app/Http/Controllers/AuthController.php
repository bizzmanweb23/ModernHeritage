<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CountryCode;
use App\Models\Role;
use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    //showing login page
    public function login()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect(route('admindashboard'));
        }
        elseif(Auth::check() && Auth::user()->isClient()){
            return redirect(route('home'));
        }

        return view('login');
    }

    //login logic
    public function userlogin(LoginValidation $request)
    {
        $validData = $request->validated();
        if (
            !Auth::attempt([
                'email' => $validData['email'],
                'password' => $validData['password'],
            ])
        ) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
        if (Auth::check() && Auth::user()->isInactive()) {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'User is inactive',
            ]);
        }
        if (Auth::check() && Auth::user()->isAdmin()) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            throw ValidationException::withMessages([
                'lemail' => __('auth.failed'),
            ]);
        }
        Session::put('username', Auth::user()->firstname);
        Session::put('userid', Auth::user()->unique_id);
        $request->session()->regenerate();
        if (!empty(session('url.intended'))) {
            return redirect(session('url.intended'));
        }
        return redirect(route('userlogin'));
    }

    // register logic
    public function register(RegisterValidation $request, $path = '')
    {
        $unique_id = User::orderBy('id', 'desc')->first();
        if ($unique_id) {
            $number = str_replace('MH', '', $unique_id->unique_id);
        } else {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MH000001';
        } else {
            $number = 'MH' . sprintf('%06d', $number + 1);
        }
        $phone = $request->country_code . $request->phone;
        if ($path == 'employee') {
            $role = 3;
        } elseif ($path == 'client') {
            $role = 2;
        }elseif ($path == 'user') {
                $role = 4;
        } else {
            $role = $request->role;
        }

        User::create([
            'unique_id' => $number,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role,
            'phone' => $phone,
            'status' => 1,
        ]);

        // Mail::to($request->email)->send(new RegisterNotification($request->firstname,$request->lastname));
        if (Auth::check() && Auth::user()->isAdmin()) {
            $route = 'users';
        } else {
            $route = 'userlogin';
        }
        return redirect(route($route))->with(
            'registerMsg',
            'Register Successfully'
        );
    }

    public function getRegister($path = '')
    {
        $countryCodes = CountryCode::get();
        $roles = Role::get();
        if (Auth::check() && Auth::user()->isAdmin()) {
            $view = 'frontend.admin.dashboard.adduser';
        } else {
            $view = 'register';
        }
        
        return view($view, [
            'countryCodes' => $countryCodes,
            'roles' => $roles,
            'path' => $path
        ]);
    }

    //logout
    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('userlogin'));
    }
}
