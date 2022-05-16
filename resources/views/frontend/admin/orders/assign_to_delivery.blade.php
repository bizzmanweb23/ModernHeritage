@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Assign to Delivery</h6>
@endsection

@section('content')
<form action="{{ route('addToDelivery') }}" method="POST">
    @csrf

    <div class="container mb-4">
        <div class="card p-1">
            <h4 class="pl-4 mb-0 pt-3"></h4>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>
                        <input type="hidden" class="form-control" id="order_id" name="order_id" value="{{$data->id}}" required>
                        <input type="hidden" class="form-control" id="status" name="status" value="{{$data->order_status}}" required>
                            <label for="client_id">Customer/Company Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{$data->customer_name}}" placeholder="Contact Person" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="contact_name">Contact Person</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Contact Person" required>
                        </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>
                            <label for="expected_date">Expected Delivery Date</label>
                            <input type="date" class="form-control" id="expected_date" name="expected_date" placeholder="" required>
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="contact_phone">Phone No</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{$data->customer_phone}}" placeholder="Contact Person Phone No" required>
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
                        <label for="pickup_client">Pickup Customer/Company</label>
                        <input type="text" class="form-control" id="pickup_client" name="pickup_client" value="{{$admin->user_name}}"required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_client">Delivery Customer/Company</label>
                        <input type="text" class="form-control" id="delivery_client" name="delivery_client" value="{{$data->customer_name}}" required>
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_add_1">Address 1</label>
                        <input type="text" class="form-control" id="pickup_add_1" name="pickup_add_1" value="{{$admin->address_1}}" required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_add_1">Address 1</label>
                        <input type="text" class="form-control" id="delivery_add_1" name="delivery_add_1" value="{{$data->delivery_address}}" required>
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
                        <input type="text" class="form-control" id="pickup_pin" name="pickup_pin" value="{{$admin->zipcode}}"required>
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="pickup_state">State</label>
                        <input type="text" class="form-control" id="pickup_state" name="pickup_state"  value="{{$admin->state}}"required>
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="delivery_pin">ZipCode</label>
                        <input type="text" class="form-control" id="delivery_pin" name="delivery_pin" required value="{{$data->delivery_zipcode}}">
                    </span>
                </div>
                <div class="col-md-3">
                    <span>
                        <label for="delivery_state">State</label>
                        <input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{$data->delivery_state}}" required>
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3">
                    <span>
                        <label for="pickup_country">Country</label>
                        <input type="text" class="form-control" id="pickup_country" name="pickup_country" value="{{$admin->country}}"required>
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
                        <input type="text" class="form-control" id="delivery_country" name="delivery_country" value="{{$data->delivery_country}}" required>
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
                        <input type="text" class="form-control" id="pickup_email" name="pickup_email" value="{{$admin->email}}"required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_email">Email</label>
                        <input type="text" class="form-control" id="delivery_email" name="delivery_email" value="{{$data->customer_email}}" required>
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <span>
                        <label for="pickup_phone">Phone</label>
                        <input type="text" class="form-control" id="pickup_phone" name="pickup_phone" value="{{$admin->mobile}}"required>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                        <label for="delivery_phone">Phone</label>
                        <input type="text" class="form-control" id="delivery_phone" name="delivery_phone" value="{{$data->customer_phone}}" required>
                    </span>
                </div>
            </div>
            <div class="mb-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </div>


    </div>


</form>

<script>

   
    $('#pickup_client').autocomplete({
        source: function(request, response) {
            $.ajax({
                type: 'get',
                url: "{{ route('searchcustomer') }}",
                dataType: "json",
                data: {
                    term: $('#pickup_client').val()
                },
                success: function(data) {
                    response(data);
                    console.log(data);
                },
            });
        },
        select: function(event, ui) {
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



    window.count = 1;
    $('#add_product').click(function() {
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