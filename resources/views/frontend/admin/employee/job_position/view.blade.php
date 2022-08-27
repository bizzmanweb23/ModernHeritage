@extends('frontend.admin.layouts.master')

@section('content')
<form action="{{ route('updateJobPosition') }}" method="post">
   
        <div class="card">
            <div class="card-body">
               
            <div class="ms-auto text-end">
                    
                    <a class="btn btn-link px-3 mb-0" id="back"
                        href="{{ route('allJobPosition') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>

                        Back</a>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position_name">Job Position :</label>
                            {{$data->position_name}}
                           
                         
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position_name">Department :</label>
                            {{$data->department_name}}
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="form-group company" id="employee">
                            <label for="manager">Manager :</label>
                        
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company" id="employee">
                            <label for="manager">Status :</label>
                            @if($data->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-success">Inactive</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="position_description">Job Position Description :</label>
                        {{$data->position_description}}

                          
                    </div>
                </div>
                
            </div>
        </div>
</form>
@endsection