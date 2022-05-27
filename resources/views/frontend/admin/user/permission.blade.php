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
                            <input value="" type="hidden" name="title" id="title"/>
                            <h6>Permissions to all '{{$data->name}}' </h6>
                            <select name="permission[]" id="permission" class="form-control" required multiple>
                         
                                 @foreach($permissions as $per)
                                 <option value="{{$per->id}}">{{$per->name}}</option>
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
    $('#permission').select2({
        width: '100%',
        placeholder: "Select Permissions",
        allowClear: true
    });
</script>
@endsection