@extends('frontend.admin.layouts.master')

@section('content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Employee's Leave Management</h5>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="card" style="padding:15px;">
    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
              
                <th>Employee Name</th>
            
                <th>Type of Leave</th>
                <th>No of Days</th>
                <th>Available <br>Casual Leave</th>
                <th>Available <br>Sick Leave</th>
             
                <th>Status</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
        @foreach($employees as $key=>$ld)
            <tr>
                <td>{{$key+1}}</td>
                
                <td>{{$ld->emp_name}}({{$ld->unique_id}})</td>
                 @if($ld->type == 1)
                <td>Casual Leave</td>
                @else
                <td>Sick Leave</td>
                @endif
                <td>{{$ld->no_of_day}}</td>
                <td>{{$ld->casual_leave}}</td>
                <td>{{$ld->sick_leave}}</td>

              
                @if($ld->status == 0)
                <td><span class="badge badge-warning">Applied</span></td>
                @elseif($ld->status == 1)
                <td><span class="badge badge-success">Approved</span></td>
                @else
                <td><span class="badge badge-danger">Not Approved</span></td>
                @endif
             
            
                <td>
                    <button class="btn btn-warning btn-sm" id="{{$ld->id}}" onclick="show_modal(this.id)">Update</button>
                </td>
              
                 
              

            </tr>
            <div class="modal" id="ExtraModal_{{$ld->id}}">
                <div class="modal-dialog">
                    <form method="post" action="{{route('status_update_leave')}}">
                        @csrf
                        <div class="modal-content">
                            <!-- Modal header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Status Update</h4>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <!-- <div class="row mb-2"><h5>Existing Order</h5> -->
                                <div class="row">
                               
                                    <div class="col-md-8" style="display:none">
                                        <div style="display: flex; flex-wrap: no-wrap">
                                        <input type="text" value="{{$ld->id}}" class="form-control mr-1" id="id" name="id">
                                        <input type="text" value="{{$ld->no_of_day}}" class="form-control mr-1" id="no_of_day" name="no_of_day">
                                        <input type="text" value="{{$ld->type}}" class="form-control mr-1" id="type" name="type">
                                        
                                    </div>
                                    </div>
                                    <div class="col-md-4"><span>Status</span></div>
                                    <div class="col-md-8">
                                        <div style="display: flex; flex-wrap: no-wrap">
                                            <select class="form-control mr-1" name="status" id="status">
                                            <option value="1" @if($ld->status == 1) selected @endif>Approved</option>
                                            <option value="2" @if($ld->status == 2) selected @endif>Not Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach


        </tbody>
    </table>

</div>



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });
    function show_modal(id) {
        $('#ExtraModal_' + id).modal('show');
    }
  
</script>






@endsection