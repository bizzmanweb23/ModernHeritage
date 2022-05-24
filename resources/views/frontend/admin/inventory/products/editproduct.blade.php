@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">
                <h5>Update Product</h5>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Name <span style="color:red">*</span></label>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{{$data->product_name}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{$data->brand}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category <span style="color:red">*</span></label>

                            <select name="cat_id" id="cat_id" class="form-control" required>
                                <option>--Select--</option>
                                @foreach($product_categories as $cat)
                                <option value="{{ $cat->id}}" @if($data->cat_id == $cat->id) selected @endif>{{ $cat->category_name}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Color <span style="color:red">*</span></label>
                            <select name="color[]" id="color" class="form-control" required multiple>

                                @foreach($s_color as $col)
                                <option value="{{ $col->id}}" selected>{{ $col->name}}</option>

                                @endforeach
                                @foreach($r_color as $col)
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
                                @foreach($sizes as $siz)
                                <option value="{{ $siz->id}}" @if($siz->id == $data->size) selected @endif>{{ $siz->height}} × {{ $siz->width}} {{ $siz->unit}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price <span style="color:red">*</span></label>

                            <input type="number" class="form-control" id="price" name="price" value="{{$data->price}}" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>MRP Price <span style="color:red">*</span></label>
                            <input type="number" class="form-control" id="mrp_price" name="mrp_price" value="{{$data->mrp_price}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Available Quantity <span style="color:red">*</span></label>
                            <div class="row">
                                <div class="col-md-9">
                                    <?php
                                    $a_qty = $data->available_quantity;
                                    $qt = intval($a_qty);

                                    $result_u = preg_replace("/[^a-zA-Z]+/", "", $data->available_quantity);

                                    ?>
                                    <input type="number" value="{{$qt}}" class="form-control" id="available_quantity" name="available_quantity" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="unit_1" class="form-control" id="unit_1" required>
                                        <option value="">--Select--</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->unit }}" @if($u->unit == $result_u) selected @endif>{{ $u->unit }}
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
                            <input type="text" class="form-control" id="sku" name="sku" value="{{$data->sku}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="gst">
                            <label>Tax % </label>
                            <input type="number" class="form-control" id="tax" name="tax" value="{{$data->tax}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Material</label>
                            <input type="text" class="form-control" id="material" value="{{$data->material}}" name="material">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Weight</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <?php
                                    $weight = $data->weight;
                                    $w = intval($weight);

                                    $result = preg_replace("/[^a-zA-Z]+/", "", $data->weight);

                                    ?>
                                    <input type="number" class="form-control" id="weight" name="weight" value="{{$w}}">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit">
                                        <option value="">--Select--</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->unit }}" @if($u->unit==$result) selected @endif>{{ $u->unit }}
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
                            <input type="number" class="form-control" id="speed" name="speed" value="{{$data->speed}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Power Source</label>
                            <input type="text" class="form-control" id="power_source" name="power_source" value="{{$data->power_source}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Voltage</label>
                            <input type="number" class="form-control" id="voltage" name="voltage" value="{{$data->voltage}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Supplier Code</label>
                            <input type="text" class="form-control" id="supplier_code" name="supplier_code" value="{{$data->supplier_code}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">

                                <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                <option value="0" @if($data->status == 0) selected @endif>Inactive</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Product Images</label>
                            <input type="file" class="form-control" name="images[]" multiple>
                            <input type="hidden" class="form-control" name="old_images" value="{{$data->product_image}}">
                        </div>

                        <div class="form-group">

                            <?php
                            $pr_img = $data->product_image;
                            $img = explode(',', $pr_img);
                            ?>
                            @if($data->product_image!='')
                            @foreach($img as $p)
                            <img src="{{ asset('images/products') }}/{{$p}}" alt="Product" style="height: 6rem; width:6rem">
                            @endforeach
                            @endif


                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5">{{$data->description}}</textarea>

                        </div>
                    </div>
                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Update</button>
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