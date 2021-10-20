@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Add Quotation</h6>
@endsection

@section('content')

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
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <span class="mb-2">Contact Name:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span">{{ $lead->client_name }}</span>
                                --}}
                                <input type="text" name="client_name" id="client_name" value="{{ $lead->client_name }}"
                                    placeholder="Contact Name" class="form-control"/>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <span class="mb-2">Expiration:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="expiration_span"></span> --}}
                                    <input type="date" name="expiration" id="expiration" placeholder="" class="form-control" />
                                </span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <span class="mb-2">GST Treatment:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span"></span> --}}
                                    <select name="gst_treatment" id="gst_treatment"  class="form-control" >
                                        @foreach($gst as $gt)
                                            <option value="{{ $gt->id }}">{{ $gt->gst_treatment }}</option>
                                        @endforeach
                                    </select>
                                </span>
        
                            </div>
                        </div>
                       
                        <br>
                        <br>
                        <input type="hidden" name="product_row_count" id="product_row_count">
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
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-link text-dark px-3 mb-0" id="add_product" href="#"><i
                                    class="fas fa-plus text-dark me-2" aria-hidden="true"></i>Add Product</a>
                        </div>

                        <div class="ms-auto text-end row">
                            <span id="untaxed_total_span" class="font-weight-bolder"></span>
                            <span id="tax_total_span" class="font-weight-bolder"></span>
                            <span id="total_span" class="font-weight-bolder"></span>
                            <input hidden type="number" name="total" id="total" readonly>
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
        $('#product_row_count').val(window.count);
        $('tbody').append(`
                            <tr>
                                <input type="hidden" name="product_id${window.count}" id="product_id${window.count}">
                                <td>
                                    <select name="product_name${window.count}" id="product_name${window.count}" class="form-control select" onchange="getproduct(${window.count})">
                                        <option value="">select</option>
                                        @foreach($product as $p)
                                            <option value="{{ $p }}">{{ $p->product_name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="description${window.count}" id="description${window.count}">
                                </td>
                                <td><input type="number" class="form-control" name="quantity${window.count}" id="quantity${window.count}" onchange="onqtychange()" min="1"></td>
                                <td><input type="number" class="form-control" name="unitPrice${window.count}" id="unitPrice${window.count}" readonly></td>
                                <td>
                                    <select multiple="multiple" name="tax${window.count}[]" id="tax${window.count}" class="form-control" onchange="ontaxchange(${window.count})">
                                        @foreach($tax as $t)
                                            <option value="{{$t}}">{{$t->tax_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" class="form-control" name="subtotal${window.count}" id="subtotal${window.count}" readonly></td>
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

        $('#product_id'+count).val(val.unique_id)
        $('#description'+count).val(val.description)
        $('#unitPrice'+count).val(val.price)
        $('#subtotal'+count).val(val.price)
        $('#quantity'+count).val(1)
        $('#quantity'+count).attr({
            "max" : val.available_quantity
        })
        ontaxchange();
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
        ontaxchange();
    }

    function ontaxchange(){
        // console.log('ontaxchange - '+$('#total').val());
        var total = 0; 
        var sub_total = 0;
        var untaxed_total = 0;
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
                sub_tax = sub_tax + ((sub*tax_value) / 10000)
                console.log('subtax - '+sub_tax);
            }
            sub_total = sub + sub_tax;
            untaxed_total = untaxed_total + sub;
            total = total + sub_total;
            console.log('sub_total - '+sub_total);
            // console.log('ontaxchange - '+Object.keys(tax).length);
            // console.log('ontaxchange - '+Object.values(tax)[0]);
        }
        console.log('total - '+total);
        $('#total').val(total.toFixed(2));
        $('#untaxed_total_span').text('Untaxed total :   ₹ ' + untaxed_total.toFixed(2));
        var tax_amt = total.toFixed(2) - untaxed_total.toFixed(2);
        $('#tax_total_span').text('Tax :   ₹ ' + tax_amt.toFixed(2));
        $('#total_span').text('Total :   ₹ ' + total.toFixed(2));
    }

    $('#discard').click(function () {
        window.history.back();
    });

</script>
@endsection
