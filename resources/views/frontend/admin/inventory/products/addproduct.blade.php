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
                            <label>Brand </label>
                            <input type="text" class="form-control" id="brand" name="brand">
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
                            <label>Sub Category</label>

                            <select name="subcategory" id="subcategory" class="form-control">



                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Color </label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Size</label>

                            <input type="text" class="form-control" id="size" name="size">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Length</label>

                            <input type="text" class="form-control" id="length" name="length">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Width</label>

                            <input type="text" class="form-control" id="width" name="width">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Height</label>

                            <input type="text" class="form-control" id="height" name="height">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Thickness</label>

                            <input type="text" class="form-control" id="thicknee" name="thickness">
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
                                    <input type="number" class="form-control" id="available_quantity" name="available_quantity" >
                                </div>
                                <div class="col-md-3">
                                    <select name="unit_1" class="form-control" id="unit_1" >
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
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>SKU <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="sku" name="sku" required>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group" id="gst">
                            <label>Tax %</label>
                            <input type="number" class="form-control" id="tax" name="tax" value="0">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Coverage</label>
                            <input type="text" class="form-control" id="coverage" name="coverage">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Per Pallet</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="per_pallet" name="per_pallet">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit_p">
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
                            <label for="mobile">Per Box</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="per_box" name="per_box">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit_b">
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
                            <label for="mobile">Packing in bags</label>

                            <input type="text" class="form-control" id="pac_bags" name="pac_bags">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Loose, Per Lorry</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="loose_per_lorry" name="loose_per_lorry">
                                </div>
                                <div class="col-md-3">
                                    <select name="unit" class="form-control" id="unit_l">
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

                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Supplier Code</label>
                            <input type="text" class="form-control" id="supplier_code" name="supplier_code">
                        </div>
                    </div> -->

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
                            <input type="file" class="form-control" name="images[]" multiple>
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