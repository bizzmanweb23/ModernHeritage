@extends('frontend.admin.layouts.master')

@section('content')


<form action="{{ route('editOrderStatus') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row mt-1">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="{{$data->id}}">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Order Status</label>
                            <input type="text" class="form-control" id="order_status" name="order_status" placeholder="" value="{{$data->order_status}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Order Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value=""> --Select-- </option>
                                <option value="1" @if($data->status == 1) selected @endif> Active </option>
                                <option value="0" @if($data->status == 0) selected @endif> Inactive </option>
                            </select>

                        </div>
                    </div>

                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <button class="btn btn-warning" id="save">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('orderStatus') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>




@endsection