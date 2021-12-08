@extends('frontend.admin.layouts.master')

@section('content')
<style>
    .upload {
        height: 100px;
        width: 100px;
        position: relative;
    }

    .upload:hover>.edit {
        display: block;
    }

    .edit {
        display: none;
        position: absolute;
        top: 1px;
        right: 1px;
        cursor: pointer;
    }

</style>
<form action="{{ route('saveEmployee') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="ms-auto text-end">
                    <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ route('allEmployee') }}"><i class="fas fa-arrow-left text-dark me-2"
                            aria-hidden="true"></i>Back</a>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="emp_name">Name:</label>
                            <input type="text" class="form-control" id="emp_name" name="emp_name"
                                placeholder="Employee's Name" required>
                        </div>
                        <div class="form-group">
                            <label for="customer_name">Job Position:</label>
                            <input type="text" class="form-control" id="job_position" name="job_position"
                                placeholder="Job Position" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <div class="upload">
                            <img src="{{ asset('images/products/default.jpg') }}" alt="Product"
                                style="height: 100px; width:100px">
                            <label for="emp_image" class="edit">
                                <i class="fas fa-pencil-alt"></i>
                                <input id="emp_image" type="file" style="display: none" name="emp_image">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                                    <input type="text" class="form-control" id="work_mobile" name="work_mobile"
                                        placeholder="Mobile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company" id="gst">
                            <label for="department">Department</label>
                            <select name="department" id="department" class="form-control">
                                <option value=""> --Select-- </option>
                                {{-- @foreach($gst as $g)
                                    <option value="{{ $g->department }}">{{ $g->department }}</option>
                                @endforeach --}}
                            </select>
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
                                    <input type="text" class="form-control" id="work_phone" name="work_phone"
                                        placeholder="Phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company" id="gst">
                            <label for="manager">Manager</label>
                            <select name="manager" id="manager" class="form-control">
                                <option value=""> --Select-- </option>
                                {{-- @foreach($gst as $g)
                                    <option value="{{ $g->manager }}">{{ $g->manager }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_email">Work Email:</label>
                            <input type="email" class="form-control" id="work_email" name="work_email"
                                placeholder="Employee's Email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="default_customer">Default Customer:</label>
                            <select multiple="multiple" name="default_customer[]" id="default_customer" class="form-control">
                                @foreach($customer as $c)
                                    <option value="{{ $c->id }}">
                                        {{ $c->customer_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                    </div>
                </div>

                {{-- Tab lists --}}
                <ul class="nav nav-tabs mt-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#private_info">Private Information</a>
                    </li>
                </ul>

                {{-- Tab Panes --}}
                <div class="tab-content mb-3">

                    {{-- contact_address --}}
                    <div id="contact_address" class="container tab-pane active"><br>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Private Contact</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Citizenship</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_address">Address:</label>
                                    <input type="text" class="form-control" id="contact_address" name="contact_address"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">Country:</label>
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_email">Email:</label>
                                    <input type="text" class="form-control" id="contact_email" name="contact_email"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="identification_no">Identification No:</label>
                                    <input type="text" class="form-control" id="identification_no" name="identification_no"
                                        placeholder="">
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
                                            <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                        placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="passport_no">Passport No:</label>
                                    <input type="text" class="form-control" id="passport_no" name="passport_no"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_accnt_no">Bank account:</label>
                                    <input type="text" class="form-control" id="bank_accnt_no" name="bank_accnt_no"
                                        placeholder="">
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
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="home_work_distance">Home Work Distance:</label>
                                            <input type="text" class="form-control" id="home_work_distance" name="home_work_distance"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-4 pt-2">
                                        <p>KM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place_of_birth">Place of Birth:</label>
                                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country_of_birth">Country of Birth:</label>
                                    <input type="text" class="form-control" id="country_of_birth" name="country_of_birth"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h5>Marital Status</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Other Details</h5>
                            </div>
                        </div>
                        <div class="row">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_id_name">ID Name:</label>
                                    <input type="text" class="form-control" id="other_id_name" name="other_id_name"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_id_no">ID No:</label>
                                    <input type="text" class="form-control" id="other_id_no" name="other_id_no"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="other_id_file">ID File:</label>
                                    <input type="file" class="form-control" id="other_id_file" name="other_id_file"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h5>Education</h5>
                            </div>
                            <div class="col-md-6">
                                <h5></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edu_certificate_level">Certificate Level:</label>
                                    <select class="form-control" id="edu_certificate_level" name="edu_certificate_level">
                                        <option value="">--select--</option>
                                        <option value="Graduate">Graduate</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Master">Master</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field_of_study">Field of Study:</label>
                                    <input type="text" class="form-control" id="field_of_study" name="field_of_study"
                                    placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="school">School:</label>
                                    <input type="text" class="form-control" id="school" name="school"
                                    placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
@endsection
