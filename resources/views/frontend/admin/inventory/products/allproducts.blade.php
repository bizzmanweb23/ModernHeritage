@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<h4 class="font-weight-bolder mb-2 mt-2">Products</h4>
<a href="{{ route('addproduct') }}" class="btn btn-primary">Create</a>
<div class="container card" style="padding:15px">

    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Generate Barcode</th>
                <th>Price</th>

                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=>$c )
            <tr>
                <td>{{$key+1}}</td>
                <td>
                    <?php
                    $pr_img = $c->product_image;
                    $img = explode(',', $pr_img);



                    ?>

                    @if(isset($c->product_image))
                    <img src="{{ asset('images/products') }}/{{$img[0]}}" alt="Product" style="height: 6rem; width:6rem">
                    @else
                    <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 5rem; width:5rem">
                    @endif
                </td>
                <td>{{$c->product_name}}</td>
                <td>{{$c->category_name}}</td>
                <td>

  
                    <a href="javascript:void(0)" id="{{$c->unique_id}}" onclick="generate_barcode(this.id)" class="btn btn-info" title="generate barcode">Generate Barcode</a>
                </td>
                <td>{{$c->price}}</td>
                @if($c->status==1)
                <td><span class="badge badge-success">Active</span></td>
                @else
                <td><span class="badge badge-danger">Inactive</span></td>
                @endif
                <td>

                    <a href="editProduct/{{$c->id}}" title="edit"><span class="badge badge-warning"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                    <a href="viewProduct/{{$c->id}}" title="view"><span class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_product(this.id)" id="{{$c->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                </td>


            </tr>
            @endforeach


        </tbody>
    </table>

</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    function generate_barcode(uniqid) {
        $.ajax({
            url: "{{route('generateBarcode')}}",
            type: 'GET',
            data: {
                uniqid: uniqid
            },
            success: function(data) {
                if (data == 1) {

                    location.reload();
                }

            }
        });
    }



    function delete_product(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteProduct')}}",
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