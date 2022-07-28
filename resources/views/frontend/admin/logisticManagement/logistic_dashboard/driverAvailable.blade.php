@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Driver List View</h6>
<link rel="stylesheet" href="{{asset('assets/css/scheduler.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/fullcalendar.min.css')}}">
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
            color:black;
            /* overflow-x: scroll;
            overflow-y: scroll; */
            /* border-bottom:1px solid #000; */
        } 
        .fc-time{
            font-weight: 600;   
        } 
        
    </style>
<!-- <i>
      <h3 id="current_date" class="text-center"></h3>
    </i> -->
<a class="btn btn-link text-dark px-3 mb-0" id="back" href="{{ url()->previous() }}"><i class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>

<div class="col-md-5 float-right">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control" id="driver_name" placeholder="Search..."
                    name="driver_name">
                <div>
                    <button type="submit" style="border-radius: 10px">
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
  </div>
  <div class="container">
    <div id='calendar_id'></div>
    {!! $calendar->calendar() !!}
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  {!! $calendar->script() !!}
  <script>
    // $(document).ready(function() {
    //   var current_date = $.datepicker.formatDate('dd M yy', new Date());
    //   $('#current_date').html(current_date);
    // });
  </script>
  @endsection