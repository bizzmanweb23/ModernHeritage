@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Add Quotation</h6>
@endsection

@section('content')
{{-- <style>
    .ui-front {
    z-index: 9999999 !important;
}
</style> --}}

{{-- <!-- The Modal -->
<div class="modal" id="addProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
@csrf

                <input type="hidden" name="product_id" id="product_id">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="product_name">Product</label></div>
                        <div class="col-md-8"><input type="text" class="form-control typeahead" id="product_name"
                                name="product_name" placeholder="Product Name" required></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="description">Description</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" id="description"
                                name="description" placeholder="description" required></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"> <label for="quantity">Quantity</label></div>
                        <div class="col-md-8"><input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder=""></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"><label for="unitPrice">Unit Price</label></div>
                        <div class="col-md-8"><input type="number" class="form-control" id="unitPrice" name="unitPrice"
                                placeholder="₹" readonly></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"> <label for="expected_price">Taxes</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" id="taxes" name="taxes"
                                placeholder=""></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4"> <label for="subtotal">Subtotal</label></div>
                        <div class="col-md-8"><input type="number" class="form-control" id="subtotal" name="subtotal"
                                placeholder="" readonly></div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="save_product">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div> --}}


<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <form action="{{ route('savequotation') }}" method="post">
                @csrf
                <div class="ms-auto text-end">

                    {{-- <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i
                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ route('getRequest') }}"><i
                            class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a> --}}
                    <button type="submit" class="btn btn-link text-dark px-3 mb-0" id="save"><i
                            class="fas fa-save text-dark me-2" aria-hidden="true"></i>Save</button>
                            
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="javascript:;"><i
                            class="far fa-trash-alt me-2"></i>Discard</a>
                </div>

                <input type="hidden" name="client_id" value="{{ $lead->client_id }}" id="client_id">
                <input type="hidden" name="leads_id" value="{{ $lead->id }}" id="leads_id">
                <div class="card-body pt-4 p-3">
                    <div class="d-flex flex-column">
                        <span class="mb-2 text-xs">Contact Name:
                            {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span">{{ $lead->client_name }}</span>
                        --}}
                        <input type="text" name="client_name" id="client_name" value="{{ $lead->client_name }}"
                            placeholder="Contact Name" />
                        </span>

                        <span class="mb-2 text-xs">GST Treatment:
                            {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span"></span> --}}
                            <select name="gst_treatment" id="gst_treatment">
                                @foreach($gst as $gt)
                                    <option value="{{ $gt->id }}">{{ $gt->gst_treatment }}</option>
                                @endforeach
                            </select>
                        </span>

                        <span class="mb-2 text-xs">Expiration:
                            {{-- <span class="text-dark font-weight-bold ms-sm-2" id="expiration_span"></span> --}}
                            <input type="date" name="expiration" id="expiration" placeholder="" />
                        </span>
                        <br>
                        <br>
                        <input type="hidden" name="product_id" id="product_id">
                        {{-- <div style={display: "none"}>
                            <select name="product_id" id="product_id" multiple></select>
                        </div> --}}
                        <table class="table mb-0 table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-uppercase" scope="col">
                                        <p class="mb-0 mt-0 text-xs font-weight-bolder">Product</p>
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        <p class="mb-0 mt-0 text-xs font-weight-bolder">Description</p>
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        <p class="mb-0 mt-0 text-xs font-weight-bolder">Quantity</p>
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        <p class="mb-0 mt-0 text-xs font-weight-bolder">Unit Price</p>
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        <p class="mb-0 mt-0 text-xs font-weight-bolder">Taxes</p>
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        <p class="mb-0 mt-0 text-xs font-weight-bolder">Subtotal</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="product_name" id="product_name" class="form-control select">
                                            <option value="">select</option>
                                            @foreach($product as $p)
                                                <option value="{{ $p }}">{{ $p->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="description" id="description">
                                    </td>
                                    <td><input type="number" class="form-control" name="quantity" id="quantity" min="1"></td>
                                    <td><input type="number" class="form-control" name="unitPrice" id="unitPrice" readonly></td>
                                    <td>
                                        <select multiple="multiple" name="tax[]" id="tax" class="form-control">
                                            @foreach($tax as $t)
                                                <option value="{{$t}}">{{$t->tax_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="subtotal" id="subtotal" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-link text-dark px-3 mb-0" id="add_product" href="#"><i
                                    class="fas fa-plus text-dark me-2" aria-hidden="true"></i>Add Product</a>
                        </div>

                        <div class="ms-auto text-end row">
                            <label for="total">Total :</label>
                            <input class="form-control" type="number" name="total" id="total" readonly>
                        </div>
                        
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#client_name').autocomplete({
        source: function (request, response) {
            $.ajax({
                type: 'get',
                url: "{{ route('searchrequest') }}",
                dataType: "json",
                data: {
                    term: $('#client_name').val()
                },
                success: function (data) {
                    response(data);
                    console.log(data)
                },
            });
        },
        select: function (event, ui) {
            if (ui.item.id != 0) {
                $('#client_id').val(ui.item.id)
                $('#email').val(ui.item.email)
                $('#mobile_no').val(ui.item.phone);
                $('#opportunity').val(ui.item.opportunity);
            }
        },
        minLength: 1,
    });

    $('#add_product').click(function () {
        $('tbody').append(`
                                <tr>
                                    <td>
                                        <select name="product_name" id="product_name" class="form-control select">
                                            <option value="">select</option>
                                            @foreach($product as $p)
                                                <option value="{{ $p }}">{{ $p->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="description" id="description">
                                    </td>
                                    <td><input type="number" class="form-control" name="quantity" id="quantity" min="1"></td>
                                    <td><input type="number" class="form-control" name="unitPrice" id="unitPrice" readonly></td>
                                    <td>
                                        <select multiple="multiple" name="tax[]" id="tax" class="form-control">
                                            @foreach($tax as $t)
                                                <option value="{{$t}}">{{$t->tax_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="subtotal" id="subtotal" readonly></td>
                                </tr>
        `);
    });
    $('tbody').on('change', '#product_name', function () {
        $('#product_id').val(JSON.parse(this.value).unique_id)
        $('#description').val(JSON.parse(this.value).description)
        $('#unitPrice').val(JSON.parse(this.value).price)
        $('#subtotal').val(JSON.parse(this.value).price)
        $('#quantity').val(1)
        $('#quantity').attr({
            "max" : JSON.parse(this.value).available_quantity
        })
        $('#total').val(JSON.parse(this.value).price)
        // alert(this.value)
    });

    $('tbody').on('change','#quantity',function(){
        var qty = parseInt(this.value)
        var u_price = parseFloat($('#unitPrice').val());
        var sub = qty*u_price
        $('#subtotal').val(sub)
        $('#total').val(sub)

    });
    $('tbody').on('change','#tax',function(){
        var total = parseFloat($('#total').val());
        var tax = JSON.parse(this.value).tax_value;
        var total = total+(tax/100);

        $('#total').val(total)

    });

    //start-- ajax for getting products
    // $('#product_name').autocomplete({
    //     source: function (request, response) {
    //         $.ajax({
    //             type: 'get',
    //             url: "{{ route('searchproduct') }}",
    //             dataType: "json",
    //             data: {
    //                 term: $('#product_name').val()
    //             },
    //             success: function (data) {
    //                 response(data);
    //                 console.log(data)
    //             },
    //         });
    //     },
    //     select: function (event, ui) {
    //         if (ui.item.id != 0) {
    //             $('#product_id').val(ui.item.id)
    //             $('#description').val(ui.item.description)
    //             $('#quantity').val(ui.item.quantity)
    //             $('#unitPrice').val(ui.item.price);
    //             $('#subtotal').val(ui.item.subtotal);

    //         }
    //     },
    //     minLength: 1,
    // });
    //end-- ajax for getting products

        $('#discard').click(function () {
            window.history.back();
        });
        $('#tax').select2({
                width: '100%',
                placeholder: "select tax",
                allowClear: true
         });

</script>
@endsection
