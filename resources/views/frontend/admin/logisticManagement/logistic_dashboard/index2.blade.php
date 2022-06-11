@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Logistic Dashboard</h6>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.4/dist/scheduler.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/moment@2/min/moment.min.js'></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.4/dist/scheduler.min.js'></script>


<style>
    thead {
        background-color: transparent !important;
    }

    .d_day {
        margin: 3px;
        float: right;
        font-size: 18px !important;
    }

    .time-panel {
        background: none repeat scroll 0 0 #FAFAFA;
        border: 1px solid #D4D4D4;
        height: 140px;
        overflow: auto;
        position: absolute;
        width: 100px;
        z-index: 99999;
        display: none;
    }

    .time-panel-ul {
        width: 100%;
    }

    .time-panel-ul li {
        border: 1px solid #F0F0F0;
        float: none;
        list-style: none outside none;
        margin-left: -40px;
        padding: 0;
        text-align: left;
        width: 81px;
        border-right: 0;
        cursor: pointer;
        padding-left: 12px;
    }

    .time-panel-ul li:hover {
        background-color: #3A87AD;
        color: #ffffff;
    }

    .fc-unthemed td.fc-today {
        background: #fff !important;
    }

    /* Context menu */
    .context-menu {
        display: none;
        position: absolute;
        border: 1px solid black;
        border-radius: 3px;
        width: 200px;
        background: white;
        box-shadow: 10px 10px 5px #888888;
        z-index: 99999999;

    }

    .context-menu ul {
        list-style: none;
        padding: 2px;
    }

    .context-menu ul li {
        padding: 5px 2px;
        margin-bottom: 3px;
        color: black;
        font-weight: bold;
        background-color: #eecab1;

    }

    .context-menu ul li:hover {
        cursor: pointer;
        *background-color: #7fffd4;
    }
</style>
<div class="container">
    <!-- Context-menu -->
    <div class='context-menu'>

        <ul>
            <form action="{{route('chekDriver')}}" method="post">
                @csrf
                <input type='hidden' value='' name="driver_id" id='driver_id'>
                <input type='hidden' value='' name="move_date" id='move_date'>
                <!--<li><div class = "col-md-12">Start Date<input type="date" name="start_date" value=""></div></li>
				<li><div class = "col-md-12">End Date<input type="date" name="end_date" value=""></div></li>-->
                <li>
                    <div class="col-md-12 showAttandance"></div>
                </li>
                <!--<div class = "col-md-12"><input type="radio" name="move_to_last" value="2">Move To First </div>-->
                <li>
                    <div class="col-md-12"><input type="radio" name="move_to_last" value="1">Move To last</div>
                </li>
                <li><input type="submit" class="btn btn-primary btn-custom" value="submit"> <input type="button" class="btn btn-primary btn-custom btn_close" value="Close"></li>
            </form>
        </ul>


    </div>
</div>
<div class="content-wrapper">


    <h2 class="d_day">
        <span>
            <form action="" id="findDate"><input type="date" id="find" name="date" value="<?= isset($_GET['date']) ? date('Y-m-d', strtotime($_GET['date'])) : date('Y-m-d') ?>" /><input type="submit" value="Find" /></form>
        </span>
    </h2>
    <div id='calendar'></div>

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
                    <!-- <a href="#" id="new_order" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignDriverModal">New Order</a> -->
                    <button type="submit" id="search" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignDriverModal">Search</button>
                </div>
            </div>
        </div>
    </div>
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
                                <input type="hidden" id="lead_id" name="lead_id">
                                <input type="hidden" class="form-control" id="order_id" name="order_id" placeholder="" required>
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
                                    <a class="btn btn-link text-dark px-3 mb-0" id="add_product" href="#"><i class="fas fa-plus text-dark me-2" aria-hidden="true"></i>Add Product</a>
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
                        <div class="row mb-2" style="display:none">
                            <div class="col-md-6"><label for="driver_id">Driver Name:</label></div>
                            <div class="col-md-6">
                          
                                <input type="text" class="form-control modal_input" id="driver_id_t" name="driver_id_t" placeholder="" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2"><label for="">Start Time:</label></div>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control modal_input" id="start_time" name="start_time" placeholder="" required>
                            </div>
                            <div class="col-md-2"><label for="">End Time:</label></div>
                            <div class="col-md-4">
                                <input type="datetime-local" class="form-control modal_input" id="end_time" name="end_time" placeholder="" required>
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
</div>


