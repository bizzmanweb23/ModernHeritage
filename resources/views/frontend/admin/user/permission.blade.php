@extends('frontend.admin.layouts.master')

@section('content')

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
                            <input value="{{$data->id}}" type="hidden" name="role_id" id="role_id"/>
                            <h6>Permissions to all '{{$data->name}}' </h6>
                            <select name="permissions[]" id="permissions" class="form-control" required multiple>
                         
                                 @foreach($s_per as $per)
                                 <option value="{{$per->id}}" selected>{{$per->name}}</option>
                                 @endforeach
                                 @foreach($r_per as $per)
                                 <option value="{{$per->id}}" >{{$per->name}}</option>
                                 @endforeach
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
    $('#permissions').select2({
        width: '100%',
        placeholder: "Select Permissions",
        allowClear: true
    });
</script>
@endsection