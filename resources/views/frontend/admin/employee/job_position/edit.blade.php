@extends('frontend.admin.layouts.master')

@section('content')
<form action="{{ route('updateJobPosition') }}" method="post">
    @csrf
        <div class="card">
            <div class="card-body">
               
             
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position_name">Job Position:</label>
                            <input type="text" class="form-control" id="position_name" name="position_name"
                                placeholder="Enter job position" value="{{$data->position_name}}"required>
                            <input type="hidden" class="form-control" id="id" name="id"
                                placeholder="Enter job position" value="{{$data->id}}"required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position_name">Department:</label>
                            <select name="dpt_id" id="dpt_id" class="form-control" required>
                                <option value=""> --Select-- </option>
                                @foreach($department as $d)
                                    <option value="{{ $d->id }}" @if($data->dpt_id == $d->id) selected @endif>{{ $d->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="form-group company" id="employee">
                            <label for="manager">Manager</label>
                            
                            <select name="manager" id="manager" class="form-control">
                                <option value=""> --Select-- </option>
                                @foreach($employee as $e)
                                    <option value="{{ $e->unique_id }}"  @if($data->manager == $e->unique_id) selected @endif >{{ $e->emp_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company" id="employee">
                            <label for="manager">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" @if($data->status == 1) selected @endif> Active </option>
                                <option value="0" @if($data->status == 0) selected @endif> Inactive</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="position_description">Job Position Description:</label>
                        <textarea class="form-control" id="position_description" name="position_description">{{$data->position_description}}</textarea>
                          
                    </div>
                </div>
                <div class="ms-auto text-end">
                    <button class="btn btn-primary px-3 mb-0" id="save">Update</button>
                    <a class="btn btn-secondary px-3 mb-0" id="back"
                        href="{{ route('allJobPosition') }}"></i>Back</a>
                </div>
            </div>
        </div>
</form>
@endsection