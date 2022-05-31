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
                            <label>Sub Category</label>

                            <select name="subcategory" id="subcategory" class="form-control">
                                @foreach($sub_category as $s_cat)
                                <option value="{{$s_cat->id}}" @if($s_cat->id == $data->sub_cat) selected @endif>{{ $s_cat->sub_category}}</option>

                                @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="{{$data->color}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Size</label>

                            <input type="text" class="form-control" id="size" name="size" value="{{$data->size}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Length</label>

                            <input type="text" class="form-control" id="length" name="length" value="{{$data->length}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Width</label>

                            <input type="text" class="form-control" id="width" name="width" value="{{$data->width}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Height</label>

                            <input type="text" class="form-control" id="height" name="height" value="{{$data->height}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thickness</label>

                            <input type="text" class="form-control" id="thickness" name="thickness" value="{{$data->thickness}}">
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
                            <label>Coverage</label>
                            <input type="text" class="form-control" id="material" value="{{$data->coverage}}" name="material">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Per Pallet</label>
                            <div class="row">
                                <?php
                                $per_pallet = $data->per_pallet;
                                $p = intval($per_pallet);

                                $result = preg_replace("/[^a-zA-Z]+/", "", $data->per_pallet);

                                ?>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="per_pallet" name="per_pallet" value="{{$p}}">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit_p">
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
                            <label for="mobile">Per Box</label>
                            <div class="row">
                                <?php
                                $per_box = $data->per_box;
                                $b = intval($per_box);


                                $result = preg_replace("/[^a-zA-Z]+/", "", $data->per_box);


                                ?>

                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="per_box" name="per_box" value="{{$b}}">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit_b">
                                        <option value="">--Select--</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->unit }}" @if($u->unit==$result) selected @endif >{{ $u->unit }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Packing in bags</label>



                            <input type="text" class="form-control" id="pac_bags" name="pac_bags" value="{{$data->pac_bags}}">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Loose, Per Lorry</label>
                            <div class="row">
                                <?php
                                $loose_per_lorry = $data->loose_per_lorry;
                                $l = intval($loose_per_lorry);

                                $result = preg_replace("/[^a-zA-Z]+/", "", $data->loose_per_lorry);


                                ?>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="loose_per_lorry" name="loose_per_lorry" value="{{$l}}">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit_l">
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

    @if($errors -> any())
    @foreach($errors -> all() as $error)
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ $error }}");
    @endforeach
    @endif

    $('#color').select2({
        width: '100%',
        placeholder: "Select a Color",
        allowClear: true
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#cat_id').on('change', function(e) {
            var cat_id = e.target.value;
            $.ajax({
                url: "{{ route('subCat') }}",
                type: "GET",
                data: {
                    cat_id: cat_id
                },
                success: function(data) {


                    if (data) {
                        $('#subcategory').empty();
                        $('#subcategory').append('<option hidden>Choose Sub Category</option>');
                        $.each(data, function(key, subcat) {
                            $('select[name="subcategory"]').append('<option value="' + subcat.id + '">' + subcat.sub_category + '</option>');
                        });
                    } else {
                        $('#subcategory').empty();
                    }
                }
            })
        });
    });
</script>
@endsection