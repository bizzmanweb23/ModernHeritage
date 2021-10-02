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
            <input type="hidden" name="client_id" value="{{ $lead->client_id }}" id="client_id">
            <input type="hidden" name="leads_id" value="{{ $lead->id }}" id="leads_id">
            <div class="card-body pt-4 p-3">
                <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Contact Name: 
                        {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span">{{ $lead->client_name }}</span> --}}
                        <input type="text" name="client_name" id="client_name" value="{{ $lead->client_name }}" placeholder="Contact Name"/>
                    </span>  

                    <span class="mb-2 text-xs">GST Treatment: 
                        {{-- <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span"></span> --}}
                        <select name="gst_treatment" id="gst_treatment">
                                @foreach ($gst as $gt)
                                    <option value="{{ $gt->id }}">{{ $gt->gst_treatment }}</option>
                                @endforeach
                        </select>
                    </span>  

                    <span class="mb-2 text-xs">Expiration: 
                        {{-- <span class="text-dark font-weight-bold ms-sm-2" id="expiration_span"></span> --}}
                        <input type="date" name="expiration" id="expiration"  placeholder=""/>
                    </span> 
                    <br>
                    <br>
                    <input type="hidden" name="product_id" value="" id="product_id">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase" scope="col"><p class="mb-2 text-xs font-weight-bolder">Product</p></th>
                                <th class="text-uppercase" scope="col"><p class="mb-2 text-xs font-weight-bolder">Description</p></th>
                                <th class="text-uppercase" scope="col"><p class="mb-2 text-xs font-weight-bolder">Quantity</p></th>
                                <th class="text-uppercase" scope="col"><p class="mb-2 text-xs font-weight-bolder">Unit Price</p></th>
                                <th class="text-uppercase" scope="col"><p class="mb-2 text-xs font-weight-bolder">Taxes</p></th>
                                <th class="text-uppercase" scope="col"><p class="mb-2 text-xs font-weight-bolder">Subtotal</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <td><input type="text" name="product_name" id="product_name"></td>
                            <td><input type="text" name="description" id="description"></td>
                            <td><input type="text" name="quantity" id="quantity"></td>
                            <td><input type="text" name="price" id="price"></td>
                            <td><input type="text" name="tax" id="tax"></td>
                            <td><input type="text" name="subtotal" id="subtotal"></td>
                        </tbody>
                    </table>

                </div>
                <div class="ms-auto text-end">
                   
                    <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back" href="{{ route('getRequest') }}"><i class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                    <button type="submit" class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2" aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Discard</a>
                </div>
            </div>
        </form>
       </div>
    </div>
</div>

<script>
     $('#client_name').autocomplete({
             source: function(request, response) {
                 $.ajax({
                     type: 'get',
                     url: "{{ route('searchrequest') }}",
                     dataType: "json",
                     data: {
                         term: $('#client_name').val()
                     },
                     success: function(data) {
                         response(data);
                         console.log(data)
                     },
                 });
             },
             select: function(event, ui) {
                if (ui.item.id != 0) {
                    $('#client_id').val(ui.item.id)
                    $('#email').val(ui.item.email)
                    $('#mobile_no').val(ui.item.phone);
                    $('#opportunity').val(ui.item.opportunity);
                }
            },
            minLength: 1,
    });

    //start-- ajax for getting products
    $('#product_name').autocomplete({
             source: function(request, response) {
                 $.ajax({
                     type: 'get',
                     url: "{{ route('searchproduct') }}",
                     dataType: "json",
                     data: {
                         term: $('#product_name').val()
                     },
                     success: function(data) {
                         response(data);
                         console.log(data)
                     },
                 });
             },
             select: function(event, ui) {
                if (ui.item.id != 0) {
                    $('#product_id').val(ui.item.id)
                    $('#description').val(ui.item.description)
                    $('#quantity').val(ui.item.quantity)
                    $('#price').val(ui.item.price);
                    $('#subtotal').val(ui.item.subtotal);
                    
                }
            },
            minLength: 1,
    });
    //end-- ajax for getting products

    $(document).ready(function() {
        $('#edit').hide();
        $('#back').hide();
        $('#discard').click(function() {
            window.history.back();
        });
    });
</script>
@endsection