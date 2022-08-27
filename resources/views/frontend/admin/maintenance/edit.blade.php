@extends('frontend.admin.layouts.master')
@section('content')

<h4>Edit Vehicle Maintenance Details</h4>
<div class="content-wrapper card">

    <div class="content-body card-body">
        <form action="{{route('updateMaintenance')}}" method="POST">
            @csrf
            <div class="row">
            <input type="hidden" class="form-control" id="id" name="id"  value="{{$maintain->id}}">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="capacity">Vehicle no:</label>
                        <select name="vehicle_no_id" id="vehicle_no_id" class="form-control" required>
                        <option value="">Select </option>
                        @foreach($vehicles as $row)
                        <option value="{{$row->id}}" @if($maintain->vehicle_no == $row->id) selected @endif>{{$row->vehicle_no}} </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Date</label>
                    <input type="date" class="form-control" id="service_date" name="service_date"  value="{{$maintain->date}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Current Mileage</label>
                    <input type="text" class="form-control" id="current_mileage" name="current_mileage" value="{{$maintain->current_mileage}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Dealer/Shop</label>

                    <input type="text" class="form-control" id="dealer" name="dealer" value="{{$maintain->dealer}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Service Performed</label>

                    <input type="text" class="form-control" id="service_performed" name="service_performed" value="{{$maintain->service_performed}}"required>
                </div>
                <div class="form-group col-md-6">
                    <label>Invoice or Work Order Number</label>

                    <input type="text" class="form-control" id="invoice_no" name="invoice_no" value="{{$maintain->invoice_no}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Charges</label>

                    <input type="number" class="form-control" id="charges" name="charges" value="{{$maintain->charges}}" required>
                </div>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{route('maintenance')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection










