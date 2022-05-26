@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updatePassword') }}" method="POST" enctype="multipart/form-data">
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
                            <label>Permissions to all '{{$type}}' Users</label>
                            <select name="color[]" id="color" class="form-control" required multiple>
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
<script>
    $('#color').select2({
        width: '100%',
        placeholder: "Select Permissions",
        allowClear: true
    });
</script>
@endsection