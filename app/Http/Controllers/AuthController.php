<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\CountryCode;
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

          return view('login');
      }

      //login logic
      public function userlogin(LoginValidation $request)
      {
        $validData = $request->validated();
        if (!Auth::attempt(['email' =>$validData['email'], 'password' => $validData['password']])) 
        {
          throw ValidationException::withMessages([
              'email' => __('auth.failed'),
          ]);
        }
        if(Auth::check() && Auth::user()->isInactive())
        {
          Auth::logout();
          throw ValidationException::withMessages([
            'email' => 'User is inactive',
        ]);
        }
        
        Session::put('username',  Auth::user()->firstname);
        Session::put('userid',  Auth::user()->unique_id);
        $request->session()->regenerate();
        if (!empty(session('url.intended'))) {
            return redirect(session('url.intended'));
        }
        return redirect(route('userlogin'));

      }

      // register logic
      public function register(RegisterValidation $request)
      {
  
          $unique_id = User::orderBy('id', 'desc')->first();
          if($unique_id)
          {
            $number = str_replace('GMI', '', $unique_id->unique_id);
          }
          else
          {
            $number = 0;
          }       
          if ($number == 0) {
              $number = 'GMI000001';
          } else {
              $number = "GMI" . sprintf("%06d", $number + 1);
          }
          $phone = $request->country_code . $request->phone;
          $role = $request->role;
          User::create([
              'unique_id' =>  $number,
              'firstname' => $request->firstname,
              'lastname' => $request->lastname,
              'email' => $request->email,
              'password' => Hash::make($request->password),
              'role_id' => 0,
              'phone' => $phone,
              
          ]);

          $role = $request->role;

  
          // Mail::to($request->email)->send(new RegisterNotification($request->firstname,$request->lastname));
          return redirect(route('userlogin'))->with('registerMsg', 'Register Successfully');
      }

      public function getRegister()
      {
        $countryCodes = DB::table('country_code')->get();
        $roles = DB::table('roles')->get();
        return view('register',['countryCodes' => $countryCodes, 'roles' => $roles]); 

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