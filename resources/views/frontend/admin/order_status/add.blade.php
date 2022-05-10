@extends('frontend.admin.layouts.master')

@section('content')


<form action="{{ route('saveOrderStatus') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Order Status</label>
                            <input type="text" class="form-control" id="order_status" name="order_status" placeholder="" required>
                        </div>
                    </div>

                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <button class="btn btn-primary" id="save">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('orderStatus') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>




@endsection