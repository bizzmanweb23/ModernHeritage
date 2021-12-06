@extends('frontend.admin.layouts.master')

@section('content')
<form action="" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('addUser') }}" class="btn btn-primary">Add User</a>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control mr-1" id="user_name" placeholder="Search..."
                    name="user_name">
                <div>
                    <button type="submit" style="border-radius: 10px">
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class= "d-flex flex-row flex-wrap">
    @foreach($allUser as $u )
        <div class="card m-2" style="width: 23rem">
            <a href="{{ url('/') }}/admin/userdetails/{{ $u->id }}">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-4">
                            @if(isset($u->customer_image))
                                <img src="{{ asset($u->customer_image) }}" alt="Product"
                                    style="height: 7rem; width:7rem">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 7rem; width: 7rem">
                            @endif
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0">{{ $u->user_name }}</p>
                            <p class="mb-0">{{ $u->email }}</p>
                            <p class="mb-0">{{ $u->mobile }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection