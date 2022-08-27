@extends('frontend.admin.employee.index')

@section('employee_content')
<form action="" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('addJobPosition') }}" class="btn btn-primary">Add Job Position</a>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control mr-1" id="position_name" placeholder="Search..."
                    name="position_name">
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
    @foreach($jobPositions as $j )
        <div class="card m-2 p-3" style="width: 15rem">
            <a href="#">
                <div class="card-body p-2">
                    <h5 class="mb-0">{{ $j->position_name }}</h5>
                    <p class="mb-0">{{ $j->position_description }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection