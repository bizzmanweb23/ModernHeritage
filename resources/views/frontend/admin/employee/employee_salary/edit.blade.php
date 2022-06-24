@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('updateSalary')}}" method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Employee</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{$emp_salary->id}}">
                    <select name="emp_id" id="emp_id" class="form-control" required>
                        <option value="">--Select-- </option>
                        @foreach($employee as $key=>$emp )
                        <option value="{{$emp->id}}" @if($emp->id == $emp_salary->emp_id) selected @endif>{{$emp->emp_name}} </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Designation</label>

                    <select name="designation" id="designation" class="form-control" onChange="chk_fields(this.value)" required>
                        <option value="">--Select-- </option>
                        @foreach($job_position as $key=>$j_pos )
                        <option value="{{$j_pos->id}}" @if($j_pos->id == $emp_salary->designation) selected @endif>{{$j_pos->position_name}} </option>
                        @endforeach

                    </select>
                </div>
                <div class="row" id="normal_employee">
                    <div class="form-group col-md-6">
                        <label>Basic Pay</label>
                        <input type="text" class="form-control" id="basic_pay" name="basic_pay" onkeyup="calcSalary()" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Commission</label>
                        <input type="hidden" name="da" value="{{$pay_structures->commission}}" id="da">
                        <input type="text" class="form-control" id="commission" name="commission" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>CPF</label>
                        <input type="hidden" name="pf" value="{{$pay_structures->cpf}}" id="pf">
                        <input type="text" class="form-control" id="cpf" name="cpf" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Insurance</label>
                        <input type="hidden" name="esi" value="{{$pay_structures->insurance}}" id="esi">
                        <input type="text" class="form-control" id="insurance" name="insurance" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Medical Allowance</label>
                        <input type="hidden" name="ma" value="{{$pay_structures->medical_leave_entitlement}}" id="ma">
                        <input type="text" class="form-control" id="medical_leave_entitlement" name="medical_leave_entitlement" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Medical Leave Entitlement</label>
                        <input type="hidden" name="mle" value="{{$pay_structures->medical_allowance}}" id="mle">
                        <input type="text" class="form-control" id="medical_allowance" name="medical_allowance" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Total Earning</label>
                        <input type="text" class="form-control" id="earning_a" name="earning_a" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Total Deduction</label>
                        <input type="text" class="form-control" id="deduction" name="deduction" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Net Pay</label>
                        <input type="text" class="form-control" id="net_pay" name="net_pay" >
                    </div>
                </div>
                <div class="row" id="driver">
                    <div class="form-group col-md-6">
                        <label>Per Trip Charge</label>
                        <input type="text" class="form-control" id="per_trip_charge" value="{{$emp_salary->per_trip_charge}}" name="per_trip_charge"  >
                    </div>
                    <div class="form-group col-md-6">
                        <label>No of Trip (this month)</label>
                        <input type="text" class="form-control" id="no_trip" name="no_trip" value="{{$emp_salary->no_trip}}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Total Earning</label>
                        <input type="text" class="form-control" id="total" name="total" value="{{$emp_salary->total}}">
                    </div>
                </div>

                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('salaryEmployee')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('#normal_employee').hide();
    $('#driver').show();
     

    function chk_fields(value)
    {
       if(value == 1)
       {
        $('#driver').show();
        $('#normal_employee').hide();
       }
       else
       {
        $('#driver').hide();
        $('#normal_employee').show();
       }

    
    }
    function calcSalary() {

        const basic_pay = parseInt(document.getElementById('basic_pay').value);
        const da = document.getElementById("da").value;
        const pf = document.getElementById("pf").value;
        const esi = document.getElementById("esi").value;
        const ma = document.getElementById("ma").value;
        const mle = document.getElementById("mle").value;
        //alert(da);

        const DA = basic_pay * da;
        const MA = basic_pay * ma;
        const MLE = basic_pay * mle;
        const GrandPay = basic_pay + DA + MA + MLE;
        const PF = GrandPay * pf;
        const EmployeesStateInsurance = GrandPay * esi;
        const Deduction = EmployeesStateInsurance + PF;
        const NetPay = GrandPay - Deduction;

        //alert(NetPay);

        if (!isNaN(basic_pay)) {
            document.getElementById('commission').value = DA;
            document.getElementById('cpf').value = PF;
            document.getElementById('insurance').value = EmployeesStateInsurance;
            document.getElementById('medical_allowance').value = MA;
            document.getElementById('medical_leave_entitlement').value = MLE;
            document.getElementById('earning_a').value = GrandPay;
            document.getElementById('net_pay').value = NetPay;
            document.getElementById('deduction').value = Deduction;
        }
    }
</script>
<script>
    @if($errors -> any())
    @foreach($errors -> all() as $error)
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ $error }}");
    @endforeach
    @endif
</script>

@endsection