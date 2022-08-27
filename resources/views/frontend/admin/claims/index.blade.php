@extends('frontend.admin.layouts.master')
@section('content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<h5>Employee Claims Management</h5>



<div class="card" style="padding:15px;">


<form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-6">
                    <select name="emp_id" class="form-control" id="emp_id">
                        <option value="all">All Employee</option>
                        @foreach($employees as $emp)
                        <option value="{{$emp->id}}"@if(isset($_GET['emp_id']) && $_GET['emp_id']== $emp->id )selected @endif >{{$emp->emp_name}}</option>
                        @endforeach
                    </select>
                </div>


            </div>
        </div>
    </form>


    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Claiming Amount</th>
                <th>Status </th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
       
        @foreach($claims as $key=>$ld)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ld->unique_id}}</td>
                <td>{{$ld->emp_name}}</td>
                <td>{{$ld->claiming_amount}}</td>
                
                @if($ld->status == 1)
                <td><span class="badge badge-success">Approved</span></td>
                @else
                <td><span class="badge badge-danger">Not Approved</span></td>
                @endif
             
                @if($ld->status == 0)
                <td>
                    <button class="btn btn-warning btn-sm" id="{{$ld->id}}" onclick="show_modal(this.id)">Update</button>
                </td>
                @else
                <td>

                <a href="viewClaim/{{$ld->id}}" class="btn btn-info btn-sm" title="view">View</a>
                </td>
                @endif
                   
              

            </tr>
            <div class="modal" id="ExtraModal_{{$ld->id}}">
                <div class="modal-dialog">
                    <form method="post" action="{{route('status_update_claim')}}">
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
                                    <div class="col-md-4" style="display:none"><span>Existing Order</span></div>
                                    <div class="col-md-8" style="display:none">
                                        <div style="display: flex; flex-wrap: no-wrap">
                                        <input type="text" value="{{$ld->id}}" class="form-control mr-1" id="id" name="id">
                                        </div>
                                    </div>
                                    <div class="col-md-4"><span>Status</span></div>
                                    <div class="col-md-8">
                                        <div style="display: flex; flex-wrap: no-wrap">
                                            <select class="form-control mr-1" name="status" id="status">
                                            <option value="1">Approved</option>
                                            <option value="0">Not Approved</option>
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
    $('#emp_id').change(function(e) {
        e.preventDefault();
        var emp_id = $('#emp_id').val();

        $.ajax({
            url: "{{route('claims')}}",
            type: 'GET',
            data: {
                emp_id: emp_id
            },
            success: function(data) {
                location.replace('?emp_id=' + emp_id);

            }
        });


    });
   
   
</script>


@endsection