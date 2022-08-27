@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>




@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif

<div class="container card" style="padding:15px;">

    <div class="ms-auto text-end">
         @if(session('FRONT_ADMIN_ID')==1)
        <a class="btn btn-link" id="back" href="{{ route('wareHouses') }}"><i class="fa fa-arrow-left"></i>Back</a>
        @else
        <a class="btn btn-link" id="back" href="{{ route('otherWareHouse') }}"><i class="fa fa-arrow-left"></i>Back</a>
        @endif
    </div>
    <form>
        <h5>Product List of {{$wareHouse}}</h5>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-3">
                    <select name="status" class="form-control" id="status">
                        <option value="all">All</option>
                        <option value="1" @if(isset($_GET['status']) && $_GET['status']==1 )selected @endif>Active</option>
                        <option value="0" @if(isset($_GET['status']) && $_GET['status']==0 )selected @endif>Inactive</option>
                    </select>
                </div>


            </div>
        </div>
    </form>

    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Product Name</th>

                <th>Available Stock</th>
                <th>Status</th>

                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$pro )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>

                <td>{{$pro->product_name}}</td>
                <td>{{$pro->avl_stock}}</td>
                @if(intval($pro->min_stock) > intval($pro-> avl_stock))
                <td>
                    <span class="badge badge-danger"> unavailable</span>
                </td>
                @else
                <td>
                    <span class="badge badge-warning">available</span>
                </td>
                @endif


                <td>

                    <a href="../viewWarePro/{{$pro->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                </td>

            </tr>
            @endforeach


        </tbody>
    </table>

</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>

<script>
    function delete_warehouse(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteWarehouse')}}",
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
            url: "{{route('colors')}}",
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