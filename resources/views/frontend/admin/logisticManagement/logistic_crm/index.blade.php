@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Logistic CRM</h6>
@endsection

@section('content')
<a href= "{{ route('addLogisticLead') }}" class="btn btn-primary">Create</a>

<div class="container-fluid pt-3">
    <div class="row flex-row flex-sm-nowrap py-3">
        @foreach($logistic_stage as $s)
        <div class="col-sm-6 col-md-4 col-xl-3">
            <div class="card bg-light">
                <div class="card-body">
                    <h6 class="card-title text-uppercase text-truncate py-2">{{$s->stage_name}}</h6>
                    <div class="items border border-light">
                    @foreach($logistic_lead as $l)
                        @if($l->stage_id==$s->id)
                        <div class="card draggable shadow-sm" id="cd1" draggable="false" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title">
                                <p class="text-s font-weight-bolder mb-0">{{$l->unique_id}}</p>
                                <p class="text-s font-weight-bold mb-0">Client Name: {{$l->client_name}}</p>
                                <p class="text-s font-weight-bold mb-0">Contact Person: {{$l->contact_name}}</p>
                                <p class="text-s font-weight-bold mb-0">Delivered To: {{$l->delivered_to}}</p>
                                </div>
                                <a class="btn btn-primary btn-sm" href="#">View</a>                               
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
