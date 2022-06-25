<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Department;
use App\Models\JobPosition;
use App\Models\Country;
use App\Models\PayStructure;
use App\Models\EmployeeSalary;
use Egulias\EmailValidator\Warning\DeprecatedComment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class EmployeeController extends Controller
{


    //employeeManagement
    public function allEmployee(Request $request)
    {

       
        $jobPositions=JobPosition::where('status',1)->get();
        if(isset($request->job_position_id))
        {
            $employees = Employee::where('job_position',$request->job_position_id)->get();
 
        }
        else
        {
            $employees = Employee::get();
        }

        return view('frontend.admin.employee.allEmployee', ['employees' => $employees,'jobPositions' => $jobPositions]);
    }

    public function addEmployee()
    {
        $countryCodes = CountryCode::get();
        $customer = DB::table('customer_management')->get();
        $employee = Employee::get();
        $department = Department::where('status',1)->get();
        $jobPosition = JobPosition::where('status',1)->get();
        $countries = Country::get();
        return view('frontend.admin.employee.addEmployee', [
            'customer' => $customer,
            'countryCodes' => $countryCodes,
            'employee' => $employee,
            'department' => $department,
            'jobPosition' => $jobPosition,
            'countries' => $countries,
        ]);
    }

    public function saveEmployee(Request $request)
    {

      
        $data = $request->validate([
            'emp_name' => 'required',
            'job_position' => 'required',
            'work_email' => 'required|email|unique:users,email',
        ]);

        $unique_id = Employee::orderBy('id', 'desc')->first();
        if ($unique_id) {
            $number = str_replace('MHE', '', $unique_id->unique_id);
        } else {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHE00001';
        } else {
            $number = "MHE" . sprintf("%05d", $number + 1);
        }

        if ($request->file('emp_image')) {
            $file_type = $request->file('emp_image')->extension();
            $file_path = $request->file('emp_image')->storeAs('images/employees', $number . '.' . $file_type, 'public');
            $request->file('emp_image')->move(public_path('images/employees'), $number . '.' . $file_type);
        } else {
            $file_path = null;
        }

        if ($request->file('other_id_file')) {
            $other_id_file_type = $request->file('other_id_file')->extension();
            $other_id_file_path = $request->file('other_id_file')->storeAs('images/employees/ids', $number . '.' . $other_id_file_type, 'public');
            $request->file('other_id_file')->move(public_path('images/employees/ids'), $number . '.' . $other_id_file_type);
        } else {
            $other_id_file_path = null;
        }
        if ($request->file('driving_license')) {
            $driving_license = $request->file('driving_license')->extension();
            $driving_license_path = $request->file('driving_license')->storeAs('images/employees/ids', $number . '.' . $driving_license, 'public');
            $request->file('driving_license')->move(public_path('images/employees/ids'), $number . '.' . $driving_license_path);
        } else {
            $driving_license_path = null;
        }

        //user table unique_id
        $unique_id_user = User::orderBy('id', 'desc')->first();
        if ($unique_id_user) {
            $number_user = str_replace('MHU', '', $unique_id_user->unique_id);
        } else {
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
        $user->password = Hash::make($request->password);
        $user->user_id = $number;
        $user->status = 1;
        $user->user_type = "employee";
        $user->role_id = 3;
        $user->user_image = $file_path;
        $user->save();

        DB::table('user_address')->insert([
            'address_1' => $request->contact_address,
            'country' => $request->country,
            'mobile' => $request->country_code_m . $request->work_mobile,
            'user_id' => $user->id,
        ]);



        $employee = new Employee;
        $employee->unique_id = $number;
        $employee->emp_name = $request->emp_name;
        $employee->job_position = $request->job_position;
        $employee->work_mobile = $request->country_code_m . $request->work_mobile;
        $employee->work_phone = $request->country_code_p . $request->work_phone;
        $employee->work_email = $request->work_email;
        $employee->department = $request->department;
        $employee->manager = $request->manager;
        $employee->default_customer = implode(',', $request->default_customer);
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
        $employee->ren_rate = $request->ren_rate;
        $employee->blood_grp = $request->blood_grp;
        $employee->medical_con = $request->medical_con;
        $employee->drug_allergy = $request->drug_allergy;
        $employee->vehicle_no = $request->vehicle_no;
        $employee->driving_license = $driving_license_path;
        $employee->expiry_date = $request->expiry_date;
        $employee->status = 1;
        $employee->save();

        return redirect(route('allEmployee'));
    }

    public function employeeData($id)
    {
        $employee = Employee::leftjoin('departments', 'employees.department', '=', 'departments.id')
            ->leftjoin('job_positions', 'employees.job_position', '=', 'job_positions.id')
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
        if (isset($selected_customers)) {
            foreach ($customer as $c) {
                if (in_array($c->id, $selected_customers)) {
                    array_push($selected_customers_name, $c->customer_name);
                }
            }
        }
        $countryCodes = CountryCode::get();
        $employees = Employee::where('id', '!=', $id)->get();
        $department = Department::get();
        $jobPosition = JobPosition::get();
        return view('frontend.admin.employee.employeeData', [
            'customer' => $customer,
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
            'work_email' => 'required|email|unique:users',
        ]);
        $employee = Employee::findOrFail($id);

        if ($request->file('emp_image')) {
            $file_type = $request->file('emp_image')->extension();
            $file_path = $request->file('emp_image')->storeAs('images/employees', $employee->unique_id . '.' . $file_type, 'public');
            $request->file('emp_image')->move(public_path('images/employees'), $employee->unique_id . '.' . $file_type);
        } else {
            $file_path = $employee->emp_image;
        }

        if ($request->file('other_id_file')) {
            $other_id_file_type = $request->file('other_id_file')->extension();
            $other_id_file_path = $request->file('other_id_file')->storeAs('images/employees/ids', $employee->unique_id . '.' . $other_id_file_type, 'public');
            $request->file('other_id_file')->move(public_path('images/employees/ids'), $employee->unique_id . '.' . $other_id_file_type);
        } else {
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
        $employee->default_customer = implode(',', $request->default_customer);
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

        if ($request->type == 'D') {

            return redirect(route('drivers'));
        } else {
            return redirect('admin/employeedetails/' . $id);
        }

        //  return redirect('admin/employeedetails/'.$id);
    }

    public function allDepartment(Request $request)
    {
        if (isset($request->status)) {
            if ($request->status != 'all') {
                $departments = Department::where('status', $request->status)->get();
            } else {
                $departments = Department::get();
            }
        } else {
            $departments = Department::get();
        }

        return view('frontend.admin.employee.department.departments', ['departments' => $departments]);
    }

    public function addDepartment()
    {
        $employee = Employee::get();
        return view('frontend.admin.employee.department.addDepartment', ['employee' => $employee]);
    }

    public function saveDepartment(Request $request)
    {
        $request->validate(['department_name' => 'required|unique:departments,department_name']);

        $department = new Department;
        $department->department_name = $request->department_name;
        $department->manager = $request->manager;
        $department->status = $request->status;
        $department->save();

        return redirect(route('departments'))->with('message', 'Department inserted successfully');
    }

    public function departmentEmployee($dept_id)
    {
        $employees = Employee::where('employees.department', '=', $dept_id)->get();

        return view('frontend.admin.employee.allEmployee', ['employees' => $employees]);
    }
    public function allJobPosition(Request $request)
    {
        if (isset($request->status)) {
            if ($request->status != 'all') {
                $jobPositions = JobPosition::select('departments.department_name', 'job_positions.*')
                    ->join('departments', 'departments.id', 'job_positions.dpt_id')
                    ->where('job_positions.status', $request->status)
                    ->get();
            } else {
                $jobPositions = JobPosition::select('departments.department_name', 'job_positions.*')
                    ->join('departments', 'departments.id', 'job_positions.dpt_id')

                    ->get();
            }
        } else {
            $jobPositions = JobPosition::select('departments.department_name', 'job_positions.*')
                ->join('departments', 'departments.id', 'job_positions.dpt_id')

                ->get();
        }


        return view('frontend.admin.employee.job_position.index', ['jobPositions' => $jobPositions]);
    }

    public function addJobPosition()
    {
        $employee = Employee::get();
        $data['department'] = Department::where('status', 1)->get();
        return view('frontend.admin.employee.job_position.addJobPosition', ['employee' => $employee], $data);
    }
    public function saveJobPosition(Request $request)
    {
        $data = $request->validate(['position_name' => 'required']);

        $jobPosition = new JobPosition;
        $jobPosition->position_name = $request->position_name;
        $jobPosition->position_description = $request->position_description;
        $jobPosition->manager = $request->manager;
        $jobPosition->dpt_id = $request->dpt_id;
        $jobPosition->status = $request->status;
        $jobPosition->save();

        return redirect(route('allJobPosition'))->with('message', 'Job position inserted successfully');
    }
    public function  editDepartment($id)
    {
        $employee = Employee::get();
        $department = Department::where('id', $id)->first();
        return view('frontend.admin.employee.department.edit', ['department' => $department, 'employee' => $employee]);
    }
    public function updateDepartment(Request $request)
    {
        $request->validate(['department_name' => 'required|unique:departments,department_name,' . $request->id]);

        $department = Department::find($request->id);
        $department->department_name = $request->department_name;
        $department->manager = $request->manager;
        $department->status = $request->status;
        $department->save();

        return redirect(route('departments'))->with('message', 'Department updated successfully');
    }

    public function deleteDepartment(Request $request)
    {
        Department::where('id', $request->id)->delete();
        return json_encode(1);
    }

    public function viewDepartment($id)
    {
        $data['data'] = Department::where('id', $id)->first();
        return view('frontend.admin.employee.department.view', $data);
    }
    public function editJobPosition($id)
    {
        $data['employee'] = Employee::get();
        $data['department'] = Department::where('status', 1)->get();
        $data['data'] = JobPosition::where('id', $id)->first();
        return view('frontend.admin.employee.job_position.edit', $data);
    }

    public function updateJobPosition(Request $request)
    {
        $data = $request->validate(['position_name' => 'required']);

        $jobPosition = JobPosition::find($request->id);
        $jobPosition->position_name = $request->position_name;
        $jobPosition->position_description = $request->position_description;
        $jobPosition->manager = $request->manager;
        $jobPosition->dpt_id = $request->dpt_id;
        $jobPosition->status = $request->status;
        $jobPosition->save();

        return redirect(route('allJobPosition'))->with('message', 'Job position updated successfully');
    }
    public function deleteJob(Request $request)
    {
        JobPosition::where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function viewJobPosition($id)
    {
        $data['data'] = JobPosition::select('departments.department_name', 'job_positions.*')
            ->join('departments', 'departments.id', 'job_positions.dpt_id')
            ->where('job_positions.id', $id)
            ->first();
        return view('frontend.admin.employee.job_position.view', $data);
    }
    public function job_positions(Request $request)
    {
        $dpt_id = $request->department;

        $jobPositions =  DB::table('job_positions')->where('dpt_id', $dpt_id)->where('status',1)->get();
        return response()->json($jobPositions);
    }
    public function viewEmployee($id)
    {
        $emp = Employee::select('employees.*', 'departments.department_name', 'job_positions.position_name')
            ->join('departments', 'departments.id', 'employees.department')
            ->join('job_positions', 'job_positions.id', 'employees.job_position')
            ->where('employees.id', $id)
            ->first();
        $employee['dft_customer'] = DB::table('customer_management')->whereIn('id', explode(',', $emp->default_customer))->get();


        $employee['employee'] = $emp;

        return view('frontend.admin.employee.viewEmployee', $employee);
    }

    public function editEmployee($id)
    {
        $emp = Employee::select('employees.*', 'departments.department_name', 'job_positions.position_name')
            ->join('departments', 'departments.id', 'employees.department')
            ->join('job_positions', 'job_positions.id', 'employees.job_position')
            ->where('employees.id', $id)
            ->first();
        $employee['dft_customer'] = DB::table('customer_management')->whereIn('id', explode(',', $emp->default_customer))->get();

        $employee['employee'] = $emp;
        $countryCodes = CountryCode::get();
        $s_customer = DB::table('customer_management')->whereIn('id',explode(',',$emp->default_customer))->get();
        $ns_customer = DB::table('customer_management')->whereNotIn('id',explode(',',$emp->default_customer))->get();
        $department = Department::get();
        $jobPosition = JobPosition::where('dpt_id',$emp->department)->get();
        $countries = Country::get();
        return view('frontend.admin.employee.editEmployee', $employee,[
            's_customer' => $s_customer,
            'ns_customer' => $ns_customer,
            'countryCodes' => $countryCodes,
            'department' => $department,
            'jobPosition' => $jobPosition,
            'countries' => $countries,
        ]);
    }

    public function updateEmployee(Request $request)
    {
       
        $emp=DB::table('employees')->where('id',$request->id)->first();

   
      
        $user_data=DB::table('users')->where('email',$emp->work_email)->first();

        $data = $request->validate([
            'emp_name' => 'required',
            'job_position' => 'required',
            'work_email' => 'required|email|unique:users,email,'.$user_data->id,
        ]);
        

        if ($request->file('emp_image')) {
            $file_type = $request->file('emp_image')->extension();
            $file_path = $request->file('emp_image')->storeAs('images/employees',  $file_type, 'public');
            $request->file('emp_image')->move(public_path('images/employees'), $file_type);
        } else {
            $file_path = $request->emp_image_old;
        }

        if ($request->file('other_id_file')) {
            $other_id_file_type = $request->file('other_id_file')->extension();
            $other_id_file_path = $request->file('other_id_file')->storeAs('images/employees/ids', $other_id_file_type, 'public');
            $request->file('other_id_file')->move(public_path('images/employees/ids'), $other_id_file_type);
        } else {
            $other_id_file_path = $request->other_id_file_old;
        }
        if ($request->file('driving_license')) {
            $driving_license = $request->file('driving_license')->extension();
            $driving_license_path = $request->file('driving_license')->storeAs('images/employees/ids', $driving_license, 'public');
            $request->file('driving_license')->move(public_path('images/employees/ids'), $driving_license_path);
        } else {
            $driving_license_path = $request->driving_license_old;
        }

        //user table unique_id
     

        $user =  User::find($user_data->id);
       
        $user->user_name = $request->emp_name;
        $user->email = $request->work_email;
        $user->status = 1;
        $user->user_type = "employee";
        $user->role_id = 3;
        $user->user_image = $file_path;
        $user->save();

        DB::table('user_address')->where('id',$request->id)->update([
            'address_1' => $request->contact_address,
            'country' => $request->country,
            'mobile' => $request->country_code_m . $request->work_mobile,
            'user_id' => $user->id,
        ]);



        $employee = Employee::find($request->id);
     
        $employee->emp_name = $request->emp_name;
        $employee->job_position = $request->job_position;
        $employee->work_mobile = $request->country_code_m . $request->work_mobile;
        $employee->work_phone = $request->country_code_p . $request->work_phone;
        $employee->work_email = $request->work_email;
        $employee->department = $request->department;
        $employee->manager = $request->manager;
        $employee->default_customer = implode(',', $request->default_customer);
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
        $employee->ren_rate = $request->ren_rate;
        $employee->blood_grp = $request->blood_grp;
        $employee->medical_con = $request->medical_con;
        $employee->drug_allergy = $request->drug_allergy;
        $employee->vehicle_no = $request->vehicle_no;
        $employee->driving_license = $driving_license_path;
        $employee->expiry_date = $request->expiry_date;
        $employee->status = 1;
        $employee->save();

        return redirect(route('allEmployee'));
    }

    public function payStructure()
    {
        $data['data'] = PayStructure::all();
        return view('frontend.admin.employee.pay_structure.index',$data);
    }
    public function payStructureAdd()
    {
        return view('frontend.admin.employee.pay_structure.add');
    }
    public function payStructureCreate(Request $request)
    {
        $request->validate([
            'year' => 'required|unique:pay_structures,year',
            
        ]);
        
        $pay_structure = new PayStructure;
        $pay_structure->year = $request->year;
        $pay_structure->commission = $request->commission;
        $pay_structure->cpf = $request->cpf;
        $pay_structure->insurance = $request->insurance;
        $pay_structure->medical_leave_entitlement =  $request->medical_leave_entitlement;
        $pay_structure->medical_allowance =  $request->medical_allowance;
        $pay_structure->save();

        return redirect(route('payStructure'));
    }
    public function editPayStructure($id)
    {
        $data['data']=PayStructure::find($id);
        return view('frontend.admin.employee.pay_structure.edit',$data);
    }
    public function payStructureUpdate(Request $request)
    {
        $request->validate([
            'year' => 'required|unique:pay_structures,year,'.$request->id,
            
        ]);
        $pay_structure = PayStructure::find($request->id);
        $pay_structure->year = $request->year;
        $pay_structure->commission = $request->commission;
        $pay_structure->cpf = $request->cpf;
        $pay_structure->insurance = $request->insurance;
        $pay_structure->medical_leave_entitlement =  $request->medical_leave_entitlement;
        $pay_structure->medical_allowance =  $request->medical_allowance;
        $pay_structure->save();

        return redirect(route('payStructure'));
    }
    public function salaryEmployee()
    {
        $data['emp_salary'] = DB::table('employee_salaries')
        ->select('employee_salaries.*','job_positions.position_name','employees.emp_name')
        ->join('job_positions','job_positions.id','employee_salaries.designation')
        ->join('employees','employees.id','employee_salaries.emp_id')
        ->get();
        return view('frontend.admin.employee.employee_salary.index',$data);
    }
    public function addSalary()
    {   
        $data['pay_structures'] = PayStructure::where('year',2022)->first();
        $data['employee']=Employee::where('status',1)->get();
        $data['job_position']=JobPosition::where('status',1)->get();
        return view('frontend.admin.employee.employee_salary.add',$data);
    }
    public function postSalary(Request $request)
    {
       
        $request->validate([
            'emp_id' => 'required|unique:employee_salaries,emp_id',
            
        ]);

        $emp_salary = new EmployeeSalary;
        $emp_salary->emp_id = $request->emp_id;
        $emp_salary->designation =$request->designation;
        $emp_salary->basic_pay =$request->basic_pay;
        $emp_salary->commission =$request->commission;
        $emp_salary->cpf =$request->cpf;
        $emp_salary->insurance =$request->insurance;
        $emp_salary->medical_leave =$request->medical_leave_entitlement;
        $emp_salary->medical_allowance =$request->medical_allowance;
        $emp_salary->earning =$request->earning;
        $emp_salary->deduction =$request->deduction;
        $emp_salary->net_pay =$request->net_pay;
        $emp_salary->per_trip_charge =$request->per_trip_charge;
        $emp_salary->no_trip =$request->no_trip;
        $emp_salary->earning =$request->earning;
        $emp_salary->total =$request->total;
        $emp_salary->save();
        return redirect(route('salaryEmployee'));
    }


    public function editSalary($id)
    {
        $data['pay_structures'] = PayStructure::where('year',2022)->first();
        $data['job_position']=JobPosition::where('status',1)->get();
        $data['employee']=Employee::where('status',1)->get();
        $data['emp_salary']=EmployeeSalary::find($id);
        if($data['emp_salary']['designation']==1)
        {
            return view('frontend.admin.employee.employee_salary.edit',$data);
        }
        else
        {
            return view('frontend.admin.employee.employee_salary.edit_a',$data);
        }
    
      
    }
    public function updateSalary(Request $request)
    {
        $request->validate([
            'emp_id' => 'required|unique:employee_salaries,emp_id,'.$request->id,
            
        ]);

        $emp_salary = EmployeeSalary::find($request->id);
        $emp_salary->emp_id = $request->emp_id;
        $emp_salary->designation =$request->designation;
        $emp_salary->basic_pay =$request->basic_pay;
        $emp_salary->commission =$request->commission;
        $emp_salary->cpf =$request->cpf;
        $emp_salary->insurance =$request->insurance;
        $emp_salary->medical_leave =$request->medical_leave_entitlement;
        $emp_salary->medical_allowance =$request->medical_allowance;
        $emp_salary->earning =$request->earning;
        $emp_salary->deduction =$request->deduction;
        $emp_salary->net_pay =$request->net_pay;
        $emp_salary->per_trip_charge =$request->per_trip_charge;
        $emp_salary->no_trip =$request->no_trip;
        $emp_salary->earning =$request->earning;
        $emp_salary->total =$request->total;
        $emp_salary->save();
        return redirect(route('salaryEmployee'));
    }
    public function deleteEmployeeSalary(Request $request)
    {
       $data = EmployeeSalary::where('id',$request->id)->delete();
       return json_encode(1);
   
    }
    public function holidayList()
    {
        return view('frontend.admin.holiday.index');
    }
}
