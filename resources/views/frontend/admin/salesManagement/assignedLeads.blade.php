@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Assigned Leads</h6>
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
    @foreach($assigned_leads as $al )
        <div class="card m-2" style="width: 18rem">
            <div class="card-body p-2">
                <p class="text-s font-weight-bolder mb-0">{{$al->unique_id}}</p>
                        <p class="text-s font-weight-bold mb-0">
                            <label for="" class="mb-0">Customer Name: </label>
                            {{$al->client_name}}
                        </p>
                        <p class="text-s font-weight-bold mb-0">
                            <label for="" class="mb-0">Contact: </label>
                            {{$al->contact_name}}
                        </p>
                <a href="{{ url('/') }}/admin/logistic/viewrequest/{{ $al->id }}/assign_leads" class=" btn btn-sm btn-dark">View Leads
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
