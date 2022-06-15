@extends('frontend.admin.layouts.master')
@section('content')

<h4>Vehicle Maintenance Details</h4>
<div class="content-wrapper card">

    <div class="content-body card-body">
       
            <div class="row">
      
            <div class="ms-auto text-end">
                   

                   <a href="{{route('maintenance')}}" class="btn btn-link"> <i class="fa fa-arrow-left"></i> Back</a>
               </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="capacity">Vehicle no:</label>
                        {{$maintain->vehicleNo}}
                        
                        
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Date</label>
                    {{$maintain->date}}
                </div>
                <div class="form-group col-md-6">
                    <label>Current Mileage</label>
                    {{$maintain->current_mileage}}
                </div>
                <div class="form-group col-md-6">
                    <label>Dealer/Shop</label>
                    {{$maintain->dealer}}
                    
                </div>
                <div class="form-group col-md-6">
                    <label>Service Performed</label>
                    {{$maintain->service_performed}}
                   
                </div>
                <div class="form-group col-md-6">
                    <label>Invoice or Work Order Number</label>
                    {{$maintain->invoice_no}}
                    
                </div>
                <div class="form-group col-md-6">
                    <label>Charges</label>
                    {{$maintain->charges}}
                    
                </div>
               
            </div>
   
    </div>
</div>
@endsection










