@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Sales Person Activity</h6>
@endsection

@section('content')
<form action="#" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-5">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control mr-1" id="customer_name" placeholder="Search..."
                    name="customer_name">
                <div>
                    <button type="submit" style="border-radius: 10px">
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="d-flex flex-row flex-wrap">
    @foreach($salesPersons as $sp )
        <div class="card m-2" style="width: 23rem">
            
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-4">
                            @if(isset($sp->emp_image))
                                <img src="{{ asset($sp->emp_image) }}" alt="Product"
                                    style="height: 7rem; width:7rem">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 7rem; width:7rem">
                            @endif
                        </div>
                        <div class="col-sm-8">
                            <p class="mb-0">{{ $sp->emp_name }}</p>
                            <p class="mb-0">{{ $sp->work_email }}</p>
                            <p class="mb-0">{{ $sp->work_mobile }}</p>
                            <a href="{{ route('assignedleads',['salesperson_id' => $sp->unique_id]) }}" class=" btn btn-sm btn-dark">Assigned Leads
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
</div>
@endsection
