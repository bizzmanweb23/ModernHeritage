@extends('frontend.admin.layouts.master')

@section('content')
<h4>Edit Employee</h4>
<form action="{{ route('updateEmployee') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

        <input type="hidden" class="form-control" id="id" name="id" value="{{$employee->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emp_name">Name:</label>
                        <input type="text" class="form-control" id="emp_name" name="emp_name" value="{{$employee->emp_name}}" placeholder="Employee's Name" required>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="emp_name">Employee Image:</label>
                        <input type="file" class="form-control" id="emp_image" name="emp_image"  placeholder="Employee's Name" >
                        <img src="{{ asset($employee->emp_image) }}" alt="Employee Image" style="height: 6rem; width:6rem">
                        <input type="hidden" class="form-control" id="emp_image_old" name="emp_image_old" value="{{$employee->emp_image}}">

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group company" id="gst">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control" required>
                            <option value=""> --Select-- </option>
                            @foreach($department as $d)
                            <option value="{{$d->id }}" @if($employee->department == $d->id ) selected @endif>{{$d->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="job_position">Job Position:</label>
                        <select name="job_position" class="form-control" id="job_position" required>
                            @foreach($jobPosition as $j)
                            <option value="{{$j->id }}" @if($employee->job_position == $j->id ) selected @endif>{{$j->position_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_mobile">Work Mobile</label>
                        <div class="row">
                            <div class="col-md-3">
                            <?php
                                  $cod= substr($employee->work_mobile,0, -10);
                                   
                                        ?>
                                <select name="country_code_m" class="form-control" id="country_code_m">
                                    <option value="">--Select--</option>
                                    @foreach($countryCodes as $c)
                                    <option value="+{{ $c->code }}" @if($cod == $c->code) selected @endif >+{{ $c->code }}({{ $c->name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="work_mobile" name="work_mobile" value="<?php echo substr($employee->work_mobile,-10); ?>" placeholder="Mobile" required>
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
                            <?php
                                  $cod= substr($employee->work_phone,0, -10);
                                   
                                        ?>
                                <select name="country_code_p" class="form-control" id="country_code_p">
                                    <option value="">--Select--</option>
                                    @foreach($countryCodes as $c)
                                    <option value="+{{ $c->code }}" @if($cod == $c->code) selected @endif >+{{ $c->code }}({{ $c->name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="work_phone" name="work_phone" value="<?php echo substr($employee->work_phone,-10); ?>" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_email">Work Email:</label>
                        <input type="email" class="form-control" id="work_email" name="work_email" placeholder="Employee's Email" value="{{$employee->work_email}}" required>
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
                        <input type="text" class="form-control" id="ren_rate" name="ren_rate" placeholder="" value="{{$employee->ren_rate}}">
                    </div>
                </div>

            </div>

            <hr>
            <div class="row">
                <h5>Private Details</h5>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_address">Address:</label>
                        <input type="text" class="form-control" id="contact_address" name="contact_address" placeholder="" value="{{$employee->contact_address}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select name="country" id="country" class="form-control" required>
                            <option value="">
                                --Select--
                            </option>
                            @foreach($countries as $c)
                            <option value="{{ $c->id }}" @if($employee->country == $c->id) selected @endif>
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
                        <input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="" value="{{$employee->contact_email}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="identification_no">Identification No:</label>
                        <input type="text" class="form-control" id="identification_no" name="identification_no" placeholder="" value="{{$employee->identification_no}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_phone">Phone:</label>
                        <div class="row">
                            <div class="col-md-3">
                            <?php
                                  $cod= substr($employee->contact_phone,0, -10);
                                   
                                        ?>
                                <select name="country_code_cp" class="form-control" id="country_code_cp">
                                    <option value="">--Select--</option>
                                    @foreach($countryCodes as $c)
                                    <option value="+{{ $c->code }}" @if($cod == $c->code) selected @endif >+{{ $c->code }}({{ $c->name }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="contact_phone" name="contact_phone" placeholder="" value="<?php echo substr($employee->contact_phone,-10); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="passport_no">Passport No:</label>
                        <input type="text" class="form-control" id="passport_no" name="passport_no" placeholder="" value="{{$employee->passport_no}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bank_accnt_no">Bank account:</label>
                        <input type="text" class="form-control" id="bank_accnt_no" name="bank_accnt_no" placeholder="" value="{{$employee->bank_accnt_no}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">--select--</option>
                            <option value="Male" @if($employee->gender == 'Male') selected @endif>Male</option>
                            <option value="Female" @if($employee->gender == 'Female') selected @endif>Female</option>
                            <option value="Other" @if($employee->gender == 'Other') selected @endif>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="" value="{{$employee->dob}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="place_of_birth">Place of Birth:</label>
                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="" value="{{$employee->place_of_birth}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country_of_birth">Country of Birth:</label>
                        <input type="text" class="form-control" id="country_of_birth" name="country_of_birth" placeholder="" value="{{$employee->country_of_birth}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marital_status">Marital Status:</label>
                        <select class="form-control" id="marital_status" name="marital_status">
                            <option value="">--select--</option>
                            <option value="Single" @if($employee->marital_status == 'Single') selected @endif>Single</option>
                            <option value="Married" @if($employee->marital_status == 'Married') selected @endif>Married</option>
                            <option value="Legal Cohabitant" @if($employee->marital_status == 'Legal Cohabitant') selected @endif >Legal Cohabitant</option>
                            <option value="widower" @if($employee->marital_status == 'Widower') selected @endif>Widower</option>
                            <option value="Divorced" @if($employee->marital_status == 'Divorced') selected @endif >Divorced</option>
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
                        <input type="text" class="form-control" id="other_id_name" name="other_id_name" placeholder="" value="{{$employee->other_id_name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="other_id_no">ID No:</label>
                        <input type="text" class="form-control" id="other_id_no" name="other_id_no" placeholder="" value="{{$employee->other_id_no}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="other_id_file">ID File:</label>
                        <input type="file" class="form-control" id="other_id_file" name="other_id_file" placeholder="">
                        <input type="hidden" class="form-control" id="other_id_file_old" name="other_id_file_old" value="{{$employee->other_id_file}}">
                        <a href="{{ asset($employee->other_id_file) }}" target="_blank"><i class="fa fa-file"></i></a>
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
                            <option value="Graduate" @if($employee->edu_certificate_level == 'Graduate') selected @endif>Graduate</option>
                            <option value="Bachelor" @if($employee->edu_certificate_level == 'Bachelor') selected @endif>Bachelor</option>
                            <option value="Master" @if($employee->edu_certificate_level == 'Master') selected @endif>Master</option>
                            <option value="Doctor" @if($employee->edu_certificate_level == 'Doctor') selected @endif >Doctor</option>
                            <option value="Other" @if($employee->edu_certificate_level == 'Other') selected @endif>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Field of Study:</label>
                        <input type="text" class="form-control" id="field_of_study" name="field_of_study" placeholder="" value="{{$employee->field_of_study}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Last Institute:</label>
                        <input type="text" class="form-control" id="school" name="school" placeholder="" value="{{$employee->school}}">
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
                            <option value="O-" @if($employee->blood_grp == 'O-') selected @endif>O-</option>
                            <option value="O+" @if($employee->blood_grp == 'O+') selected @endif>O+</option>
                            <option value="A-" @if($employee->blood_grp == 'A-') selected @endif>A-</option>
                            <option value="A+" @if($employee->blood_grp == 'A+') selected @endif >A+</option>
                            <option value="B-" @if($employee->blood_grp == 'B-') selected @endif>B-</option>
                            <option value="B+" @if($employee->blood_grp == 'B+') selected @endif>B+</option>
                            <option value="AB-" @if($employee->blood_grp == 'AB-') selected @endif>AB-</option>
                            <option value="AB+" @if($employee->blood_grp == 'AB+') selected @endif>AB+</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Medical Condition:</label>
                        <input type="text" class="form-control" id="medical_con" name="medical_con" placeholder="" value="{{$employee->medical_con}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="school">Drug Allergy:</label>
                        <select class="form-control" id="drug_allergy" name="drug_allergy">
                            <option value="">--select--</option>
                            <option value="Yes" @if($employee->drug_allergy == 'Yes') selected @endif>Yes</option>
                            <option value="No" @if($employee->drug_allergy == 'No') selected @endif>No</option>

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
                        <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="" value="{{$employee->vehicle_no}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="edu_certificate_level">Driving licence:</label>
                        <input type="file" class="form-control" id="driving_license" name="driving_license" placeholder="" value="{{$employee->vehicle_no}}">
                        <input type="hidden" class="form-control" id="driving_license_old" name="driving_license_old" value="{{$employee->driving_license}}">
                        <a href="{{ asset($employee->driving_license) }}" target="_blank"><i class="fa fa-file"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="edu_certificate_level">Expiry Date:</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="" value="{{$employee->expiry_date}}">
                    </div>
                </div>



            </div>



            <div class="ms-auto text-end">
                <button class="btn btn-primary" id="save">Update</button>
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