@extends('frontend.admin.layouts.master')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<form action="{{ route('saveWarePro') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product</label>
                            <select name="pro_id" class="form-control" id="pro_id" required>
                                <option value="">--Select--</option>
                                @foreach($products as $p)
                                <option value="{{ $p->id }}">{{ $p->product_name }} </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="number" class="form-control" id="selling_price" name="selling_price" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Min Stock</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="min_stock" name="min_stock" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="unit_1" class="form-control" id="unit_1" required>
                                        <option value="">--Select--</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->unit }}">{{ $u->unit }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Max Stock</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="max_stock" name="max_stock" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="unit_2" class="form-control" id="unit_2" required>
                                        <option value="">--Select--</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->unit }}">{{ $u->unit }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Available Stock</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="avl_stock" name="avl_stock" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="unit_3" class="form-control" id="unit_3" required>
                                        <option value="">--Select--</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->unit }}">{{ $u->unit }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" required>
                        </div>
                    </div>
                    
                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('warehouseProducts') }}">Back</a>
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