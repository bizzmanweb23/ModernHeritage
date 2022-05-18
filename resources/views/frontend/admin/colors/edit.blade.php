@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">
        @if(Session::has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> {{ Session::get('message') }}</strong>

            </div>
            @endif
            <form action="{{ route('updateColors') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <span class="mb-2 ">Color
                        <input type="hidden" name="id" id="id" value="{{$data->id}}"  class="form-control"  />
                            <input type="text" name="color_name" id="color_name" value="{{$data->name}}" placeholder="Add Color Name" class="form-control" required />
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span class="mb-2">Status
                            <select name="status" id="status" class="form-control">

                                <option value="1" @if($data->hex==1) selected @endif>Active</option>
                                <option value="0" @if($data->hex==0) selected @endif>Inactive</option>

                            </select>
                        </span>
                    </div>
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-info" id="back"
                        href="{{ route('colors') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection