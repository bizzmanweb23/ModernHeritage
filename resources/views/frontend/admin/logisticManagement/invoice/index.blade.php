@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Invoice</h6>
@endsection

@section('content')
@if(Session::has('success'))
    <h4>Success</h4>
@endif
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card container container-fluid">
            <form action="{{ route('confirmInvoice',['lead_id' => $lead->id]) }}" method="post">
                @csrf
                <div class="ms-auto text-end">

                    {{-- <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i
                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a> --}}
                    @if (!isset($invoice->quotation_reference))
                        <button type="submit" class="btn btn-link text-dark px-3 mb-0" id="save"><i
                            class="fas fa-save text-dark me-2" aria-hidden="true"></i>Confirm</button>   
                    @endif
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ url('/') }}/admin/logistic/viewrequest/{{ $lead->id }}"><i
                            class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                            
                    {{-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="{{ url()->previous() }}"><i
                            class="far fa-trash-alt me-2"></i>Discard</a> --}}
                </div>
                @if (isset($invoice->quotation_reference))
                    <a class="btn btn-dark" href="{{ route('paymentReceived',['lead_id' => $lead->id]) }}">Payment Received</a> 
                    <a class="btn btn-dark" href="#">Credit Note</a>
                @endif

                <input type="hidden" name="client_id" value="{{ $lead->client_id }}" id="client_id">
                <input type="hidden" name="leads_id" value="{{ $lead->id }}" id="leads_id">
                <div class="card-body pt-4 p-3">
                    <div class="d-flex flex-column">
                        <h4>{{ $invoice->unique_id }}</h4>
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <span class="mb-2">Customer Name:
                                    <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span">{{ $lead->client_name }}</span>
                                </span>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <span class="mb-2">Invoice Type:
                                    <span class="text-dark font-weight-bold ms-sm-2" id="invoice_type_span">{{ str_replace('_', ' ', $invoice->invoice_type) }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <span class="mb-2">Contact Name:
                                    <span class="text-dark font-weight-bold ms-sm-2" id="contact_name_span">{{ $lead->contact_name }}</span>
                                </span>
        
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <span class="mb-2">GST Treatment:
                                    <span class="text-dark font-weight-bold ms-sm-2" id="gst_treatment_span">{{ $quotation_details ? $quotation_details->gst_treatment : '' }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <span class="mb-2">Delivery Location:
                                    <span class="text-dark font-weight-bold ms-sm-2" id="delivery_location_span">{{ $lead->delivery_location }}</span>
                                </span>
        
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <span class="mb-2">Invoice Date:
                                    <span class="text-dark font-weight-bold ms-sm-2" id="invoice_date_span">{{ $invoice->invoice_date }}</span>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <span class="mb-2">Quotation Reference:
                                    {{-- <span class="text-dark font-weight-bold ms-sm-2" id="quotation_reference_span">{{ $invoice->quotation_id }}</span> --}}
                                    <select name="quotation_reference" id="quotation_reference" class="form-control"
                                            onchange="onQuoteChange({{ $quotations }},{{ $invoice->price_breakup_loops }}, '{{  $invoice->invoice_type }}', '{{ $invoice->down_payment }}')" required {{ isset($invoice->quotation_reference) ? 'disabled' : '' }}>
                                        <option value="">select quotation</option>
                                        @foreach ($quotations as $q)
                                            <option value="{{ $q->quotation_id }}" {{ $q->quotation_id == $invoice->quotation_reference ? 'selected' : '' }}>{{ $q->quotation_id }}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <span class="mb-2">Due Date:
                                    <span class="text-dark font-weight-bold ms-sm-2" id="due_date_span">{{ $invoice->due_date }}</span>
                                </span>
                            </div>
                        </div>
                        
                        <div class="mb-3 mt-3">
                            <table class="table mb-0 mt-3 table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase" scope="col">
                                            <p class="mb-0 mt-0 text-xs font-weight-bolder">Service Name</p>
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
                                            <span class="text-dark font-weight-bold ms-sm-2" id="service_name">{{ $quotation_details ? $quotation_details->product : '' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold ms-sm-2" id="description">{{ $quotation_details ? $quotation_details->description : '' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold ms-sm-2" id="quantity">{{ $quotation_details ? $quotation_details->quantity : '' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold ms-sm-2" id="unit_price">{{ $quotation_details ? '₹ '.$quotation_details->unit_price : '' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold ms-sm-2" id="tax">{{ $quotation_details ? $quotation_details->selected_taxs_name : '' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold ms-sm-2" id="subtotal">{{ $quotation_details ? '₹ '.floatval($quotation_details->unit_price) * intval($quotation_details->quantity) : '' }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
    
                            <div class="ms-auto text-end row">
                                <span id="untaxed_total_span" class="font-weight-bolder"></span>
                                <span id="tax_total_span" class="font-weight-bolder"></span>
                                <span id="total_span" class="font-weight-bolder"></span>
                                <span class="text-dark font-weight-bold ms-sm-2"id="total_price">{{ $quotation_details ? 'Total Price : ₹ ' . $quotation_details->total_price : '' }}</span>
                            </div>
                        </div>
                        
                        @if (isset($invoice->quotation_reference))
                            {{-- invoice already confirmed --}}
                            <div class="mt-2">
                                <h5 class="mb-3">Price</h5>
                                @foreach ($invoice_price_breakups as $pb)
                                <div class="d-flex" id="">
                                    <div class="card m-2 view_span" style="background-color: lightsteelblue; width: 15rem">
                                        <a href="#">
                                            <div class="card-body p-2">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label for="">{{ $pb->breakup_type }}</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <span class="badge badge-sm bg-gradient-secondary mx-2" id="regular_amount_span">
                                                            ₹ {{ $pb->breakup_amount }}
                                                        </span>
                                                        <input type="hidden" name="regular_amount_input" id="regular_amount_input">
                                                    </div>
                                                    <div class="col-md-4">
                                                        @if ($pb->is_paid == 0)
                                                            <span class="badge badge-sm bg-gradient-warning">
                                                                UNPAID
                                                            </span>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-success">
                                                                PAID
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            {{-- invoice not confirmed --}}
                            @if ($invoice->invoice_type != 'regular')
                                <div class="mt-2">
                                    <h5 class="mb-3">Price Breakup</h5>
                                    <div class="d-flex" id="price_breakup_div">
                                        @if ($invoice->invoice_type == 'down_payment_percentage')
                                            <input type="hidden" name="price_breakup_percentage_input" id="price_breakup_percentage_input">
                                            <input type="hidden" name="price_breakup_loop" id="price_breakup_loop">
                                            @for ($i = 1; $i <= $invoice->price_breakup_loops; $i++)
                                                <div class="card m-2 view_span" style="background-color: lightsteelblue; width: 15rem">
                                                    <a href="#">
                                                        <div class="card-body p-2">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <label for="">Installment {{ $i }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <span class="badge badge-sm bg-gradient-secondary mx-2 price_breakup_percentage_span">
                                                                        ₹ 0
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <span class="badge badge-sm bg-gradient-warning">
                                                                        UNPAID
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endfor
                                        @endif
                                        @if ($invoice->invoice_type == 'down_payment_amount')
                                            <div class="card m-2 view_span" style="background-color: lightsteelblue; width: 18rem">
                                                <a href="#">
                                                    <div class="card-body p-2">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <label for="">Downpayment</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <span class="badge badge-sm bg-gradient-secondary mx-2" id="price_breakup_amount_span">
                                                                    ₹ 0
                                                                </span>
                                                                <input type="hidden" name="price_breakup_amount_input" id="price_breakup_amount_input">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span class="badge badge-sm bg-gradient-warning">
                                                                    UNPAID
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card m-2 view_span" style="background-color: lightsteelblue; width: 18rem">
                                                <a href="#">
                                                    <div class="card-body p-2">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <label for="">Remaining</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <span class="badge badge-sm bg-gradient-secondary mx-2" id="remaining_price_span">
                                                                    ₹ 0
                                                                </span>
                                                                <input type="hidden" name="remaining_price_input" id="remaining_price_input">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <span class="badge badge-sm bg-gradient-warning">
                                                                    UNPAID
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            
                                            
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="mt-2">
                                    <h5 class="mb-3">Price</h5>
                                    <div class="d-flex" id="">
                                        <div class="card m-2 view_span" style="background-color: lightsteelblue; width: 15rem">
                                            <a href="#">
                                                <div class="card-body p-2">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <label for="">Amount</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <span class="badge badge-sm bg-gradient-secondary mx-2" id="regular_amount_span">
                                                                ₹ 0
                                                            </span>
                                                            <input type="hidden" name="regular_amount_input" id="regular_amount_input">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span class="badge badge-sm bg-gradient-warning">
                                                                UNPAID
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{ session('success') }}");
    @endif

    function onQuoteChange(quotations, price_breakup_loops, invoice_type, down_payment)
    {
        var selected_quotation = $('#quotation_reference').val();
        $('#price_breakup_loop').val(price_breakup_loops);
        console.log('price_breakup_loops : ',price_breakup_loops);
        console.log('invoice_type : ',invoice_type);
        if (selected_quotation == ""){
            $('#gst_treatment_span').text("");
            $('#service_name').text('');
            $('#description').text('');
            $('#quantity').text('');
            $('#unit_price').text('');
            $('#tax').text('');
            $('#subtotal').text('');
            $('#total_price').text('');
            if(invoice_type === 'down_payment_percentage'){
                $('.price_breakup_percentage_span').text('₹ 0');
            }
            
            if(invoice_type === 'down_payment_amount'){
                $('#price_breakup_amount_span').text('₹ 0');
                $('#remaining_price_span').text('₹ 0');
            }
            if (invoice_type === 'regular') {
                $('#regular_amount_span').text('₹ 0');
            }
            $('#price_breakup_div').hide();
        } else {
            quotations.forEach(q => {
                if(q.quotation_id == selected_quotation){
                    $('#gst_treatment_span').text(q.gst_treatment);
                    $('#service_name').text(q.product);
                    $('#description').text(q.description);
                    $('#quantity').text(q.quantity);
                    $('#unit_price').text('₹ '+q.unit_price);
                    $('#tax').text(q.selected_taxs_name);
                    $('#subtotal').text('₹ '+ parseInt(q.quantity) * parseFloat(q.unit_price));
                    $('#total_price').text('Total Price : ₹ '+q.total_price);

                    if(invoice_type === 'down_payment_percentage'){
                        var breakup_price = parseFloat(q.total_price / price_breakup_loops);
                        $('.price_breakup_percentage_span').text('₹ '+breakup_price.toFixed(2));
                        $('#price_breakup_percentage_input').val(breakup_price.toFixed(2));
                    }
                    
                    if(invoice_type === 'down_payment_amount'){
                        $('#price_breakup_amount_span').text('₹ '+parseFloat(down_payment));
                        $('#price_breakup_amount_input').val(parseFloat(down_payment));
                        $('#remaining_price_span').text('₹ '+ parseFloat(parseFloat(q.total_price) - parseFloat(down_payment)));
                        $('#remaining_price_input').val(parseFloat(parseFloat(q.total_price) - parseFloat(down_payment)));

                    }

                    if (invoice_type === 'regular') {
                        $('#regular_amount_span').text('₹ '+ parseFloat(q.total_price));
                        $('#regular_amount_input').val(parseFloat(q.total_price));
                    }
                }
            });
            $('#price_breakup_div').show();
        }
    }
</script>
@endsection