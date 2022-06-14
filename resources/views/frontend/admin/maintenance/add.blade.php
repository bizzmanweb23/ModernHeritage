@extends('frontend.admin.layouts.master')
@section('content')

<h4>Add Vehicle Maintenance Details</h4>
<div class="content-wrapper card">

    <div class="content-body card-body">
        <form action="{{route('saveMaintenance')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="capacity">Vehicle no:</label>
                        <select name="vehicle_no_id" id="vehicle_no_id" class="form-control" required>
                        <option value="">Select </option>
                        @foreach($vehicles as $row)
                        <option value="{{$row->id}}">{{$row->vehicle_no}} </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Date</label>
                    <input type="date" class="form-control" id="service_date" name="service_date"  required>
                </div>
                <div class="form-group col-md-6">
                    <label>Current Mileage</label>
                    <input type="text" class="form-control" id="current_mileage" name="current_mileage" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Dealer/Shop</label>

                    <input type="text" class="form-control" id="dealer" name="dealer" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Service Performed</label>

                    <input type="text" class="form-control" id="service_performed" name="service_performed" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Invoice or Work Order Number</label>

                    <input type="text" class="form-control" id="invoice_no" name="invoice_no" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Charges</label>

                    <input type="text" class="form-control" id="charges" name="charges" required>
                </div>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('maintenance')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection










