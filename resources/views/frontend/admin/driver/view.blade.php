@extends('frontend.admin.employee.index')

@section('content')

<form action="{{ route('saveEmployee') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

            <div class="ms-auto text-end">

                <a class="btn btn-link text-dark px-3 mb-0" id="back" href="{{ route('drivers') }}"><i class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
            </div>
            <div class="row">
                <div class="col-md-8">

                    <div class="form-group">
                        <label for="emp_name">Name:</label>
                        {{$driver->emp_name}}

                    </div>



                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <div class="upload">
                        @if($driver->emp_image!='')
                        <img src="{{ asset($driver->emp_image) }}" alt="Product" style="height: 100px; width:100px">
                        @else
                        <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 100px; width:100px">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_mobile">Work Mobile</label>
                        {{$driver->work_mobile}}

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_phone">Work Phone</label>
                        {{$driver->work_phone}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group company" id="employee">
                        <label for="manager">Manager</label>
                        {{ $driver->manager_name }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="work_email">Work Email:</label>
                        {{$driver->work_email}}
                    </div>
                </div>
             
            </div>

            <hr>




           
            <div id="contact_address" class="container tab-pane active"><br>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Private Contact</h5>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_address">Address:</label>
                            {{$driver->contact_address}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country:</label>
                            {{$driver->country}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_email">Email:</label>
                            {{$driver->contact_email}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="identification_no">Identification No:</label>
                            {{$driver->identification_no}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_phone">Phone:</label>
                            {{$driver->contact_phone}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="passport_no">Passport No:</label>
                            {{$driver->passport_no}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bank_accnt_no">Bank account:</label>
                            {{$driver->bank_accnt_no}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            {{$driver->gender}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="home_work_distance">Home Work Distance:</label>
                                    {{$driver->home_work_distance}}
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            {{$driver->dob}}
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="place_of_birth">Place of Birth:</label>
                            {{$driver->place_of_birth}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country_of_birth">Country of Birth:</label>
                            {{$driver->country_of_birth}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marital_status">Marital Status:</label>
                            {{$driver->marital_status}}
                        </div>
                    </div>
                </div>


                <div class="row mt-2">

                    <div class="col-md-6">
                        <h5>Other Details</h5>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other_id_name">ID Name:</label>
                            {{$driver->other_id_name}}
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other_id_no">ID No:</label>
                            {{$driver->other_id_no}}
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other_id_file">ID File:</label>
                          
                            <a href="{{asset($driver->other_id_file)}}" target="_blank" rel="noopener noreferrer">  <i class="fas fa-file" aria-hidden="true"></i> File</a>
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
                            {{$driver->edu_certificate_level}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field_of_study">Field of Study:</label>
                            {{$driver->field_of_study}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="school">School:</label>
                            {{$driver->school}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>


@endsection