@extends('frontend.admin.layouts.master')

@section('content')
@if(empty($data))
<form action="{{ route('givePermission') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ Session::get('message') }}</strong>

        </div>
        @endif
        <div class="card">
            <div class="card-body">
        
                <div class="row mt-1">

                <div class="col-md-12">
                        <div class="form-group">
                            <input value="{{$type}}" type="hidden" name="title" id="title"/>
                            <h6>Permissions to all '{{$type}}' Users</h6>
                            <select name="permission[]" id="permission" class="form-control" required multiple>
                                <option value="all">All</option>
                                <option value="Order Management">Order Management</option>
                                <option value="Inventory Management">Inventory Management</option>
                                <option value="Customer Management">Customer Management</option>
                                <option value="Warehouse Management">Warehouse Management</option>
                                <option value="Employee Management">Employee Management</option>
                                <option value="User Management">User Management</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="ms-auto text-end">
                    <button class="btn btn-primary" id="save">Save</button>

                </div>


            </div>
        </div>
    </div>
</form>
@else
<form action="{{ route('givePermission') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ Session::get('message') }}</strong>

        </div>
        @endif
        <div class="card">
            <div class="card-body">
        
                <div class="row mt-1">

                <div class="col-md-12">
                        <div class="form-group">
                            <input value="{{$type}}" type="hidden" name="title" id="title"/>
                            <h6>Permissions to all '{{$type}}' Users update
                                {{$data->permissions}}
                            </h6>
                            <select name="permission[]" id="permission" class="form-control" required multiple>
                             
                                <option value="all">All</option>
                                <option value="Order Management">Order Management</option>
                                <option value="Inventory Management">Inventory Management</option>
                                <option value="Customer Management">Customer Management</option>
                                <option value="Warehouse Management">Warehouse Management</option>
                                <option value="Employee Management">Employee Management</option>
                                <option value="User Management">User Management</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="ms-auto text-end">
                    <button class="btn btn-primary" id="save">Save</button>

                </div>


            </div>
        </div>
    </div>
</form>
@endif
<script>
    $('#permission').select2({
        width: '100%',
        placeholder: "Select Permissions",
        allowClear: true
    });
</script>
@endsection