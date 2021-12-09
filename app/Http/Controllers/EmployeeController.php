<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Department;
use Egulias\EmailValidator\Warning\DeprecatedComment;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //employeeManagement
    public function allEmployee()
    {
        $employees = Employee::get();
        return view('frontend.admin.employee.allEmployee',['employees' => $employees]);
    }

    public function addEmployee()
    {
        $countryCodes = CountryCode::get();
        $customer = Customer::get();
        $employee = Employee::get();
        return view('frontend.admin.employee.addEmployee',['customer' => $customer,
                                                            'countryCodes' => $countryCodes,
                                                            'employee' => $employee
                                                        ]);
    }
    
    public function saveEmployee(Request $request)
    {
        $data = $request->validate([
            'emp_name' => 'required',
            'job_position' => 'required',
            'work_email' => 'required|email:rfc,dns|unique:employees',
            'password' => 'required',
        ]);

        $unique_id = Employee::orderBy('id', 'desc')->first();
        if($unique_id)
        {
            $number = str_replace('MHE', '', $unique_id->unique_id);
        }
        else
        {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHE00001';
        } else {
            $number = "MHE" . sprintf("%05d", $number + 1);
        }

        if($request->file('emp_image')){
            $file_type = $request->file('emp_image')->extension();
            $file_path = $request->file('emp_image')->storeAs('images/employees',$number.'.'.$file_type,'public');
            $request->file('emp_image')->move(public_path('images/employees'),$number.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        if($request->file('other_id_file')){
            $other_id_file_type = $request->file('other_id_file')->extension();
            $other_id_file_path = $request->file('other_id_file')->storeAs('images/employees/ids',$number.'.'.$other_id_file_type,'public');
            $request->file('other_id_file')->move(public_path('images/employees/ids'),$number.'.'.$other_id_file_type);
        }
        else
        {
            $other_id_file_path = null;
        }

        //user table unique_id
        $unique_id_user = User::orderBy('id', 'desc')->first();
        if($unique_id_user)
        {
            $number_user = str_replace('MHU', '', $unique_id_user->unique_id);
        }
        else
        {
            $number_user = 0;
        }
        if ($number_user == 0) {
            $number_user = 'MHU00001';
        } else {
            $number_user = "MHU" . sprintf("%05d", $number_user + 1);
        }

        $user = new User;
        $user->unique_id = $number_user;
        $user->user_name = $request->emp_name;
        $user->email = $request->work_email;
        $user->password = Hash::make($data['password']);
        $user->user_id = $number;
        $user->status = 1;
        $user->user_type = "employee";
        $user->role_id = 3;
        $user->save();

        $employee = new Employee;
        $employee->unique_id = $number;
        $employee->emp_name = $request->emp_name;
        $employee->job_position = $request->job_position;
        $employee->work_mobile = $request->country_code_m . $request->work_mobile;
        $employee->work_phone = $request->country_code_p . $request->work_phone;
        $employee->work_email = $request->work_email;
        $employee->department = $request->department;
        $employee->manager = $request->manager;
        $employee->default_customer = json_encode($request->default_customer);
        $employee->emp_image = $file_path;
        $employee->contact_address = $request->contact_address;
        $employee->contact_email = $request->contact_email;
        $employee->contact_phone = $request->country_code_cp . $request->contact_phone;
        $employee->bank_accnt_no = $request->bank_accnt_no;
        $employee->home_work_distance = $request->home_work_distance;
        $employee->marital_status = $request->marital_status;
        $employee->edu_certificate_level = $request->edu_certificate_level;
        $employee->field_of_study = $request->field_of_study;
        $employee->school = $request->school;
        $employee->country = $request->country;
        $employee->identification_no = $request->identification_no;
        $employee->passport_no = $request->passport_no;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->place_of_birth = $request->place_of_birth;
        $employee->country_of_birth = $request->country_of_birth;
        $employee->other_id_name = $request->other_id_name;
        $employee->other_id_no = $request->other_id_no;
        $employee->other_id_file = $other_id_file_path;
        $employee->	status = 1;
        
        $employee->save();

        return redirect(route('allEmployee'));
    }

    public function allDepartment()
    {
        $departments = Department::get();
        return view('frontend.admin.employee.department.departments',['departments' => $departments]);
    }

    public function addDepartment()
    {
        $employee = Employee::get();
        return view('frontend.admin.employee.department.addDepartment',['employee' => $employee]);
    }

    public function saveDepartment(Request $request)
    {
        $data = $request->validate(['department_name' => 'required']);

        $department = new Department;
        $department->department_name = $request->department_name;
        $department->manager = $request->manager;
        $department->save();

        return redirect(route('departments'));
    }

}
