@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>
<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addDriver') }}" class="btn btn-primary">New Driver</a>
    </div>


</div>



@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="container card" style="padding:15px;">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-3">
                    <select name="type" class="form-control" id="type">
                        <option value="all">All</option>
                        <option value="1" @if(isset($_GET['type']) && $_GET['type'] == 1 )selected @endif>Active</option>
                        <option value="0" @if(isset($_GET['type']) && $_GET['type'] == 0)selected @endif>Inactive</option>
                    </select>
                </div>


            </div>
        </div>
    </form>

    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $key=>$c )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                <td> @if(isset($c->emp_image))
                    <img src="{{ asset($c->emp_image) }}" alt="not found" style="height: 6rem; width:6rem">
                    @else
                    <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 5rem; width:5rem">
                    @endif
                </td>
                <td>{{$c->emp_name}}</td>
                <td>{{ $c->work_email  }}</td>
                <td>{{ $c->work_mobile }}</td>
                @if($c->status==1)
                <td><span class="badge badge-success">Active</span></td>
                @else
                <td><span class="badge badge-danger">Inactive</span></td>
                @endif
                
                <td>
                    <a href="editDriver/{{$c->id}}" title="edit"><span class="badge badge-info"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                    <a href="viewDriver/{{$c->id}}"  title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                   
                </td>


            </tr>
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
    $('#type').change(function(e) {
        e.preventDefault();
        var type = $('#type').val();

        $.ajax({
            url: "{{route('drivers')}}",
            type: 'GET',
            data: {
                type: type
            },
            success: function(data) {
                location.replace('?type=' + type);

            }
        });


    });
   
</script>

@endsection