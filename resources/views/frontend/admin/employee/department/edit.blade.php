@extends('frontend.admin.layouts.master')

@section('content')
<form action="{{ route('updateDepartment') }}" method="post">
    @csrf
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
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department_name">Department Name:</label>
                            <input type="hidden" class="form-control" id="id" name="id"
                                placeholder="Enter Department Name" value="{{$department->id}}"required>
                            <input type="text" class="form-control" id="department_name" name="department_name"
                                placeholder="Enter Department Name" value="{{$department->department_name}}"required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company" id="employee">
                            <label for="manager">Manager</label>
                            <select name="manager" id="manager" class="form-control">
                                <option value=""> --Select-- </option>
                                @foreach($employee as $e)
                                    <option value="{{ $e->emp_name }}" @if($department->manager == $e->emp_name) selected @endif>{{ $e->emp_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company" id="employee">
                            <label for="manager">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" @if($department->status == 1) selected @endif> Active </option>
                                <option value="0" @if($department->status == 0) selected @endif> Inactive</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="ms-auto text-end">
                    <button class="btn btn-primary px-3 mb-0" id="save">Update</button>
                    <a class="btn btn-secondary px-3 mb-0" id="back"
                        href="{{ route('departments') }}">Back</a>
                </div>
            </div>
        </div>
</form>
@endsection