<script>
    $('#calendar').fullCalendar({
        defaultView: 'agendaDay',
        groupByResource: true,
        selectable: 'false',
        selectHelper: 'false',
        unselectAuto: 'true',
        minTime: "10:00:00",
        maxTime: "24:00:00",
        unselectCancel: '',
        slotDuration: '00:30:00',
    	slotLabelInterval: 30,
   		slotMinutes: 30,
    	snapDuration: '00:30:00',

    
        resources: <?php echo $cal; ?>,
        select: function(start, end, jsEvent, view, resource) {
       
          //  $('#ExtraModal').modal('show');
         
            $('#driver_id_t').val(resource.id);
            var dt = new Date();
            var hours = start.format('hh');
            var minutes = start.format('mm');
            if (minutes > 30) minutes = 30;
            else minutes = 0;
            var ehours;
            if (hours > 0) ehours = hours + 1;
            if (hours == 0) ehours = hours;
            if (hours == 23) ehours = hours;

            var eminutes;
            if (ehours >= 24) ehours = '0';
            if (hours > 0) eminutes = minutes;
            if (hours == 0) eminutes = '59';
            if (hours == 23) eminutes = '59';

            var mm = start.format('M');
            var dd = start.format('D');
            var yyyy = start.format('YYYY');

            if (parseInt(mm) <= 9) mm = '0' + (parseInt(mm) + 0);
            if (parseInt(dd) <= 9) dd = '0' + dd;
            if (parseInt(hours) <= 9) hours = '0' + hours;
            if (parseInt(minutes) <= 9) minutes = '0' + minutes;
            if (parseInt(ehours) <= 9) ehours = '0' + ehours;
            if (parseInt(eminutes) <= 9) eminutes = '0' + eminutes;

            var curDate = yyyy + '-' + mm + '-' + dd + ' ' + hours + ':' + minutes;
            var curDateInput = yyyy + '-' + mm + '-' + dd;

            $('#start-date').val(curDateInput);
            $('#end-date').val(curDateInput);

            var startTime12Format = formatTimeStr(hours + ':' + minutes);
            var endTime12Format = formatTimeStr(ehours + ':' + eminutes);

            $('#start-time').val(start.format('HH:mm'));
            $('#end-time').val(end.format('HH:mm'));
        },
        dayClick: function(date, jsEvent, view, resourceObj) {
           // $('#ExtraModal').modal('show');
            $('#start-date').val(date)
            $('#driver_id_t').val(resourceObj.id);
            var dt = new Date();

            var hours = dt.getHours();
            var minutes = dt.getMinutes();
            if (minutes > 30) minutes = 30;
            else minutes = 0;
            var ehours;
            if (hours > 0) ehours = hours + 1;
            if (hours == 0) ehours = hours;
            if (hours == 23) ehours = hours;

            var eminutes;
            if (ehours >= 24) ehours = '0';
            if (hours > 0) eminutes = minutes;
            if (hours == 0) eminutes = '59';
            if (hours == 23) eminutes = '59';

            var mm = date.format('M');
            var dd = date.format('D');
            var yyyy = date.format('YYYY');

            if (parseInt(mm) <= 9) mm = '0' + (parseInt(mm) + 0);
            if (parseInt(dd) <= 9) dd = '0' + dd;
            if (parseInt(hours) <= 9) hours = '0' + hours;
            if (parseInt(minutes) <= 9) minutes = '0' + minutes;
            if (parseInt(ehours) <= 9) ehours = '0' + ehours;
            if (parseInt(eminutes) <= 9) eminutes = '0' + eminutes;

            var curDate = yyyy + '-' + mm + '-' + dd + ' ' + hours + ':' + minutes;
            var curDateInput = yyyy + '-' + mm + '-' + dd;

            $('#start-date').val(curDateInput);
            $('#end-date').val(curDateInput);

            var startTime12Format = formatTimeStr(hours + ':' + minutes);
            var endTime12Format = formatTimeStr(ehours + ':' + eminutes);

            $('#start-time').val(startTime12Format);
            $('#end-time').val(endTime12Format);

        },
        events: <?php echo $event; ?>,

    });
