@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Add Quotation</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card container container-fluid">
            <form action="{{ url('/') }}/admin/logistic/newquotation/{{ $lead->id }}" method="post">
                @csrf
                <div class="ms-auto text-end">

                    {{-- <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i
                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ route('getRequest') }}"><i
                            class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a> --}}
                    <button type="submit" class="btn btn-link text-dark px-3 mb-0" id="save"><i
                            class="fas fa-save text-dark me-2" aria-hidden="true"></i>Save</button>
                            
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="{{ url()->previous() }}"><i
                            class="far fa-trash-alt me-2"></i>Discard</a>
                </div>

                <input type="hidden" name="client_id" value="{{ $lead->client_id }}" id="client_id">
                <input type="hidden" name="leads_id" value="{{ $lead->id }}" id="leads_id">
                <div class="card-body pt-4 p-3">
                    <div class="d-flex flex-column">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <span class="mb-2">Client Name:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span">{{ $lead->client_name }}</span>
                                --}}
                                <input type="text" name="client_name" id="client_name" value="{{ $lead->client_name }}"
                                    placeholder="Contact Name" class="form-control" readonly/>
                                </span>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <span class="mb-2">Expiration:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="expiration_span"></span> --}}
                                    <input type="date" name="expiration" id="expiration" placeholder="" class="form-control" />
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <span class="mb-2">Contact Name:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span"></span> --}}
                                    <input type="text" name="contact_name" id="contact_name" value="{{ $lead->contact_name }}"
                                                placeholder="Contact Name" class="form-control" readonly/>
                                </span>
        
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
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
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <span class="mb-2">Delivery Location:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span"></span> --}}
                                    <input type="text" name="delivery_location" id="delivery_location" value="{{ $lead->delivery_location }}"
                                                placeholder="Delivery Location" class="form-control" readonly/>
                                </span>
        
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <span class="mb-2">Quotation Template:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="expiration_span"></span> --}}
                                    <input type="text" name="quotation_template" id="quotation_template" placeholder="" class="form-control" />
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <span class="mb-2">Payment Terms:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="expiration_span"></span> --}}
                                    <select name="payment_terms" id="payment_terms"  class="form-control" >
                                        <option value="Immediate Payment">Immediate Payment</option>
                                        <option value="15 Days">15 Days</option>
                                        <option value="21 Days">21 Days</option>
                                        <option value="30 Days">30 Days</option>
                                        <option value="45 Days">45 Days</option>
                                        <option value="2 Months">2 Months</option>
                                        <option value="End of following Months">End of following Months</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <br>
                        <br>
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
                                    <td><input type="text" class="form-control" name="product_name" id="product_name"></td>
                                    <td><input type="text" class="form-control" name="description" id="description"></td>
                                    <td><input type="number" class="form-control" name="quantity" id="quantity" onchange="onqtychange()" min="1"></td>
                                    <td><input type="text" class="form-control" name="unitPrice" id="unitPrice" onchange="onqtychange()"></td>
                                    <td>
                                        <select multiple="multiple" name="tax[]" id="tax" class="form-control" onchange="ontaxchange()">
                                            @foreach($tax as $t)
                                                <option value="{{$t}}">{{$t->tax_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="subtotal" id="subtotal" readonly></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="ms-auto text-end row">
                            <span id="untaxed_total_span" class="font-weight-bolder"></span>
                            <span id="tax_total_span" class="font-weight-bolder"></span>
                            <span id="total_span" class="font-weight-bolder"></span>
                            <input hidden type="text" name="total" id="total" readonly>
                        </div>
                        
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(`#tax`).select2({
            width: '10em',
            placeholder: "select tax",
            allowClear: true
    });

    function onqtychange(){
        console.log('onqtychange - '+$('#total').val());
        var total = 0; 
        var sub = 0;
        var qty = parseInt($('#quantity').val());
        if(isNaN($('#unitPrice').val()) || $('#unitPrice').val() === null || $('#unitPrice').val() === "" || $('#unitPrice').val() === undefined){
            console.log('if');
            var u_price = 0;
        } else {
            console.log('else');
            var u_price = parseFloat($('#unitPrice').val());
        }
        sub = (qty*u_price);
        total = total + sub
        $('#subtotal').val(sub)
        ontaxchange();
    }

    function ontaxchange(){
        // console.log('ontaxchange - '+$('#total').val());
        var total = 0; 
        var sub_total = 0;
        var untaxed_total = 0;
        // console.log('here'+window.count)
        var sub = parseFloat($('#subtotal').val());
        var sub_tax = 0;
        var tax = $('#tax').val();
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

        console.log('total - '+total);
        $('#total').val(total.toFixed(2));
        $('#untaxed_total_span').text('Untaxed total :   ₹ ' + untaxed_total.toFixed(2));
        var tax_amt = total - untaxed_total;
        console.log('tax_amt - '+tax_amt);
        $('#tax_total_span').text('Tax :   ₹ ' + tax_amt.toFixed(2));
        $('#total_span').text('Total :   ₹ ' + total.toFixed(2));
    }
</script>
@endsection