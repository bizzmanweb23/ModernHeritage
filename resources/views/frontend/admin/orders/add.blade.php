@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('addOrder') }}" method="POST">
    @csrf

    <div class="container mb-4">
    <h5>Fleet Order Form</h5>
        <div class="card p-1">
            <h4 class="pl-4 mb-0 pt-3"></h4>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>

                            <label>Customer ID <span style="color:red">*</span> </label>
                            <input type="text" class="form-control" id="customer_id" name="customer_id" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="order_date">Date <span style="color:red">*</span></label>
                            <input type="date" class="form-control" id="order_date" name="order_date" required>
                        </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>
                            <label for="order_time">Time <span style="color:red">*</span>:</label>
                            <input type="time" class="form-control" id="order_time" name="order_time" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="pickup_address">Pickup Address <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="pickup_address" name="pickup_address" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="delivery_address">Delivery Address<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="delivery_address" name="delivery_address" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="type">Type of renal <span style="color:red">*</span></label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="">--Select-- </option>
                                <option value="1">Trip (Basis 3Hrs) </option>
                                <option value="2">Daily (8hrs) </option>

                                <option value="3">Weekly (Mon to Sat) </option>
                                <option value="4">Other </option>
                            </select>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="vehicle_id">Lorry Crane (Ton) <span style="color:red">*</span></label>
                            <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                                <option value="">--Select-- </option>
                                <option value="1">10Ton Lorry Crane (18Ton Load Capacity)</option>
                                <option value="2">15Ton Lorry Crane </option>
                                <option value="3">20Ton Lorry Crane </option>
                                <option value="4">25Ton Lorry Crane </option>
                                <option value="5">35Ton Lorry Crane </option>
                                <option value="6">55Ton Lorry Crane </option>
                                <option value="7">75Ton Lorry Crane </option>
                                <option value="8">3Ton Lorry Crane (14ft)</option>
                            </select>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="po_number">PO / SO Number (If applicable)</label>
                            <input type="text" class="form-control" id="po_number" name="po_number" required>
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Remarks</label>
                        <textarea id="remarks" name="remarks" class="form-control"></textarea>
                    </div>
                    <div class="ms-auto text-end">
                        <button type="submit" class="btn btn-primary">Save</button>

                        <a href="{{route('orderList')}}" class="btn btn-info">Back</a>
                    </div>

                </div>
            </div>
        </div>



    </div>


</form>



@endsection