</script>
<script>
    $(document).ready(function() {
      //  $('#search').attr('disabled', true);
       // $('#searchbtn').attr('disabled', true);
        let current_date = new Date().toLocaleString("sv-SE", {
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit"
        }).replace(" ", "T");
        window.count = 1;
        $('#add_product').click(function() {
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
        $('#start_time').on('change', function() {
            var start_time = $('#start_time').val();
            if (start_time <= current_date) {
                alert("Start Date can't be before or current date");
                document.getElementById('start_time').value = "";
            }
        });
        $('#end_time').on('change', function() {
            var end_time = $('#end_time').val();
            if (end_time <= current_date) {
                alert("End Date can't be before or current date");
                document.getElementById('end_time').value = "";
            }
        });
        $('#search').on('click', function() {
            var order_no = $('#order_no').val();
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/admin/logistic/search-order/' + order_no,
                // data: "order_no=" + order_no,
                dataType: "json",
                success: function(data) {

                    if (data != '') {
                        $('#add_product').hide();
                        var trHTML = '';
                        $.each(data, function(key, item) {
                            $('#lead_id').val(item.lead_id);
                            $('#client_name').val(item.client_name);
                            $('#contact_phone').val(item.contact_phone);
                            $('#pickup_from').val(item.pickup_client);
                            $('#delivered_to').val(item.delivery_client);
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
                            $('#order_id').val(item.order_id);
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
                    } else {
                        alert("Order Number doesn't exists");
                        $('#assignDriverModal').hide();
                        $('#order_no').val('');
                        $('#search').attr('disabled', true);
                    }
                },
            });
        });
        $('#new_order').on('click', function() {
            $('#assignDriverModal').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
                $('#order_no').val('');
            });
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('#findDate').submit(function(e) {
            e.preventDefault();
            $("#calendar").fullCalendar("gotoDate", $('#find').val());
            $(".context-menu").hide();
            $("#driver_id").val("");
            $('#calendar table>thead tr th').addClass('context-menu-one box menu-1');
            contextmenu();

        });

        $('.fc-today-button').click(function() {
            $(".context-menu").hide();
            $("#driver_id").val("");
            $('#calendar table>thead tr th').addClass('context-menu-one box menu-1');
            contextmenu();

            return false;
        });

        $(document).on('click', '.fc-next-button, .fc-prev-button', function() {
            $(".context-menu").hide();
            $("#driver_id").val("");
            $('#calendar table>thead tr th').addClass('context-menu-one box menu-1');
            contextmenu();
        });


        $('#calendar table>thead tr th').addClass('context-menu-one box menu-1');
        // Hide context menu
        $('.btn_close').bind('contextmenu click', function() {
            $(".context-menu").hide();
            $("#driver_id").val("");
        });


        contextmenu();

        function contextmenu() {
            // disable right click and show custom context menu
            $(".context-menu-one").bind('contextmenu', function(e) {
                var id = $(this).data('resource-id');

                $("#driver_id").val(id);

                var formattedDate = new Date($('.fc-header-toolbar').find('div h2').text());
                var d = formattedDate.getDate();
                var m = formattedDate.getMonth();
                m += 1;
                var y = formattedDate.getFullYear();
                var cdate = y + '-' + m + '-' + d;

                $("#move_date").val(cdate);

                $.ajax({
                    url: "{{route('driver_status')}}",
                    type: 'GET',
                    data: {
                        driver_id: id
                    },
                    //dataType: "json",
                    success: function(data) {
                        if (data == 0) {
                            $('.showAttandance').html('Absent');
                        } else {
                            $('.showAttandance').html('Present');

                        }

                    }
                });

                var top = e.pageY + 5;
                var left = e.pageX - 200;

                if (id != 0) {

                    // Show contextmenu right click move to last
                    $(".context-menu").toggle(100).css({
                        top: top + "px",
                        left: left + "px"
                    });
                }


                // Disable default menu
                return false;


            });
        }



        // disable context-menu from custom menu
        $('.context-menu').bind('contextmenu', function() {
            return false;
        });

        // Clicked context-menu item
        // $('.context-menu li').click(function(){
        // 	var className = $(this).find("span:nth-child(1)").attr("class");
        // 	var titleid = $('#txt_id').val();
        // 	$( "#"+ titleid ).css( "background-color", className );
        // 	$(".context-menu").hide();
        // });

    });
</script>
@endsection