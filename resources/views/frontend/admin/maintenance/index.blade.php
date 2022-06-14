@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="row">
    <div class="col-md-4">
        <a href="{{route('addMaintenance')}}" class="btn btn-primary">Add Maintance</a>
    </div>


</div>


<div class="container card" style="padding:15px;">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-4">
                    <select name="status" class="form-control" id="status">
                        <option value="all">All</option>
                        <option value="Active" @if(isset($_GET['type']) && $_GET['type']=='individual' )selected @endif>Active</option>
                        <option value="Inactive" @if(isset($_GET['type']) && $_GET['type']=='company' )selected @endif>Inactive</option>
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
         
                <th>Vehicle no</th>
                <th>Current Mileage</th>
                <th>Dealer</th>
               
                <th>Service Performed</th>

                <th>Action</th>



            </tr>
        </thead>
        <tbody>
        @foreach($data as $key=>$d )
            <tr>
                <td>{{$key+1}}</td>
                
                <td>{{$d->Vehicleno}}</td>
                <td>{{$d->current_mileage}}</td>
              
                <td>{{$d->dealer}}</td>
                <td>{{$d->service_performed}}</td>

              
                <td>
                    
                    <a href="editMaintenance/{{$d->id}}"  title="edit"><span class="badge badge-warning"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                    <a href="viewMaintenance/{{$d->id}}"  title="view"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_maintenance(this.id)" id="{{$d->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                </td>


            </tr>
            @endforeach
       

        </tbody>
    </table>

</div>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
function delete_maintenance(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
            url: "{{route('deleteVehicle')}}",
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
           if(data == 1){

            location.reload();
           }

            }
        });
        } else {

            console.log('Thing was not saved to the database.');
        }
    }
    </script>
@endsection