@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Logistic Dashboard</h6>
@endsection

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- The Driver Modal -->
<div class="modal" id="assignDriverModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('assign-driver') }}" method="post">
                @csrf
                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">Assign Driver</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-2">
                            <div class="col-md-2"><label for="driver_id">Customer/Company Name</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="client_name" name="client_name" placeholder="" required>
                            </div>
                            <div class="col-md-2"><label for="driver_id">Driver Name:</label></div>
                            <div class="col-md-4">
                                <select name="driver_id" id="driver_id" class="form-control" required>
                                    <option value="">Select Driver</option>
                                    @foreach ($drivers as $d)
                                    <option value="{{ $d->unique_id }}">{{ $d->emp_name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><label for="">Pickup Customer/Company</label></div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="pickup_from" name="pickup_from" required>
                                </div>
                        <div class="col-md-2"><label for="">Delivery Customer/Company</label></div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="delivered_to" name="delivered_to" required>
                                </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><label for="">Pickup Address</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="pickup_add_1" name="pickup_add_1" required>
                            </div>
                        <div class="col-md-2"><label for="">Delivery Address</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="delivery_add_1" name="delivery_add_1" required>
                            </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><label for="">Zip Code</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="pickup_pin" name="pickup_pin" required>
                            </div>
                        <div class="col-md-2"><label for="">Zip Code</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="delivery_pin" name="delivery_pin" required>
                            </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><label for="">State</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="pickup_state" name="pickup_state" required>
                            </div>
                        <div class="col-md-2"><label for="">State</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="delivery_state" name="delivery_state" required>
                            </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><label for="">Country</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="pickup_country" name="pickup_country" required>
                            </div>
                        <div class="col-md-2"><label for="">Country</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="delivery_country" name="delivery_country" required>
                            </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2"><label for="">Phone</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="pickup_phone" name="pickup_phone" required>
                            </div>
                        <div class="col-md-2"><label for="">Phone</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="delivery_phone" name="delivery_phone" required>
                            </div>
                    </div>
                    <div class="row mb-2">
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
                    <div class="row mb-2">
                        <div class="col-md-2"><label for="">Start Time:</label></div>
                        <div class="col-md-4">
                            <input type="datetime-local" class="form-control modal_input" id="start_time" name="start_time"  placeholder="" required>
                        </div>
                        <div class="col-md-2"><label for="">End Time:</label></div>
                        <div class="col-md-4">
                            <input type="datetime-local" class="form-control modal_input" id="end_time" name="end_time"  placeholder="" required>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" id="btn_driver" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="container">
    <a class="btn btn-success"
        href="#" data-bs-toggle="modal" data-bs-target="#assignDriverModal">Assign Driver</a>      
      <h1></h1>
      <div id='calendar_id'></div>
      {!! $calendar->calendar() !!}
   </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
<script>
    let current_date = new Date().toLocaleString("sv-SE", {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit"
    }).replace(" ", "T");
    window.count = 1;
    $('#add_product').click(function () {
        console.log('add product')
        console.log(window.count);
        $('#product_row_count').val(window.count);
        $('tbody').append(`
                            <tr>
                                <td><input type="text" class="form-control" name="product_name${window.count}" id="product_name${window.count}" ></td>
                                <td><input type="text" class="form-control" name="dimension${window.count}" id="dimension${window.count}"></td>
                                <td><input type="number" class="form-control" name="quantity${window.count}" id="quantity${window.count}" min="1" ></td>
                                <td><input type="text" class="form-control" name="uom${window.count}" id="uom${window.count}" ></td>
                                <td><input type="text" class="form-control" name="area${window.count}" id="area${window.count}"></td>
                                <td><input type="text" class="form-control" name="weight${window.count}" id="weight${window.count}"></td>
                            </tr>
                        `);
            window.count++;
    });
    $('#start_time').on('change',function(){
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val(); 
        if(start_time <= current_date){
            alert("Start Date can't be before or current date");   
            document.getElementById('start_time').value = "";
        }
    });
    $('#end_time').on('change',function(){
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
         if (end_time <= current_date){
            alert("End Date can't be before or current date");
            document.getElementById('end_time').value = "";
        }
    });
</script>
@endsection
