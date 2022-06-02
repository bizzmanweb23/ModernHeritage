@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('saveWarehouse') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">
             
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" required>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Min Stock</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" required>
                        </div>
                    </div>
         
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Max Stock</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Available Stock</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" required>
                        </div>
                    </div>
                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('wareHouses') }}">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<script>
     @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ $error }}");
        @endforeach
    @endif
   
</script>

@endsection