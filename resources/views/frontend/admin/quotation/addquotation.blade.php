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
                                {{-- <tr>
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
                                </tr> --}}
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

    window.count = 1;
    $('#add_product').click(function () {
        console.log(window.count);
        $('tbody').append(`
                            <tr>
                                <td>
                                    <select name="product_name" id="product_name${window.count}" class="form-control select" onchange="getproduct(${window.count})">
                                        <option value="">select</option>
                                        @foreach($product as $p)
                                            <option value="{{ $p }}">{{ $p->product_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="description" id="description${window.count}">
                                </td>
                                <td><input type="number" class="form-control" name="quantity" id="quantity${window.count}" onchange="onqtychange()" min="1"></td>
                                <td><input type="number" class="form-control" name="unitPrice" id="unitPrice${window.count}" readonly></td>
                                <td>
                                    <select multiple="multiple" name="tax[]" id="tax${window.count}" class="form-control" onchange="ontaxchange(${window.count})">
                                        @foreach($tax as $t)
                                            <option value="{{$t}}">{{$t->tax_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" class="form-control" name="subtotal" id="subtotal${window.count}" readonly></td>
                            </tr>
                        `);
        
        $(`#tax${window.count}`).select2({
                width: '10em',
                placeholder: "select tax",
                allowClear: true
        });
        window.count++;
    });

    function getproduct(count)
    {
        var val = JSON.parse($('#product_name'+count).val());
        console.log('getproduct - '+count);

        // $('#product_id'+count).val(JSON.parse($('#product_name'+count).value).unique_id)
        $('#description'+count).val(val.description)
        $('#unitPrice'+count).val(val.price)
        $('#subtotal'+count).val(val.price)
        $('#quantity'+count).val(1)
        $('#quantity'+count).attr({
            "max" : val.available_quantity
        })
        // console.log('here - '+$('#total').val());
        if($('#total').val() === NaN || $('#total').val() === null || $('#total').val() === ''){
            var total = parseFloat(val.price);
        } else {
            var total = parseFloat($('#total').val()) + parseFloat(val.price);
        }
        $('#total').val(total);
    }

    function onqtychange(){
        console.log('onqtychange - '+$('#total').val());
        var total = 0; 
        
        for(var i = 1; i<window.count; i++)
        {
            var sub = 0;
            var qty = parseInt($('#quantity'+i).val())
            var u_price = parseFloat($('#unitPrice'+i).val());
            sub = (qty*u_price);
            total = total + sub
            $('#subtotal'+i).val(sub)
        }
        $('#total').val(total)
    }

    function ontaxchange(){
        // console.log('ontaxchange - '+$('#total').val());
        var total = 0; 
        var sub_total = 0;
        // console.log('here'+window.count)
        for(var i = 1; i<window.count; i++)
        {
            var sub = parseFloat($('#subtotal'+i).val());
            var sub_tax = 0;
            var tax = $('#tax'+i).val();
            var taxLength = Object.keys(tax).length;
            var taxValues = Object.values(tax);
            for(var j=0; j<taxLength; j++){
                var tax_value = parseFloat(JSON.parse(taxValues[j]).tax_value);
                sub_tax = sub_tax + (tax_value / 100)
                console.log('subtax - '+sub_tax);
            }
            sub_total = sub + sub_tax;
            total = total + sub_total;
            console.log('sub_total - '+sub_total);
            // console.log('ontaxchange - '+Object.keys(tax).length);
            // console.log('ontaxchange - '+Object.values(tax)[0]);
        }
        console.log('total - '+total);
        $('#total').val(total.toFixed(2));
    }

    $('tbody').on('change','#tax',function(){
        var total = parseFloat($('#total').val());
        var tax = JSON.parse(this.value).tax_value;
        var total = total+(tax/100);

        $('#total').val(total)

    });

    $('#discard').click(function () {
        window.history.back();
    });

</script>
@endsection
