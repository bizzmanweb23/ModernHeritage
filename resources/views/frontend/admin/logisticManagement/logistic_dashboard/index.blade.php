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
    <div class="modal-dialog">
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
                        <div class="col-md-4"><label for="driver_id">Driver Name:</label></div>
                        <div class="col-md-7">
                            <select name="driver_id" id="driver_id" class="form-control" required>
                                <option value="">Select Driver</option>
                                @foreach ($drivers as $d)
                                   <option value="{{ $d->unique_id }}">{{ $d->emp_name }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="">Start Time:</label></div>
                        <div class="col-md-7">
                            <input type="datetime-local" class="form-control modal_input" id="" name="start_time" placeholder="" required="">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="">End Time:</label></div>
                        <div class="col-md-7">
                            <input type="datetime-local" class="form-control modal_input" id="" name="end_time" placeholder="" required="">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
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
@endsection
