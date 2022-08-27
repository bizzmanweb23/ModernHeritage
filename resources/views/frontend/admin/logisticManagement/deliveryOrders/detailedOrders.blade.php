@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Delivery Order Details</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-md-11">
        <div class="card container-fluid">
                <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" id="back" href="{{route('Delivery-Orders')}}">
                        <i class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                </div>
                <div class="card-header pb-0 px-3">
                    <div class="d-flex flex-column">
                        <h4 class="mb-3" id="unique_id_span">Delivery Number: {{ $lead->unique_id }}</h4>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div style="border: steelblue; border-radius: 20px; border-style: groove; padding: 10px 5px 5px 20px;">
                        <h5>Bill To</h5>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="mb-2 ">Customer/Company Name:</label>
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="client_name_span">{{ $lead->client_name }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Contact Person:</label>
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="contact_name_span">{{ $lead->contact_name }}</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="mb-2">Expected Delivery Date:</label>
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="expected_date_span">{{ $lead->expected_date }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2">Contact Phone No:</label>
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="contact_phone_span">{{ $lead->contact_phone }}</span>
                              </div>
                        </div>
                    </div>

                    <div class="mt-2" style="border: steelblue; border-radius: 20px; border-style: none; padding: 10px 5px 5px 20px;">
                        <div class="row mb-2">
                            <div class="col-md-5"><h5>Pickup Details</h5></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5"><h5>Delivery Details</h5></div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5">
                                <label class="mb-2 ">Customer/Company Name:</label>
                                    <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_client_span">{{ $lead->pickup_client }}</span>
                             </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label class="mb-2 ">Customer/Company Name:</label>
                                    <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_client_span">{{ $lead->delivery_client }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5">
                                <label class="mb-2">Address 1:</label>
                                    <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_add_1_span">{{ $lead->pickup_add_1 }}</span>
                             </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label class="mb-2">Address 1:</label>
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_add_1_span">{{ $lead->delivery_add_1 }}</span>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5">
                                <label class="mb-2">Phone No:</label>
                                    <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_phone_span">{{ $lead->pickup_phone }}</span>
                             </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label class="mb-2">Phone No:</label>
                                    <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_phone_span">{{ $lead->delivery_phone }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5 class="mb-2">Extra Informations: </h5>
                        <div class="row mb-2 mt-2">
                            <div class="col-md-5"><h5>Pickup Details</h5></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5"><h5>Delivery Details</h5></div>
                        </div>
                            
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="mb-2">Email: </label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_email_span">{{ $lead->pickup_email }}</span>
                                 </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label class="mb-2">Email: </label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_email_span">{{ $lead->delivery_email }}</span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="mb-2">Address 2: </label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_add_2_span">{{ $lead->pickup_add_2 }}</span>
                                 </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label class="mb-2">Address 2:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_add_2_span">{{ $lead->delivery_add_2 }}</span>
                                 </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="mb-2">Address 3:  </label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_add_3_span">{{ $lead->pickup_add_3 }}</span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label class="mb-2">Address 3:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_add_3_span">{{ $lead->delivery_add_3 }}</span>
                                 </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="mb-2">Location :</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_location_span">{{ $lead->pickup_location }}</span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label class="mb-2">Location :</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_location_span">{{ $lead->delivery_location }}</span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="mb-2">Pin:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_pin_span">{{ $lead->pickup_pin }}</span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label class="mb-2">Pin:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_pin_span">{{ $lead->delivery_pin }}</span>
                                 </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="mb-2">State:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_state_span">{{ $lead->pickup_state }}</span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label class="mb-2">State:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_state_span">{{ $lead->delivery_state }}</span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <label class="mb-2">Country:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="pickup_country_span">{{ $lead->pickup_country }}</span>
                                 </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <label class="mb-2">Country:</label>
                                        <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                        id="delivery_country_span">{{ $lead->delivery_country }}</span>
                                       
                                </div>
                            </div>
                            <div style="border: steelblue; border-radius: 20px; border-style: groove; padding: 10px 5px 5px 20px;">
                                <table class="table mb-0 table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase" scope="col">
                                                <p class="mb-0 mt-0 text-xs font-weight-bolder">Product Name</p>
                                            </th>
                                            <th class="text-uppercase" scope="col">
                                                <p class="mb-0 mt-0 text-xs font-weight-bolder">Dimension</p>
                                            </th>
                                            <th class="text-uppercase" scope="col">
                                                <p class="mb-0 mt-0 text-xs font-weight-bolder">Quantity</p>
                                            </th>
                                            <th class="text-uppercase" scope="col">
                                                <p class="mb-0 mt-0 text-xs font-weight-bolder">UOM</p>
                                            </th>
                                            <th class="text-uppercase" scope="col">
                                                <p class="mb-0 mt-0 text-xs font-weight-bolder">Area</p>
                                            </th>
                                            <th class="text-uppercase" scope="col">
                                                <p class="mb-0 mt-0 text-xs font-weight-bolder">Weight</p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lead_products as $product)
                                        <tr>
                                            <td>
                                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                                id="delivery_country_span">{{$product->product_name}}</span>
                                                 </td>
                                            <td>
                                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                                id="delivery_country_span">{{$product->dimension }}</span>
                                                 </td>
                                            <td>
                                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                                id="delivery_country_span">{{  $product->quantity  }}</span>
                                                 </td>
                                            <td>
                                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                                id="delivery_country_span">{{ $product->uom}}</span>
                                                 </td>
                                            <td>
                                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                                id="delivery_country_span">{{ $product->area }}</span>
                                                </td>
                                            <td>
                                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                                id="delivery_country_span">{{ $product->weight }}</span>
                                                 </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>  
        </div>
    </div>
    <div class="col-md-1">
        <div class="card">
            <div class="card-body px-2 py-2">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item mb-2">
                      <h2 class="accordion-header" id="headingOne" style="background-color: bisque" title="Quotation">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <strong><i class="fas fa-receipt"></i></strong>
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @if ($quotation_count > 0)
                                    <a href="{{ url('/') }}/admin/logistic/viewquotation/{{ $lead->id }}"
                                        class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-angle-right"></i> View</a>
                                @else
                                    <a href=""
                                        class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-exclamation-circle"></i></a>
                                @endif
                            </div>
                      </div>
                    </div>
                    <div class="accordion-item mb-2">
                      <h2 class="accordion-header" id="headingTwo" style="background-color: bisque" title="Sales Person">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong><i class="fas fa-user-tag"></i></strong>
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if (isset($assignedSalesperson))
                                <a href="{{ route('assignedleads',['salesperson_id' => $assignedSalesperson->sale_person_id]) }}"
                                    class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-angle-right"></i> View</a>
                            @else
                                <a href=""class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-exclamation-circle"></i></a>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item mb-2">
                      <h2 class="accordion-header" id="headingThree" style="background-color: bisque" title="Driver">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong><i class="fas fa-truck"></i></strong>
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if (isset($assigned_driver))
                                <a href=""
                                    class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-angle-right"></i> View</a>
                            @else
                                <a href=""class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-exclamation-circle"></i></a>
                            @endif
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item mb-2">
                      <h2 class="accordion-header" id="headingFour" style="background-color: bisque" title="Invoice">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <strong><i class="fas fa-file-invoice"></i></strong>
                        </button>
                      </h2>
                      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if (isset($invoice))
                                <a href="{{ route('showInvoice', ['lead_id' => $lead->id]) }}"
                                    class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-angle-right"></i> View</a>
                            @else
                                <a href=""class="btn btn-link text-dark px-0 py-0 mb-0"><i class="fas fa-exclamation-circle"></i></a>
                            @endif
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
