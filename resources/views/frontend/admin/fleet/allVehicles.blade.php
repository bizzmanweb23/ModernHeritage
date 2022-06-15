@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="row">
    <div class="col-md-4">
        <a href="{{route('addVehicles')}}" class="btn btn-primary">Add Vehicle</a>
    </div>


</div>


<div class="container card" style="padding:15px;">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-4">
                    <select name="status" class="form-control" id="status">
                        <option value="all">All</option>
                        <option value="1" @if(isset($_GET['status']) && $_GET['status']== 1 )selected @endif>Active</option>
                        <option value="0" @if(isset($_GET['status']) && $_GET['status']== 0 )selected @endif>Inactive</option>
                    </select>
                </div>


            </div>
        </div>
    </form>
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ Session::get('message') }}</strong>

    </div>
    @endif
    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Image</th>
                <th>Vehicle no</th>
                
                <th>Road Tax Expiry</th>
                <th>Inspection Due Date</th>
                <th>COE Expiry Date</th>
                <th>Status</th>

                <th>Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach($vehicle as $key=>$v )
            <tr>
                <td>{{$key+1}}</td>
                <td>


                    <img src="{{ asset($v->vehicle_image) }}" alt="Product" style="height: 6rem; width:6rem">

                </td>
                <td>{{$v->vehicle_no}}</td>
                
                @if(road_tax_expiry($v->road_tax_expiry)=='E')
                <td style="color:red;cursor:pointer;"  title="Driving License Expired"><b>{{date("d/m/Y", strtotime($v->road_tax_expiry))}}</b></td>
                @else
                <td><b>{{date("d/m/Y", strtotime($v->road_tax_expiry))}}</b></td>
                @endif
                @if(inspection_due_date($v->inspection_due_date)=='E')
                <td style="color:red;cursor:pointer;"  title="Driving License Expired"><b>{{date("d/m/Y", strtotime($v->inspection_due_date))}}</b></td>
                @else
                <td><b>{{date("d/m/Y", strtotime($v->inspection_due_date))}}</b></td>
                @endif
                @if(coe_expiry_date($v->coe_expiry_date)=='E')
                <td style="color:red;cursor:pointer;"  title="Driving License Expired"><b>{{date("d/m/Y", strtotime($v->coe_expiry_date))}}</b></td>
                @else
                <td><b>{{date("d/m/Y", strtotime($v->coe_expiry_date))}}</b></td>
                @endif
                @if($v->status==1)
                <td><span class="badge badge-success">Active</span></td>
                @else
                <td><span class="badge badge-danger">Inactive</span></td>
                @endif
                <td>

                    <a href="editVehicle/{{$v->id}}" title="edit"><span class="badge badge-warning"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                    <a href="viewVehicle/{{$v->id}}" title="view"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_vehicle(this.id)" id="{{$v->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                </td>


            </tr>
            @endforeach


        </tbody>
    </table>

</div>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    function delete_vehicle(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteVehicle')}}",
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 1) {

                        location.reload();
                    }

                }
            });
        } else {

            console.log('Thing was not saved to the database.');
        }
    }
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });
    $('#status').change(function(e) {
        e.preventDefault();
        var status = $('#status').val();

        $.ajax({
            url: "{{route('allVehicles')}}",
            type: 'GET',
            data: {
                status: status
            },
            success: function(data) {
                location.replace('?status=' + status);

            }
        });


    });
</script>
@endsection