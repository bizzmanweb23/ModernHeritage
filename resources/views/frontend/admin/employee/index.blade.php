@extends('frontend.admin.layouts.master')

@section('content')
<form action="" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('addEmployee') }}" class="btn btn-primary">Add Employee</a>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control mr-1" id="emp_name" placeholder="Search..."
                    name="emp_name">
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
    @foreach($employees as $e )
        <div class="card m-2" style="width: 23rem">
            <a href="#">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-4">
                            @if(isset($e->emp_image))
                                <img src="{{ asset($e->emp_image) }}" alt="Product"
                                    style="height: 7rem; width:7rem">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 7rem; width: 7rem">
                            @endif
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0">{{ $e->emp_name }}</p>
                            <p class="mb-0">{{ $e->work_email }}</p>
                            <p class="mb-0">{{ $e->work_mobile }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection