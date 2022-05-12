@extends('frontend.admin.employee.index')

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
<form action="{{ url('/') }}/admin/employeeedit/{{ $employee->id }}" method="POST"
    enctype="multipart/form-data">
    @csrf
        <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">
             
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ route('drivers') }}"><i class="fas fa-arrow-left text-dark me-2"
                            aria-hidden="true"></i>Back</a>
                    <button class="btn btn-link text-dark px-3 mb-0" id="save" type="submit"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
              
                </div>
                @if($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="emp_name">Name:</label>
           
                            <input type="text" class="form-control edit_input" id="emp_name" name="emp_name" value="{{ $employee->emp_name }}"
                            placeholder="Employee's Name" required>
                        </div>
                      
                    </div>
                    <div class="col-md-2">
                    <input type="hidden" class="form-control edit_input" id="type" name="type" value="D"
                            >
                    </div>
                    <div class="col-md-2">
                   
                        <div class="upload edit_input">
                            @if(isset($employee->emp_image))
                                <img src="{{ asset($employee->emp_image) }}" alt="Product"
                                    style="height: 100px; width:100px">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 100px; width:100px">
                            @endif
                            <label for="emp_image" class="edit">
                                <i class="fas fa-pencil-alt"></i>
                                <input id="emp_image" type="file" style="display: none" name="emp_image"
                                    value="{{ $employee->emp_image }}">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_mobile">Work Mobile:</label>
                           
                            <div class="row edit_input">
                                <div class="col-md-3">
                                    <select name="country_code_m" class="form-control" id="country_code_m">
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                            <option value="+{{ $c->code }}" {{ substr($employee->work_mobile, 0, 3) == $c->code ? 'selected' : '' }}>+{{ $c->code }}({{ $c->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="work_mobile" name="work_mobile" value="{{substr($employee->work_mobile, 3) }}"
                                        placeholder="Mobile">
                                        
                            <input type="hidden" class="form-control edit_input" id="job_position" name="job_position" value="{{ $employee->job_position }}"
                            placeholder="Employee's Name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department">Department:</label>
                        
                            <select name="department" id="department" class="form-control edit_input">
                                <option value=""> --Select-- </option>
                                @foreach($department as $d)
                                    <option value="{{$d->id }}" {{ $employee->department== $d->id ? 'selected' : '' }}>{{$d->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_phone">Work Phone:</label>
                           
                            <div class="row edit_input">
                                <div class="col-md-3">
                                    <select name="country_code_p" class="form-control" id="country_code_p">
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                            <option value="+{{ $c->code }}" {{ substr($employee->work_phone, 0, 3) == $c->code ? 'selected' : ''  }}>+{{ $c->code }}({{ $c->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="work_phone" name="work_phone"  value="{{substr($employee->work_phone, 3) }}"
                                        placeholder="Phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="manager">Manager:</label>
                         
                            <select name="manager" id="manager" class="form-control edit_input">
                                <option value=""> --Select-- </option>
                                @foreach($employees as $e)
                                    <option value="{{ $e->id }}" @if($e->id == $employee->manager) selected @endif>{{ $e->emp_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_email">Work Email:</label>
                           
                            <input type="email" class="form-control edit_input" id="work_email" name="work_email" value='{{ $employee->work_email }}'
                            placeholder="Employee's Email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="work_email">Status:</label>
                            <select name="status" class="form-control" id="status">
                                            <option value="">--Select--</option>
                                            <option value="1" @if($employee->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($employee->status == 0) selected @endif >Inactive</option>
                                        </select>
                           
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
                           
                                <input type="text" class="form-control edit_input" id="contact_address" name="contact_address" value="{{ $employee->contact_address }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country:</label>
                    
                                <input type="text" class="form-control edit_input" id="country" name="country" value="{{ $employee->country }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_email">Email:</label>
                               
                                <input type="text" class="form-control edit_input" id="contact_email" name="contact_email" value="{{ $employee->contact_email }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="identification_no">Identification No:</label>
                            
                                <input type="text" class="form-control edit_input" id="identification_no" name="identification_no" value="{{ $employee->identification_no }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_phone">Phone:</label>
                  
                                <div class="row edit_input">
                                    <div class="col-md-3">
                                        <select name="country_code_cp" class="form-control" id="country_code_cp">
                                            <option value="">--Select--</option>
                                            @foreach($countryCodes as $c)
                                                <option value="+{{ $c->code }}" {{ substr($employee->contact_phone, 0, 3) == $c->code ? 'selected' : ''  }}>+{{ $c->code }}({{ $c->name }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{substr($employee->contact_phone, 3) }}"
                                    placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passport_no">Passport No:</label>
                               
                                <input type="text" class="form-control edit_input" id="passport_no" name="passport_no" value="{{ $employee->passport_no }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_accnt_no">Bank account:</label>
                                <input type="text" class="form-control edit_input" id="bank_accnt_no" name="bank_accnt_no" value="{{ $employee->bank_accnt_no }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                
                                <select class="form-control edit_input" id="gender" name="gender">
                                    <option value="">--select--</option>
                                    <option value="Male" {{ $employee->gender == "Male" ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $employee->gender == "Female" ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $employee->gender == "Other" ? 'selected' : '' }}>Other</option>
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
                                       
                                        <input type="text" class="form-control edit_input" id="home_work_distance" name="home_work_distance" value="{{ $employee->home_work_distance }}"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-2 mt-4 pt-2 edit_input">
                                    <p>KM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                       
                                        <input type="date" class="form-control edit_input" id="dob" name="dob" value="{{ $employee->dob }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="place_of_birth">Place of Birth:</label>
                                       
                                        <input type="text" class="form-control edit_input" id="place_of_birth" name="place_of_birth" value="{{ $employee->place_of_birth }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country_of_birth">Country of Birth:</label>
                                      
                                        <input type="text" class="form-control edit_input" id="country_of_birth" name="country_of_birth" value="{{ $employee->country_of_birth }}"
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
                                <span class="view_span">{{ $employee->marital_status }}</span>
                                <select class="form-control edit_input" id="marital_status" name="marital_status">
                                    <option value="">--select--</option>
                                    <option value="Single" {{ $employee->marital_status == "Single" ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $employee->marital_status == "Married" ? 'selected' : '' }}>Married</option>
                                    <option value="Legal Cohabitant" {{ $employee->marital_status == "Legal Cohabitant" ? 'selected' : '' }}>Legal Cohabitant</option>
                                    <option value="widower" {{ $employee->marital_status == "widower" ? 'selected' : '' }}>widower</option>
                                    <option value="Divorced" {{ $employee->marital_status == "Divorced" ? 'selected' : '' }}>Divorced</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="other_id_name">ID Name:</label>
                             
                                <input type="text" class="form-control edit_input" id="other_id_name" name="other_id_name" value="{{ $employee->other_id_name }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="other_id_no">ID No:</label>
                               
                                <input type="text" class="form-control edit_input" id="other_id_no" name="other_id_no" value="{{ $employee->other_id_no }}"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="other_id_file">ID File:</label>
                                @if (isset( $employee->other_id_file ))         
                                    <span>
                                        <a href="{{ url('/') }}/{{ $employee->other_id_file }}" target="_blank" rel="noopener noreferrer">  <i class="fas fa-file"></i> File</a>
                                    </span>
                                @endif
                                <input type="file" class="form-control edit_input" id="other_id_file" name="other_id_file"
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
                            
                                <select class="form-control edit_input" id="edu_certificate_level" name="edu_certificate_level">
                                    <option value="">--select--</option>
                                    <option value="Graduate" {{ $employee->edu_certificate_level == "Graduate" ? 'selected' : '' }}>Graduate</option>
                                    <option value="Bachelor" {{ $employee->edu_certificate_level == "Bachelor" ? 'selected' : '' }}>Bachelor</option>
                                    <option value="Master" {{ $employee->edu_certificate_level == "Master" ? 'selected' : '' }}>Master</option>
                                    <option value="Doctor" {{ $employee->edu_certificate_level == "Doctor" ? 'selected' : '' }}>Doctor</option>
                                    <option value="Other" {{ $employee->edu_certificate_level == "Other" ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field_of_study">Field of Study:</label>
                      
                                <input type="text" class="form-control edit_input" id="field_of_study" name="field_of_study" value="{{ $employee->field_of_study }}"
                                placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school">School:</label>
                     
                                <input type="text" class="form-control edit_input" id="school" name="school" value="{{ $employee->school }}"
                                placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>

<script>
    $(document).ready(function () {
       // $('#save').hide();
      //  $('#discard').hide()
      //  $('.edit_input').hide();
    });

    $('#edit').click(function () {
        $('#save').show();
        $('#discard').show();
        $('#edit').hide();
        $('#back').hide();
        $('.edit_input').show();
        $('.view_span').hide();

        $('#default_customer').select2({
            width: '100%',
            placeholder: "Select a Customer",
            allowClear: true
        });
    });

    $('#discard').click(function () {
        location.reload();
    });
</script>
@endsection