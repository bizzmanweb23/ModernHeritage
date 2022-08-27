@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updateOrder') }}" method="POST">
    @csrf

    <div class="container mb-4">
    <h5>Product Collection Status Update</h5>
        <div class="card p-1">
            <h4 class="pl-4 mb-0 pt-3"></h4>
            <div class="card-body">
                <div class="row mb-2">
                    @foreach( $collection as $col)
                    <div class="col-md-6">
                        <span>
                      
                            <label>Product Name: </label>
                            {{$col->product_name}}<br>
                            <label>Product Quantity: </label>
                            {{$col->product_quantity}}<br>
                            <label>Product Price: </label>
                            {{$col->product_price}}<br>
                           
                           @if($col->collection_status == 1) 
                           <span class="badge badge-success"> Collected </span>
                           @else
                            <select name="status_{{$col->orderPid}}" id="status_{{$col->orderPid}}" class="form-control" onChange="return status_update(this.id)"required>
                                <option value="">--Select-- </option>
                                <option value="C">Collected</option>
                                <option value="NC" @if($col->collection_status == 0) selected @endif>Not Collected </option>

                               
                            </select>
                            @endif
                        </span>
                    </div>
                    @endforeach
                   
                </div>
                <div class="row mb-2">
                   
                 
                    
                   
                   
                    <div class="ms-auto text-end">
                      

                        <a href="{{route('collection_form')}}" class="btn btn-info">Back</a>
                    </div>

                </div>
            </div>
        </div>



    </div>


</form>

<script>
    function status_update (value)
    {
    
        
        var id = value.substring(value.indexOf('_') + 1);
        
        var status =$('#'+value).val();

        $.ajax({
            url: "{{route('orderProductStatus')}}",
            type: 'GET',
            data: {
                id:id,
                status: status,
            },
            success: function(data) {
                if(data == 1)
                {
                    location.reload();
                }
                

            }
        });
    
        
    }
    </script>

@endsection