@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Confirm Quotation</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <form action="{{ url('/') }}/admin/confirmquotation/{{ $quotation->id }}" method="post">
                @csrf
                <div class="ms-auto text-end">
                    @if(isset($quotation->sales_id))
                        {{-- new code --}}
                    @else
                    <button type="submit" class="btn btn-link text-dark px-3 mb-0" id="confirm"><i
                            class="fas fa-save text-dark me-2" aria-hidden="true"></i>Confirm</button>
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="{{ url('/') }}/admin/viewrequest/{{ $quotation->leads_id }}"><i
                            class="far fa-trash-alt me-2"></i>Discard</a>
                    @endif
                </div>  

                <input type="hidden" name="customer_id" value="{{ $quotation->customer_id }}" id="customer_id">
                <input type="hidden" name="quotation_id" value="{{ $quotation->id }}" id="quotation_id">
                <div class="card-header pb-0 px-3">
                    <div class="d-flex flex-column">
                    @if (isset($quotation->sales_id))
                        <h5 class="mb-0" id="sales_id">Sales Id : {{ $quotation->sales_id }}</h5>   
                    @endif                   
                    <h5 class="mb-0" id="quotation_unique_id">Quotation Id : {{ $quotation->quotation_unique_id }}</h5>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="d-flex flex-column">
                        <span class="mb-2 text-xs">Contact Name:
                            <span class="text-dark font-weight-bold ms-sm-2" id="client_name">{{ $quotation->client_name }}</span>
                        </span>

                        <span class="mb-2 text-xs">GST Treatment:
                            <span class="text-dark font-weight-bold ms-sm-2" id="gst_treatment">{{ $quotation->gst_treatment_name }}</span>
                        </span>

                        
                        <span class="mb-2 text-xs">Expiration:
                            <span class="text-dark font-weight-bold ms-sm-2" id="expiration">{{ $quotation->expiration }}</span>
                        </span>
                        <br>
                        <br>
                        <input type="hidden" name="product_id" id="product_id">
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
                                @foreach ($quotation_product as $qp)
                                <tr>
                                    <td>
                                        <span class="text-dark font-weight-bold ms-sm-2" id="product_name">{{ $qp->product_name }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark font-weight-bold ms-sm-2" id="description">{{ $qp->description }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark font-weight-bold ms-sm-2" id="quantity">{{ $qp->quantity }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark font-weight-bold ms-sm-2" id="price">{{ $qp->price }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark font-weight-bold ms-sm-2" id="tax">
                                            @foreach ($qp->selected_taxs_name as $tax_name)
                                                {{ $tax_name }} 
                                            @endforeach
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-dark font-weight-bold ms-sm-2" id="subtotal">{{ $qp->price * $qp->quantity }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div>
                            <a class="btn btn-link text-dark px-3 mb-0" id="add_product" href="#"><i
                                    class="fas fa-plus text-dark me-2" aria-hidden="true"></i>Add Product</a>
                        </div> --}}

                        <div class="ms-auto text-end row">
                            <label for="total">Total :</label>
                            {{-- <span class="text-dark font-weight-bold ms-sm-2" id="total">{{ $qp->total }}</span> --}}
                        </div>
                        
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>

@endsection