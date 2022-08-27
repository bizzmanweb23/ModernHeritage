@extends('frontend.admin.layouts.master')
@section('content')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.4/dist/scheduler.min.css' rel='stylesheet' />
<!-- <script src='https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js'></script> -->
<script src='https://cdn.jsdelivr.net/npm/moment@2/min/moment.min.js'></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.5/dist/fullcalendar.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.4/dist/scheduler.min.js'></script>


<style>

    thead{
        background-color:transparent !important;
    }
    .d_day{
        margin: 13px;
        float: right;
        font-size: 22px !important;
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
.time-panel-ul li:hover{
    background-color: #3A87AD;
    color: #ffffff;
}
.fc-unthemed td.fc-today {
    background: #fff !important;
}
/* Context menu */
.context-menu{
    display: none;
    position: absolute;
    border: 1px solid black;
    border-radius: 3px;
    width: 200px;
    background: white;
    box-shadow: 10px 10px 5px #888888;
	z-index: 99999999;
}

.context-menu ul{
    list-style: none;
    padding: 2px;
}

.context-menu ul li{
    padding: 5px 2px;
    margin-bottom: 3px;
    color: black;
    font-weight: bold;
    background-color: #f7ce6a;

}

.context-menu ul li:hover{
    cursor: pointer;
    *background-color: #7fffd4;
}
.chosen-container{
	width: 100% !important;
	height: 45px !important;
}
</style>    

<div class="container">
     <!-- Context-menu -->
	 <div class='context-menu'>
		 
			<ul>
			<form action="{{ route('assign-driver') }}" method="post">
				<input type='hidden' value='' name="therapist_id" id='therapist_id'>
				<li><div class = "col-md-12">Start Date<input type="date" name="start_date" value=""></div></li>
				<li><div class = "col-md-12">End Date<input type="date" name="end_date" value=""></div></li>
				<li><div class = "col-md-12 showAttandance"></div></li>
				<li><div class = "col-md-12"><input type="radio" name="move_to_last" value="2">Move To First </div> 
                <div class = "col-md-12"><input type="radio" name="move_to_last" value="1">Move To last</div></li>
				<li><input type="submit" class="btn btn-primary btn-custom" value="submit"> <input type="button" class="btn btn-primary btn-custom btn_close" value="Close"></li>
			</form>
			</ul>
			
        
    </div>
</div>
<div class="content-wrapper" style="margin-left: 280px;">
   
    <div class="container-fluid py-4 ">
    <h2 class="d_day">
    <span><form action="" id="findDate"><input type="date" id="find" name="date" value="<?= isset($_GET['date']) ? date('Y-m-d', strtotime($_GET['date'])) : date('Y-m-d') ?>" /><input type="submit" value="Find" /></form></span>
    </h2>

		<div id='calendar' style="width: 1200px;"></div>
		
	</div>
	
	

<div class="modal fade formModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align:left;">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5>CREATE APPOINTMENT</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        
        <div style="margin: 2px 20px 0px 4px; float: right; display: none" id="remove-block">
            <button type="button" class="btn btn-danger btn-xs ladda-button" data-style="expand-left" data-event-id="" id="remove-link"><span class="ladda-label">Remove This Event</span></button>
        </div>
        <div style="clear: both"></div>
        <form role="form" id="eventForm" class="form-horizontal">
            <div class="modal-body" style="padding-top: 10px">
                <fieldset>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!-- ?php $id=(int)$_GET['id']; ?-->
                            <!--?php echo '<h1>'.$id.'</h1>';?-->
                            <input type="hidden" class="form-control" id="thera_id" name="thera_id"  />
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="customer_num" class="col-sm-6 control-label">Customer Number</label>
										<input type="text" class="form-control" id="customer_num" name="customer_num" placeholder="Customer Number" pattern="[0-9]+"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name" class="col-sm-6 control-label">Customer Name</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" pattern="[a-zA-Z]+" />
									</div>
								</div>
							</div>

                            <div class="form-group ">
                                <label for="services" class="col-sm-6 control-label">Services 
                                </label>
                                <div class="col-sm-12">
                                <select data-placeholder="" multiple class="chosen-select form-control" name="service[]" id="services" style="height: 45px !important;">
                                  
                                    
                                </select>
                                </div>
                            </div>  

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="amount" class="col-sm-6 control-label">Total Amount</label>
										<input type="text" class="form-control" name="amount" id="amount" placeholder="Total Amount" value="" readonly>
									</div>
								</div> 
						
								<div class="col-md-6">
									<div class="form-group">
										<label for="sduration" class="col-sm-6 control-label">Duration</label>
										<input type="text" class="form-control" name="sduration" id="sduration" placeholder="Total Duration" value="" readonly>
									</div>
								</div> 
							</div> 

							<div class="form-group">
                                <label for="start-date" class="col-sm-3 control-label">Start</label>
								<div class="row">
									<div class="input-group col-sm-6 date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="start" data-link-format="yyyy-mm-dd" >
                                    	<input type="date" class="form-control" id="start-date" name="start_date" placeholder="Start Date"  style="background-color: white; cursor: default;" />
                                    	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                	</div>
									<div class="col-sm-3">
										<input type="time" name="start_time" id="start-time" class="form-control"  style="background-color: white; cursor: default;"/>
									</div>
								</div>
                            </div>

                            <div class="form-group" id="end-group">
                                <label for="end" class="col-sm-3 control-label">End</label>
								<div class="row">
									<div class="input-group col-sm-6 form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="end" data-link-format="yyyy-mm-dd">
                                    	<input type="date" class="form-control" placeholder="End Date" name="end_date" id="end-date"  style="background-color: white; cursor: default;"/>
                                    	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
									<div class="col-sm-3">
										<input type="time" name="end_time" id="end-time" class="form-control"   style="background-color: white; cursor: default;" />
									</div>
								</div> 
                            </div>
                            

                        </div>

                    </div>
                    <!--- Action Links -->

                </fieldset>
            </div>
            <div class="modal-footer">
                <input type="hidden" value="-1" name="update-event" id="update-event" />
                <input type="hidden" value="" name="currentView" id="currentView" />
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="">submit</button>
            </div>
        </form>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>
    // format time displayed
    function formatTimeStr(dateStr) {
        return dateStr;
    }

  $('#findDate').submit(function(e){
    e.preventDefault();
	$("#calendar").fullCalendar("gotoDate", $('#find').val());
  
  })  
  $("#services").change(function() {
    //   console.log($(this).val());
    //   alert('wqryrtsty');
      $.ajax({
      
      type: "get",
      data: {
        id: $(this).val()
      },
      dataType: "json",
      success: function(data) {
        //console.log(data);
        $("#amount").val(data.totalPrice);
        $("#sduration").val(data.totalDuration);
        var start_date = $('#start-date').val();
        var start_time = $('#start-time').val();
        d = new Date(start_date + ' ' + start_time );
        d.setMinutes(d.getMinutes() + data.totalDuration);

        year = d.getFullYear();
        month = lengthCheck(parseInt(d.getMonth()) + 1);
        day = lengthCheck(d.getDate());
        hour = lengthCheck(d.getHours());
        minutes = lengthCheck(d.getMinutes());

        $('#end-date').val(year+'-'+month+'-'+day);
        $('#end-time').val(hour+':'+minutes);
      }
    })
  });


  $('#start-date').change(function(){
    var start_date = $(this).val();
    var start_time =$('#start-time').val(); 
    var sduration =$('#sduration').val();
    dateChange(start_date,start_time,sduration);
        
  })
  $('#start-time').change(function(){
    var start_date = $('#start-date').val();
    var start_time =$(this).val(); 
    var sduration =$('#sduration').val();
    dateChange(start_date,start_time,sduration);
  })


  function dateChange(start_date,start_time,sduration){
    if(start_date != '' && start_time != '' && sduration != ''){
        d = new Date(start_date + ' ' + start_time );
        d.setMinutes(d.getMinutes() + sduration);

        year = d.getFullYear();
        month = lengthCheck(parseInt(d.getMonth()) + 1);
        day = lengthCheck(d.getDate());
        hour = lengthCheck(d.getHours());
        minutes = lengthCheck(d.getMinutes());

        $('#end-date').val(year+'-'+month+'-'+day);
        $('#end-time').val(hour+':'+minutes);
    }
  }

  function lengthCheck(time){
    if(time.toString().length == 1){
        return '0'+time;
    }else{
        return time;
    }
  }
  $(function() {
    $('#start-time').focus(function () {
        $('#time-panel-start').show();
    });
    $('#start-time').click(function () {
        $('#time-panel-start').show();
    });

    $('#time-panel-start ul li').click(function () {
        var selVal = $(this).attr('data-value');
        $('#start-time').val(formatTimeStr(selVal));
        $('#time-panel-start').hide();
    });

    $('#end-time').focus(function () {
        $('#time-panel-end').show();
    });
    $('#end-time').click(function () {
        $('#time-panel-end').show();
    });
    $('body').focus(function () {
        setTimeout(function () {
            $('#time-panel-start').hide();
        }, 200)
        setTimeout(function () {
            $('#time-panel-end').hide();
        }, 200)
    });


    $('#time-panel-end ul li').click(function () {
        var selVal = $(this).attr('data-value');
        $('#end-time').val(formatTimeStr(selVal));
        $('#time-panel-end').hide();
    });

    $('#calendar').fullCalendar({
        defaultView: 'agendaDay',
        groupByResource: true,
        selectable: 'false',
        selectHelper: 'false',
        unselectAuto: 'true',
        minTime: "10:00:00",
	    maxTime: "24:00:00",
        unselectCancel: '',
        
        select:function(start, end, jsEvent, view, resource) {
        $('#myModal').modal('show');
        $('#thera_id').val(resource.id);
        var dt = new Date();
        var hours   = start.format('hh');
        var minutes = start.format('mm');
        if(minutes > 30) minutes = 30;
        else minutes = 0;
        var ehours;
        if(hours > 0) ehours = hours+1;
        if(hours == 0) ehours = hours;
        if(hours == 23) ehours = hours;

        var eminutes;
        if(ehours >= 24) ehours = '0';
        if(hours > 0) eminutes = minutes;
        if(hours == 0) eminutes = '59';
        if(hours == 23) eminutes = '59';

        var mm = start.format('M');
        var dd = start.format('D');
        var yyyy = start.format('YYYY');

        if(parseInt(mm) <= 9) mm = '0'+(parseInt(mm)+0);
        if(parseInt(dd) <= 9) dd = '0'+dd;
        if(parseInt(hours) <= 9) hours = '0'+hours;
        if(parseInt(minutes) <= 9) minutes = '0'+minutes;
        if(parseInt(ehours) <= 9) ehours = '0'+ehours;
        if(parseInt(eminutes) <= 9) eminutes = '0'+eminutes;

        var curDate = yyyy+'-'+mm+'-'+dd+' '+hours+':'+minutes;
        var curDateInput = yyyy+'-'+mm+'-'+dd;

        $('#start-date').val(curDateInput);
        $('#end-date').val(curDateInput);

        var startTime12Format = formatTimeStr(hours+':'+minutes);
        var endTime12Format = formatTimeStr(ehours+':'+eminutes);

        $('#start-time').val(start.format('HH:mm'));
        $('#end-time').val(end.format('HH:mm'));
      },
      dayClick: function(date, jsEvent, view, resourceObj) {
        $('#myModal').modal('show');
        $('#start-date').val(date)
        $('#thera_id').val(resourceObj.id);
        var dt = new Date();

        var hours   = dt.getHours();
        var minutes = dt.getMinutes();
        if(minutes > 30) minutes = 30;
        else minutes = 0;
        var ehours;
        if(hours > 0) ehours = hours+1;
        if(hours == 0) ehours = hours;
        if(hours == 23) ehours = hours;

        var eminutes;
        if(ehours >= 24) ehours = '0';
        if(hours > 0) eminutes = minutes;
        if(hours == 0) eminutes = '59';
        if(hours == 23) eminutes = '59';

        var mm = date.format('M');
        var dd = date.format('D');
        var yyyy = date.format('YYYY');

        if(parseInt(mm) <= 9) mm = '0'+(parseInt(mm)+0);
        if(parseInt(dd) <= 9) dd = '0'+dd;
        if(parseInt(hours) <= 9) hours = '0'+hours;
        if(parseInt(minutes) <= 9) minutes = '0'+minutes;
        if(parseInt(ehours) <= 9) ehours = '0'+ehours;
        if(parseInt(eminutes) <= 9) eminutes = '0'+eminutes;

        var curDate = yyyy+'-'+mm+'-'+dd+' '+hours+':'+minutes;
        var curDateInput = yyyy+'-'+mm+'-'+dd;

        $('#start-date').val(curDateInput);
        $('#end-date').val(curDateInput);

        var startTime12Format = formatTimeStr(hours+':'+minutes);
        var endTime12Format = formatTimeStr(ehours+':'+eminutes);

        $('#start-time').val(startTime12Format);
        $('#end-time').val(endTime12Format);

    },
    
    });
  });
</script>
@endsection