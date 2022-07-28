@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Logistic Dashboard</h6>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <style>
        .fc-agendaWeek-button{
            display:none;
        }
        .fc-title{
            font-weight: 600;  
            color:red;
            /* overflow-x: scroll;
            overflow-y: scroll; */
            /* border-bottom:1px solid #000; */
        } 
        .fc-time{
            font-weight: 600;   
        } 
        
    </style>

<!-- Extra Modal -->
<div class="modal" id="ExtraModal">
    <div class="modal-dialog">
        <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">Assign Driver</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- <div class="row mb-2"><h5>Existing Order</h5> -->
                            <div class="row">
                                <div class="col-md-4"><span>Existing Order</span></div>
                                <div class="col-md-8">
                                    <div style="display: flex; flex-wrap: no-wrap">
                                        <input type="text" class="form-control mr-1" id="order_no" placeholder="Enter Delivery Order No.">
                                        <div>
                                            <button type="button" id="searchbtn" style="border-radius: 10px">
                                                <i class="fas fa-search fa-2x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="#"  id="new_order" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignDriverModal">New Order</a>
                        <button type="submit" id="search" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignDriverModal">Search</button>
                    </div>
                </div>
        </div>
    </div>
</div>
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
                                <input type="hidden" id="lead_id" >
                                <input type="text" class="form-control" id="client_name" name="client_name" placeholder="" required>
                            </div>
                            <div class="col-md-2"><label for="driver_id">Customer Phone No.</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="contact_phone" name="contact_phone" placeholder="" required>
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
                        <div class="col-md-2"><label for="">Email</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="pickup_email" name="pickup_email" required>
                            </div>
                        <div class="col-md-2"><label for="">Email</label></div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="delivery_email" name="delivery_email" required>
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
                        <div class="col-md-6"><label for="driver_id">Driver Name:</label></div>
                            <div class="col-md-6">
                                <select name="driver_id" id="driver_id" class="form-control" required>
                                    <option value="">Select Driver</option>
                                    @foreach ($drivers as $d)
                                    <option value="{{ $d->unique_id }}">{{ $d->emp_name }}</option> 
                                    @endforeach
                                </select>
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
    <!-- <a class="btn btn-success" 
                href="#" data-bs-toggle="modal" data-bs-target="#assignDriverModal">Assign Driver</a>       -->
    <a class="btn btn-success" 
                href="#" data-bs-toggle="modal" data-bs-target="#ExtraModal">Assign Driver</a>      
    <a class="btn btn-success float-right"
        href="{{route('ViewDriverCalander')}}">Check Driver availability</a>      
   
      <div id='calendar_id'></div>
      {!! $calendar->calendar() !!}
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
<script>
$(document).ready(function() {
    $('#search').attr('disabled',true);
    $('#searchbtn').attr('disabled',true);
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
        if(start_time <= current_date){
            alert("Start Date can't be before or current date");   
            document.getElementById('start_time').value = "";
        }
    });
    $('#end_time').on('change',function(){
         var end_time = $('#end_time').val();
         if (end_time <= current_date){
            alert("End Date can't be before or current date");
            document.getElementById('end_time').value = "";
         }
    });
    $('#order_no').on('change', function() {
        var order_no = $('#order_no').val();
        if(order_no == ''){
            $('#search').attr('disabled', true);
        }else{
            $('#search').attr('disabled', false);
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '/admin/logistic/search-order/' + order_no,
            // data: "order_no=" + order_no,
            dataType:"json",
            success: function(data) {
                if(data != ''){
                    $('#add_product').hide();
                    var trHTML = '';
                     $.each(data, function(key, item) {
                    $('#lead_id').val(item.lead_id);
                    $('#client_name').val(item.client_name);
                    $('#contact_phone').val(item.contact_phone);
                    $('#pickup_from').val(item.pickup_from);
                    $('#delivered_to').val(item.delivered_to);
                    $('#pickup_add_1').val(item.pickup_add_1);
                    $('#delivery_add_1').val(item.delivery_add_1);
                    $('#pickup_pin').val(item.pickup_pin);
                    $('#delivery_pin').val(item.delivery_pin);
                    $('#pickup_state').val(item.pickup_state);
                    $('#delivery_state').val(item.delivery_state);
                    $('#pickup_country').val(item.pickup_country);
                    $('#delivery_country').val(item.delivery_country);
                    $('#pickup_email').val(item.pickup_email);
                    $('#delivery_email').val(item.delivery_email);
                    $('#pickup_phone').val(item.pickup_phone);
                    $('#delivery_phone').val(item.delivery_phone);
                    $('#product_name').val(item.product_name);
                    $('#dimension').val(item.dimension);
                    $('#quantity').val(item.quantity);
                    $('#uom').val(item.uom);
                    $('#area').val(item.area);
                    $('#weight').val(item.weight);
                        trHTML += 
                                '<tr><td>' + item.product_name + 
                                '</td><td>' + item.dimension + 
                                '</td><td>' + item.quantity + 
                                '</td><td>' + item.uom + 
                                '</td><td>' + item.area + 
                                '</td><td>' + item.weight + 
                                '</td><td>'; 
                    });
                    $('tbody').append(trHTML);
                }else{
                    alert("Order Number doesn't exists");
                    $('#order_no').val('');
                    $('#search').attr('disabled',true);
                } 
            },
        });
    });
    $('#new_order').on('click', function(){
        $('#assignDriverModal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            $('#order_no').val('');
        });
    });
});
</script>
<script>
$(document).ready(function () {
    $(document).on('change','#driver_id',function() {
        var driver_id = $(this).val();
        if(driver_id != ''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')              
                }
            });
            $.ajax({
                type: "POST",
                data: {
                    "unique_id": driver_id
                },
                url: '{{ route("getLogisticLeadByUniqueId") }}',
                success: function(data) {
                //alert('success');
                },
                error: function() {
                    alert('error');
                }
            });
        }
    });

    $('#btn_driver').on('click', function(){
        var driver_id = $('#driver_id').val();
        var logistic_leads_id = $('#lead_id').val();
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
        $('#client_name').removeAttr('required');
        $('#contact_phone').removeAttr('required');
        $('#pickup_from').removeAttr('required');
        $('#delivered_to').removeAttr('required');
        $('#pickup_add_1').removeAttr('required');
        $('#delivery_add_1').removeAttr('required');
        $('#pickup_pin').removeAttr('required');
        $('#delivery_pin').removeAttr('required');
        $('#pickup_state').removeAttr('required');
        $('#delivery_state').removeAttr('required');
        $('#pickup_country').removeAttr('required');
        $('#delivery_country').removeAttr('required');
        $('#pickup_email').removeAttr('required');
        $('#delivery_email').removeAttr('required');
        $('#pickup_phone').removeAttr('required');
        $('#delivery_phone').removeAttr('required');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')              
            }
        });
        $.ajax({
            type: "POST",
            data: {
                "driver_id": driver_id,
                "logistic_leads_id": logistic_leads_id,
                "start_time": start_time,
                "end_time": end_time
            },
            url: '/admin/logistic/assign-driver/',
            success: function(data) {
                alert('success');
            },
            url: '/admin/logistic/assign-driver/',
            error: function(data) {
               // alert('error');
            }
        });
});
});
</script>
@endsection
