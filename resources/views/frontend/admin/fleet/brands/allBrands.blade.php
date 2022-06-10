@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="col-md-4">
    <a href="{{route('addBrands')}}" class="btn btn-primary">Add Brands</a>
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


                    <div class="col-md-4">
                        <select name="customer_type" class="form-control" id="customer_type">
                            <option value="all">All</option>
                            <option value="individual" @if(isset($_GET['type']) && $_GET['type']=='individual' )selected @endif>Individual</option>
                            <option value="company" @if(isset($_GET['type']) && $_GET['type']=='company' )selected @endif>Company</option>
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
                    <th>Brand Name</th>
                    <th>Action</th>



                </tr>
            </thead>
            <tbody>
            @foreach($brands as $key=>$b )
                <tr>
                    <td style="text-align:center">{{$key+1}}</td>
                    <td> @if(isset($b->brand_image))
                        <img src="{{ asset($b->brand_image) }}" alt="Brand" style="height: 6rem; width:6rem">
                        @else
                        <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 5rem; width:5rem">
                        @endif
                    </td>
                    <td>{{$b->brand_name}}</td>
                  
                    <td>
                        <a href="editBrand/{{$b->id}}" title="edit"><span class="badge badge-info"><i class="fas fa-edit"></i></span></a>
                        <a href="javascript:void(0)" onclick="return delete_brand(this.id)" id="{{$b->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                    </td>


                </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
    <script>
    function delete_brand(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
            url: "{{route('deleteBrand')}}",
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
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });

    $('#customer_type').change(function(e) {
        e.preventDefault();
        var type = $('#customer_type').val();

        $.ajax({
            url: "{{route('allcustomer')}}",
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