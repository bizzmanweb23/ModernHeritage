@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Invoice</h6>
@endsection

@section('content')
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
                                    <span class="text-dark font-weight-bold ms-sm-2" id="invoice_type_span">{{ $invoice->invoice_type }}</span>
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
                                            onchange="onQuoteChange({{ $quotations }})" required {{ isset($invoice->quotation_reference) ? 'disabled' : '' }}>
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
                        <br>
                        <br>
                        
                        <div id="table_div">
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
                                            <span class="text-dark font-weight-bold ms-sm-2" id="unit_price">{{ $quotation_details ? $quotation_details->unit_price : '' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold ms-sm-2" id="tax">{{ $quotation_details ? $quotation_details->selected_taxs_name : '' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark font-weight-bold ms-sm-2" id="subtotal">{{ $quotation_details ? floatval($quotation_details->unit_price) * intval($quotation_details->quantity) : '' }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
    
                            <div class="ms-auto text-end row">
                                <span id="untaxed_total_span" class="font-weight-bolder"></span>
                                <span id="tax_total_span" class="font-weight-bolder"></span>
                                <span id="total_span" class="font-weight-bolder"></span>
                                <span class="text-dark font-weight-bold ms-sm-2"id="total_price">{{ $quotation_details ? 'Total Price : ' . $quotation_details->total_price : '' }}</span>
                            </div>
                        </div>
                        
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function onQuoteChange(quotations)
    {
        var selected_quotation = $('#quotation_reference').val();
        console.log('here : ',selected_quotation);
        if (selected_quotation == ""){
            $('#gst_treatment_span').text("");
            $('#service_name').text('');
            $('#description').text('');
            $('#quantity').text('');
            $('#unit_price').text('');
            $('#tax').text('');
            $('#subtotal').text('');
            $('#total_price').text('');
        } else {
            quotations.forEach(q => {
                if(q.quotation_id == selected_quotation){
                    $('#gst_treatment_span').text(q.gst_treatment);
                    $('#service_name').text(q.product);
                    $('#description').text(q.description);
                    $('#quantity').text(q.quantity);
                    $('#unit_price').text(q.unit_price);
                    $('#tax').text(q.selected_taxs_name);
                    $('#subtotal').text(parseInt(q.quantity) * parseFloat(q.unit_price));
                    $('#total_price').text('Total Price : '+q.total_price);
                }
            });
        }
    }
</script>
@endsection