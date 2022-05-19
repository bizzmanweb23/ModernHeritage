@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">
                <h5>Add New Product</h5>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="brand" name="brand" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category <span style="color:red">*</span></label>

                            <select name="cat_id" id="cat_id" class="form-control" required>
                                <option>--Select--</option>
                                @foreach($product_categories as $cat)
                                <option value="{{ $cat->id}}">{{ $cat->category_name}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Color <span style="color:red">*</span></label>
                            <select name="color[]" id="color" class="form-control" required multiple>

                                @foreach($colors as $col)
                                <option value="{{ $col->id}}">{{ $col->name}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Size <span style="color:red">*</span></label>

                            <select name="size" id="size" class="form-control" required>
                                <option>--Select--</option>
                                @foreach($size as $siz)
                                <option value="{{ $siz->id}}">{{ $siz->height}} × {{ $siz->width}} {{ $siz->unit}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price <span style="color:red">*</span></label>

                            <input type="number" class="form-control" id="price" name="price" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MRP Price <span style="color:red">*</span></label>
                            <input type="number" class="form-control" id="mrp_price" name="mrp_price" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Available Quantity <span style="color:red">*</span></label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="available_quantity" name="available_quantity" required>
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
                            <label>SKU <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="sku" name="sku" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="gst">
                            <label>Tax %</label>
                            <input type="number" class="form-control" id="tax" name="tax" value="0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Material</label>
                            <input type="text" class="form-control" id="material" name="material">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Weight</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="weight" name="weight">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit">
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
                            <label>Speed (RPM)</label>
                            <input type="number" class="form-control" id="speed" name="speed">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Power Source</label>
                            <input type="text" class="form-control" id="power_source" name="power_source">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Voltage</label>
                            <input type="number" class="form-control" id="voltage" name="voltage">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Supplier Code</label>
                            <input type="text" class="form-control" id="supplier_code" name="supplier_code">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control" required>

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Images</label>
                            <input  type="file" class="form-control" name="images[]"  multiple>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>

                        </div>
                    </div>

                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('allproducts') }}">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<script>
    $('#color').select2({
        width: '100%',
        placeholder: "Select a Color",
        allowClear: true
    });
</script>
@endsection