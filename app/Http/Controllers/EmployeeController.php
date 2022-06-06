<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Department;
use App\Models\JobPosition;
use Egulias\EmailValidator\Warning\DeprecatedComment;
use Illuminate\Support\Facades\Hash;
use DB;

class EmployeeController extends Controller
{
  

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
        $department = Department::get();
        $jobPosition = JobPosition::get();
        return view('frontend.admin.employee.addEmployee',['customer' => $customer,
                                                            'countryCodes' => $countryCodes,
                                                            'employee' => $employee,
                                                            'department' => $department,
                                                            'jobPosition' => $jobPosition,
                                                        ]);
    }
    
    public function saveEmployee(Request $request)
    {
        $data = $request->validate([
            'emp_name' => 'required',
            'job_position' => 'required',
            'work_email' => 'required|email:rfc,dns|unique:employees',
         
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

        // $user = new User;
        // $user->unique_id = $number_user;
        // $user->user_name = $request->emp_name;
        // $user->email = $request->work_email;
        // $user->password = Hash::make($data['password']);
        // $user->user_id = $number;
        // $user->status = 1;
        // $user->user_type = "employee";
        // $user->role_id = 3;
        // $user->save();

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
        if($request->type =='D')
        {
            $max=DB::table('employees')->max('order_id');
        
            $employee->order_id = $max+1;
        }
        else{
            $employee->order_id = '';
        }
        $employee->	status = 1;
        
        $employee->save();
        if($request->type =='D')
        {
            
            return redirect(route('drivers'));
        }
      else{
        return redirect(route('allEmployee'));
      }
       
    }

    public function employeeData($id)
    {
        $employee = Employee::leftjoin('departments', 'employees.department', '=', 'departments.id')
                            ->leftjoin('job_positions','employees.job_position','=','job_positions.id')
                            ->leftjoin('employees as manager', 'employees.manager', '=', 'manager.id')
                            ->where('employees.id', $id)
                            ->select(
                                'employees.*',
                                'departments.department_name',
                                'manager.emp_name as manager_name',
                                'job_positions.position_name'
                            )
                            ->first();

        $customer = Customer::get();
        $selected_customers = json_decode($employee->default_customer);
        $selected_customers_name = [];
        if(isset($selected_customers)){
            foreach($customer as $c){
                if(in_array($c->id,$selected_customers)){
                    array_push($selected_customers_name, $c->customer_name);
                }
            }
        }
        $countryCodes = CountryCode::get();
        $employees = Employee::where('id','!=',$id)->get();
        $department = Department::get();
        $jobPosition = JobPosition::get();
        return view('frontend.admin.employee.employeeData',['customer' => $customer,
                                                            'countryCodes' => $countryCodes,
                                                            'employees' => $employees,
                                                            'employee' => $employee,
                                                            'department' => $department,
                                                            'jobPosition' => $jobPosition,
                                                            'selected_customers' => $selected_customers,
                                                            'selected_customers_name' => $selected_customers_name,
                                                        ]);

    }

    public function employeeEdit(Request $request, $id)
    {
        $data = $request->validate([
            'emp_name' => 'required',
            'job_position' => 'required',
            'work_email' => 'required|email:rfc,dns',
        ]);
        $employee = Employee::findOrFail($id);

        if($request->file('emp_image')){
            $file_type = $request->file('emp_image')->extension();
            $file_path = $request->file('emp_image')->storeAs('images/employees',$employee->unique_id.'.'.$file_type,'public');
            $request->file('emp_image')->move(public_path('images/employees'),$employee->unique_id.'.'.$file_type);
        }
        else
        {
            $file_path = $employee->emp_image;
        }

        if($request->file('other_id_file')){
            $other_id_file_type = $request->file('other_id_file')->extension();
            $other_id_file_path = $request->file('other_id_file')->storeAs('images/employees/ids',$employee->unique_id.'.'.$other_id_file_type,'public');
            $request->file('other_id_file')->move(public_path('images/employees/ids'),$employee->unique_id.'.'.$other_id_file_type);
        }
        else
        {
            $other_id_file_path = $employee->other_id_file;
        }

        //user table unique_id
        // $user = User::where('user_id','=',$employee->unique_id)->first();
        // $user->user_name = $request->emp_name;
        // $user->email = $request->work_email;
        // $user->save();

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
        $employee->status = $request->status;
        $employee->save();

        if($request->type =='D')
        {
            
            return redirect(route('drivers'));
        }
      else{
        return redirect('admin/employeedetails/'.$id);
      }

      //  return redirect('admin/employeedetails/'.$id);
    }

    public function allDepartment(Request $request)
    {
        if(isset($request->status))
        {
            if($request->status != 'all')
            {
                $departments = Department::where('status',$request->status)->get();
            }
            else
            {
                $departments = Department::get();
            }
           
        }
        else
        {
            $departments = Department::get();
        }
      
        return view('frontend.admin.employee.department.departments',['departments' => $departments]);
    }

    public function addDepartment()
    {
        $employee = Employee::get();
        return view('frontend.admin.employee.department.addDepartment',['employee' => $employee]);
    }

    public function saveDepartment(Request $request)
    {
      $request->validate(['department_name' => 'required|unique:departments,department_name']);

        $department = new Department;
        $department->department_name = $request->department_name;
        $department->manager = $request->manager;
        $department->status = $request->status;
        $department->save();

        return redirect(route('departments'))->with('message','Department inserted successfully');
    }

    public function departmentEmployee($dept_id)
    {
        $employees = Employee::where('employees.department', '=', $dept_id)->get();

        return view('frontend.admin.employee.allEmployee',['employees' => $employees]);
    }

    public function allJobPosition()
    {
        $jobPositions = JobPosition::get();
        return view('frontend.admin.employee.job_position.index',['jobPositions' => $jobPositions]);
    }

    public function addJobPosition()
    {
        $employee = Employee::get();
        return view('frontend.admin.employee.job_position.addJobPosition',['employee' => $employee]);
    }
    
    public function saveJobPosition(Request $request)
    {
        $data = $request->validate(['position_name' => 'required']);
        
        $jobPosition = new JobPosition;
        $jobPosition->position_name = $request->position_name;
        $jobPosition->position_description = $request->position_description;
        $jobPosition->manager = $request->manager;
        $jobPosition->save();
        
        return redirect(route('allJobPosition'))->with('message','Department inserted successfully');
    }
    public function  editDepartment($id)
    {
        $employee = Employee::get();
        $department = Department::where('id',$id)->first();
        return view('frontend.admin.employee.department.edit',['department' => $department,'employee'=>$employee]);
    }
    public function updateDepartment(Request $request)
    {
        $request->validate(['department_name' => 'required|unique:departments,department_name,'.$request->id]);

        $department = Department::find($request->id);
        $department->department_name = $request->department_name;
        $department->manager = $request->manager;
        $department->status = $request->status;
        $department->save();

        return redirect(route('departments'))->with('message','Department updated successfully');
    }

    public function deleteDepartment(Request $request)
    {
        Department::where('id',$request->id)->delete();
        return json_encode(1);
    }

    public function viewDepartment($id)
    {
        $data['data']=Department::where('id',$id)->first();
        return view('frontend.admin.employee.department.view',$data);
    }
}
