@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Add Leads</h6>
@endsection

@section('content')
<form action="{{ route('addLogisticLead') }}" method="POST">
    @csrf

    <input type="hidden" name="client_id" id="client_id">
    <div class="container mb-4">
        <div class="card p-1">
            <h4 class="pl-4 mb-0 pt-3">Bill To</h4>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>
                            <label for="client_name">Customer Name</label>
                            <input type="text" class="form-control typeahead" id="client_name" name="client_name"
                                placeholder="Customer Name" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="contact_name">Contact Person</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name"
                                placeholder="Contact Person" required>
                        </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>
                            <label for="expected_date">Expected Date</label>
                            <input type="date" class="form-control" id="expected_date" name="expected_date"
                                placeholder="" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="contact_phone">Phone No</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                                placeholder="Contact Person Phone No" required>
                        </span>
                    </div>
        
                </div>
            </div>
        </div>
        <div class="card p-3 mt-3">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h5>Pickup Details</h5>
                </div>
                <div class="col-md-6">
                    <h5>Delivery Details</h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_client">Pickup Customer</label>
                        <input type="text" class="form-control" id="pickup_client" name="pickup_client" required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_client">Delivery Customer</label>
                        <input type="text" class="form-control" id="delivery_client" name="delivery_client" required>
                    </span>
                </div>
            </div>
            {{-- <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_from">Pickup From</label>
                        <input type="text" class="form-control" id="pickup_from" name="pickup_from" required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivered_to">Delivered To</label>
                        <input type="text" class="form-control" id="delivered_to" name="delivered_to" required>
                    </span>
                </div>
            </div> --}}
            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_add_1">Address 1</label>
                        <input type="text" class="form-control" id="pickup_add_1" name="pickup_add_1" required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_add_1">Address 1</label>
                        <input type="text" class="form-control" id="delivery_add_1" name="delivery_add_1" required>
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_add_2">Address 2</label>
                        <input type="text" class="form-control" id="pickup_add_2" name="pickup_add_2">
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_add_2">Address 2</label>
                        <input type="text" class="form-control" id="delivery_add_2" name="delivery_add_2">
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_add_3">Address 3</label>
                        <input type="text" class="form-control" id="pickup_add_3" name="pickup_add_3">
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_add_3">Address 3</label>
                        <input type="text" class="form-control" id="delivery_add_3" name="delivery_add_3">
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">
                    <span>
                        <label for="pickup_pin">ZipCode</label>
                        <input type="text" class="form-control" id="pickup_pin" name="pickup_pin" required>
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="pickup_state">State</label>
                        <input type="text" class="form-control" id="pickup_state" name="pickup_state" required>
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="delivery_pin">ZipCode</label>
                        <input type="text" class="form-control" id="delivery_pin" name="delivery_pin" required>
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="delivery_state">State</label>
                        <input type="text" class="form-control" id="delivery_state" name="delivery_state" required>
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">
                    <span>
                        <label for="pickup_country">Country</label>
                        <input type="text" class="form-control" id="pickup_country" name="pickup_country" required>
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="pickup_location">Location</label>
                        <input type="text" class="form-control" id="pickup_location" name="pickup_location">
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="delivery_country">Country</label>
                        <input type="text" class="form-control" id="delivery_country" name="delivery_country" required>
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="delivery_location">Location</label>
                        <input type="text" class="form-control" id="delivery_location" name="delivery_location">
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_email">Email</label>
                        <input type="text" class="form-control" id="pickup_email" name="pickup_email" required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_email">Email</label>
                        <input type="text" class="form-control" id="delivery_email" name="delivery_email" required>
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_phone">Phone</label>
                        <input type="text" class="form-control" id="pickup_phone" name="pickup_phone" required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_phone">Phone</label>
                        <input type="text" class="form-control" id="delivery_phone" name="delivery_phone" required>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="card p-3 mt-3">
            <input type="hidden" name="product_row_count" id="product_row_count">
            <div>
                <a class="btn btn-link text-dark px-3 mb-0" id="add_product" href="#"><i
                        class="fas fa-plus text-dark me-2" aria-hidden="true"></i>Add Product</a>
            </div>
            <table class="table mb-0 table-responsive">
                <thead>
                    <tr>
                        <th class="text-uppercase" scope="col">
                            <p class="mb-0 mt-0 text-xs font-weight-bolder">Product Name</p>
                        </th>
                        <th class="text-uppercase" scope="col">
                            <p class="mb-0 mt-0 text-xs font-weight-bolder">Dimension</p>
                        </th>
                        <th class="text-uppercase" scope="col">
                            <p class="mb-0 mt-0 text-xs font-weight-bolder">Quantity</p>
                        </th>
                        <th class="text-uppercase" scope="col">
                            <p class="mb-0 mt-0 text-xs font-weight-bolder">UOM</p>
                        </th>
                        <th class="text-uppercase" scope="col">
                            <p class="mb-0 mt-0 text-xs font-weight-bolder">Area</p>
                        </th>
                        <th class="text-uppercase" scope="col">
                            <p class="mb-0 mt-0 text-xs font-weight-bolder">Weight</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-2">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
</form>

<script>
    $('#client_name').autocomplete({
        source: function (request, response) {
            $.ajax({
                type: 'get',
                url: "{{ route('searchcustomer') }}",
                dataType: "json",
                data: {
                    term: $('#client_name').val()
                },
                success: function (data) {
                    response(data);
                    console.log(data)
                },
            });
        },
        select: function (event, ui) {
            if (ui.item.id != 0) {
                $('#client_id').val(ui.item.id);
                // $('#pickup_email').val(ui.item.email);
                // $('#pickup_phone').val(ui.item.phone);
            }
        },
        minLength: 1,
    });
    $('#contact_name').autocomplete({
        source: function (request, response) {
            $.ajax({
                type: 'get',
                url: "{{ route('searchcontact') }}",
                dataType: "json",
                data: {
                    // term: $('#contact_name').val(),
                    client_id: $('#client_id').val() 
                },
                success: function (data) {
                    response(data);
                    console.log(data)
                },
            });
        },
        select: function (event, ui) {
            if (ui.item.id != 0) {  
                // $('#pickup_email').val(ui.item.email);
                $('#contact_phone').val(ui.item.mobile);
            }
        },
        minLength: 1,
    });
    $('#pickup_client').autocomplete({
        source: function (request, response) {
            $.ajax({
                type: 'get',
                url: "{{ route('searchcustomer') }}",
                dataType: "json",
                data: {
                    term: $('#pickup_client').val()
                },
                success: function (data) {
                    response(data);
                    console.log(data);
                },
            });
        },
        select: function (event, ui) {
            if (ui.item.id != 0) {
                $('#pickup_add_1').val(ui.item.address);
                $('#pickup_pin').val(ui.item.zipcode);
                $('#pickup_state').val(ui.item.state);
                $('#pickup_country').val(ui.item.country);
                $('#pickup_email').val(ui.item.email);
                $('#pickup_phone').val(ui.item.phone);
            }
        },
        minLength: 1,
    });
    $('#delivery_client').autocomplete({
        source: function (request, response) {
            $.ajax({
                type: 'get',
                url: "{{ route('searchcustomer') }}",
                dataType: "json",
                data: {
                    term: $('#delivery_client').val()
                },
                success: function (data) {
                    response(data);
                    console.log(data);
                },
            });
        },
        select: function (event, ui) {
            if (ui.item.id != 0) {
                $('#delivery_add_1').val(ui.item.address);
                $('#delivery_pin').val(ui.item.zipcode);
                $('#delivery_state').val(ui.item.state);
                $('#delivery_country').val(ui.item.country);
                $('#delivery_email').val(ui.item.email);
                $('#delivery_phone').val(ui.item.phone);
            }
        },
        minLength: 1,
    });


    window.count = 1;
    $('#add_product').click(function () {
        console.log('add product')
        console.log(window.count);
        $('#product_row_count').val(window.count);
        $('tbody').append(`
                            <tr>
                                <td><input type="text" class="form-control" name="product_name${window.count}" id="product_name${window.count}" required></td>
                                <td><input type="text" class="form-control" name="dimension${window.count}" id="dimension${window.count}"></td>
                                <td><input type="number" class="form-control" name="quantity${window.count}" id="quantity${window.count}" min="1" required></td>
                                <td><input type="text" class="form-control" name="uom${window.count}" id="uom${window.count}" required></td>
                                <td><input type="text" class="form-control" name="area${window.count}" id="area${window.count}"></td>
                                <td><input type="text" class="form-control" name="weight${window.count}" id="weight${window.count}"></td>
                            </tr>
                        `);
            window.count++;
    });
</script>
@endsection