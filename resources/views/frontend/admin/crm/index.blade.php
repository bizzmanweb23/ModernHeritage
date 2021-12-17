@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">CRM</h6>
@endsection

@section('content')
<style>
    .ui-front {
    z-index: 9999999 !important;
}
</style>
<a href= "#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Create</a>

<!-- The Add Client Modal -->
<div class="modal" id="addClientModal">
    <div class="modal-dialog">
      <div class="modal-content">
        @include('frontend.admin.crm.addClientModal')
      </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('saverequest')}}" method="POST">
            @csrf

            <input type="hidden" name="customer_id" id="customer_id">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add leads</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>       
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="lead_customer_name">Client Name</label></div>
                        <div class="col-md-7">
                            <input type="text" class="form-control typeahead" id="lead_customer_name" name="lead_customer_name" placeholder="Name" required>
                        </div>
                        <div class="col-md-1">
                            <a href="#" class="btn btn-link px-2 mb-0" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#addClientModal">
                                <i class="fas fa-sign-out-alt fa-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="lead_opportunity">Opportunity</label></div>
                            <div class="col-md-8"><input type="text" class="form-control" id="lead_opportunity" name="lead_opportunity" placeholder="opportunity" required></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"> <label for="lead_email">Email</label></div>
                        <div class="col-md-8"><input type="email" class="form-control" id="lead_email" name="lead_email" placeholder="Email"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="lead_mobile">Mobile No</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" id="lead_mobile" name="lead_mobile" placeholder="Mobile No"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"> <label for="lead_expected_price">Expected Price</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" id="lead_expected_price" name="lead_expected_price" placeholder="₹ "></div>
                    </div>
                    </div>
    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
        </form>
      </div>
    </div>
</div>

<div class="container-fluid pt-3">
    <div class="row flex-row flex-sm-nowrap py-3">
        @foreach($stage as $s)
        <div class="col-sm-6 col-md-4 col-xl-3">
            <div class="card bg-light">
                <div class="card-body">
                    <h6 class="card-title text-uppercase text-truncate py-2">{{$s->stage_name}}</h6>
                    <div class="items border border-light">
                    @foreach($lead as $l)
                        @if($l->stage_id==$s->id)
                        <div class="card draggable shadow-sm" id="cd1" draggable="false" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title">
                                <p class="text-s font-weight-bolder mb-0">{{$l->opportunity}}</p>
                                <p class="text-s font-weight-bold mb-0">{{$l->client_name}}</p>
                                <p class="text-s font-weight-bold mb-0">₹ {{$l->expected_price}}</p>
                                </div>
                                <a class="btn btn-primary btn-sm" href="{{ url('/') }}/admin/viewrequest/{{ $l->id }}">View</a>                               
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

<script type="text/javascript">
    $('#lead_customer_name').autocomplete({
             source: function(request, response) {
                 $.ajax({
                     type: 'get',
                     url: "{{ route('searchcustomer') }}",
                     dataType: "json",
                     data: {
                         term: $('#lead_customer_name').val()
                     },
                     success: function(data) {
                         response(data);
                         console.log(data)
                     },
                 });
             },
             select: function(event, ui) {
                 if (ui.item.id != 0) {
                     $('#customer_id').val(ui.item.id);
                     $('#lead_email').val(ui.item.email);
                     $('#lead_mobile').val(ui.item.phone);
                     $('#lead_opportunity').val(ui.item.opportunity);
                 }
             },
             minLength: 1,
         });
 </script>
@endsection
