@extends('frontend.admin.layouts.master')

@section('content')
<h4>Add Employee</h4>
<form action="{{ route('saveEmployee') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emp_name">Name:</label>
                        <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Employee's Name" required>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emp_name">Employee Image:</label>
                        <input type="file" class="form-control" id="emp_image" name="emp_image" placeholder="Employee's Name" required>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group company" id="gst">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control" required>
                            <option value=""> --Select-- </option>
                            @foreach($department as $d)
                            <option value="{{$d->id }}">{{$d->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="job_position">Job Position:</label>
                        <select name="job_position" class="form-control" id="job_position" required>
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_mobile">Work Mobile</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="country_code_m" class="form-control" id="country_code_m">
                                    <option value="">--Select--</option>
                                    @foreach($countryCodes as $c)
                                    <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="work_mobile" name="work_mobile" placeholder="Mobile" required>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_phone">Work Phone</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="country_code_p" class="form-control" id="country_code_p">
                                    <option value="">--Select--</option>
                                    @foreach($countryCodes as $c)
                                    <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="work_phone" name="work_phone" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_email">Work Email:</label>
                        <input type="email" class="form-control" id="work_email" name="work_email" placeholder="Employee's Email" required>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="default_customer">Default Customer:</label>
                        <select multiple="multiple" name="default_customer[]" id="default_customer" class="form-control">
                            @foreach($customer as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_address">Remuneration rate:(per month)</label>
                        <input type="text" class="form-control" id="ren_rate" name="ren_rate" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <h5>Private Details</h5>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_address">Address:</label>
                        <input type="text" class="form-control" id="contact_address" name="contact_address" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select  name="country" id="country" class="form-control" required>
                        <option value="">
                               --Select--
                            </option>
                            @foreach($countries as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->country }}
                            </option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_email">Email:</label>
                        <input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="identification_no">Identification No:</label>
                        <input type="text" class="form-control" id="identification_no" name="identification_no" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_phone">Phone:</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="country_code_cp" class="form-control" id="country_code_cp">
                                    <option value="">--Select--</option>
                                    @foreach($countryCodes as $c)
                                    <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="contact_phone" name="contact_phone" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="passport_no">Passport No:</label>
                        <input type="text" class="form-control" id="passport_no" name="passport_no" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bank_accnt_no">Bank account:</label>
                        <input type="text" class="form-control" id="bank_accnt_no" name="bank_accnt_no" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">--select--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="place_of_birth">Place of Birth:</label>
                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country_of_birth">Country of Birth:</label>
                        <input type="text" class="form-control" id="country_of_birth" name="country_of_birth" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marital_status">Marital Status:</label>
                        <select class="form-control" id="marital_status" name="marital_status">
                            <option value="">--select--</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Legal Cohabitant">Legal Cohabitant</option>
                            <option value="widower">widower</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                </div>

            </div>
            <hr>



            <div class="row">
                <h5>Other Details</h5>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="other_id_name">ID Name:</label>
                        <input type="text" class="form-control" id="other_id_name" name="other_id_name" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="other_id_no">ID No:</label>
                        <input type="text" class="form-control" id="other_id_no" name="other_id_no" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="other_id_file">ID File:</label>
                        <input type="file" class="form-control" id="other_id_file" name="other_id_file" placeholder="">
                    </div>
                </div>
            </div>
            <hr>

            <div class="row mt-2">
                <div class="col-md-6">
                    <h5>Education</h5>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Certificate Level:</label>
                        <select class="form-control" id="edu_certificate_level" name="edu_certificate_level">
                            <option value="">--Select--</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Bachelor">Bachelor</option>
                            <option value="Master">Master</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Field of Study:</label>
                        <input type="text" class="form-control" id="field_of_study" name="field_of_study" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Last Institute:</label>
                        <input type="text" class="form-control" id="school" name="school" placeholder="">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
            <h5>Health Status</h5>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Blood Group:</label>
                        <select class="form-control" id="blood_grp" name="blood_grp">
                            <option value="">--Select--</option>
                            <option value="O-">O-</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="A+">A+</option>
                            <option value="B-">B-</option>
                            <option value="B+">B+</option>
                            <option value="AB-">AB-</option>
                            <option value="AB+">AB+</option>
                        </select>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Medical Condition:</label>
                        <input type="text" class="form-control" id="medical_con" name="medical_con" placeholder="">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="school">Drug Allergy:</label>
                        <select class="form-control" id="drug_allergy" name="drug_allergy">
                            <option value="">--select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                           
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
            <h5>Vehicle Details</h5>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="field_of_study">Vehicle no:</label>
                        <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="edu_certificate_level">Driving licence:</label>
                        <input type="file" class="form-control" id="driving_license" name="driving_license" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="edu_certificate_level">Expiry Date:</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="">
                    </div>
                </div>
              
               
               
            </div>



            <div class="ms-auto text-end">
        <button class="btn btn-primary" id="save">Save</button>
        <a class="btn btn-info" id="back" href="{{ route('allEmployee') }}">Back</a>
    </div>
        </div>
    </div>
    


</form>

<script>
    $('#default_customer').select2({
        width: '100%',
        placeholder: "Select a Customer",
        allowClear: true
    });
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ $error }}");
        @endforeach
    @endif
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#department').on('change', function(e) {
            var department = e.target.value;
            $.ajax({
                url: "{{ route('job_positions') }}",
                type: "GET",
                data: {
                    department: department
                },
                success: function(data) {


                    if (data) {
                        $('#job_position').empty();
                        $('#job_position').append('<option hidden>Choose Job Position</option>');
                        $.each(data, function(key, job_p) {
                            $('select[name="job_position"]').append('<option value="' + job_p.id + '">' + job_p.position_name + '</option>');
                        });
                    } else {
                        $('#job_position').empty();
                    }
                }
            })
        });
    });
</script>
@endsection