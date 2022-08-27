@extends('frontend.admin.layouts.master')

@section('content')


<div class="card">

    <div class="card-body">


        <div class="row">
            <div class="ms-auto text-end">

                <a class="btn btn-link" id="back" href="{{ route('allEmployee') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emp_name">Employee Image:</label>
                    <img src="{{ asset($employee->emp_image) }}" alt="Employee Image" style="height: 6rem; width:6rem">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emp_name">Name:</label>
                    {{$employee->emp_name}}

                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group company" id="gst">
                    <label for="department">Department:</label>
                    {{$employee->department_name}}

                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="job_position">Job Position:</label>
                    {{$employee->position_name}}

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="work_mobile">Work Mobile:</label>
                    {{$employee->work_mobile}}
                </div>
            </div>



        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="work_phone">Work Phone:</label>
                    {{$employee->work_phone}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="work_email">Work Email:</label>
                    {{$employee->work_email}}
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="default_customer">Default Customers:</label>
                    @foreach($dft_customer as $row)

                    {{$row->name}},



                    @endforeach

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_address">Remuneration rate (per month) :</label>
                    {{$employee->ren_rate}}
                </div>
            </div>

        </div>

        <hr>
        <div class="row">
            <h5>Private Details</h5>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_address">Address:</label>
                    {{$employee->contact_address}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">Country:</label>
                    {{$employee->country}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_email">Email:</label>
                    {{$employee->contact_email}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="identification_no">Identification No:</label>
                    {{$employee->identification_no}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_phone">Phone:</label>
                    {{$employee->contact_phone}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="passport_no">Passport No:</label>
                    {{$employee->passport_no}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bank_accnt_no">Bank account:</label>
                    {{$employee->bank_accnt_no}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    {{$employee->gender}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    {{date("d/m/Y", strtotime($employee->dob))}}


                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="place_of_birth">Place of Birth:</label>
                    {{$employee->place_of_birth}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country_of_birth">Country of Birth:</label>
                    {{$employee->country_of_birth}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="marital_status">Marital Status:</label>
                    {{$employee->marital_status}}
                </div>
            </div>

        </div>
        <hr>



        <div class="row">
            <h5>Other Details</h5>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="other_id_name">ID Name:</label>
                    {{$employee->other_id_name}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="other_id_no">ID No:</label>
                    {{$employee->other_id_no}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="other_id_file">ID File:</label>
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
                    {{$employee->edu_certificate_level}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Field of Study:</label>
                    {{$employee->field_of_study}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Last Institute:</label>
                    {{$employee->school}}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <h5>Health Status</h5>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Blood Group:</label>
                    {{$employee->blood_grp}}

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Medical Condition:</label>
                    {{$employee->medical_con}}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="school">Drug Allergy:</label>
                    {{$employee->drug_allergy}}
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <h5>Vehicle Details</h5>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field_of_study">Vehicle no:</label>
                    {{$employee->vehicle_no}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edu_certificate_level">Driving licence:</label>
                    <a href="{{ asset($employee->driving_license) }}" target="_blank"><i class="fa fa-file"></i></a>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="edu_certificate_level">Expiry Date:</label>
                    {{date("d/m/Y", strtotime($employee->expiry_date))}}

                </div>
            </div>



        </div>




    </div>
</div>






@endsection