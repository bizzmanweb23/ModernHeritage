@extends('frontend.admin.inventory.index')

@section('content')   
<h4 class="font-weight-bolder mb-2 mt-2">Products</h4> 
<a href="{{ route('addproduct') }}" class="btn btn-primary">Create</a>
<div class="container-fluid d-flex flex-row flex-wrap">
    @foreach ($products as $p )
    <div class="card m-2" style="width: 23rem">
        <div class="card-body p-2">
            <div class="row">
                <div class="col-sm-3">
                    @if (isset($p->product_image))
                       <img src="{{ asset($p->product_image) }}" alt="Product" style="height: 5rem; width:5rem">
                    @else
                       <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 5rem; width:5rem"> 
                    @endif
                </div>
                <div class="col-sm-9">
                    <p class="mb-0">{{ $p->product_name }}</p>
                    <p class="mb-0">Price: ₹ {{ $p->price }}</p>
                    <p class="mb-0">{{ $p->description }}</p>
                </div>
            </div>
           
        </div>
    </div>    
    @endforeach
</div>
@endsection
 