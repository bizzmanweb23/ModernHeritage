@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Payment Received</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card container container-fluid pb-3">
            <form action="{{ route('savePaymentReceived', ['lead_id' => $lead_id]) }}" method="post">
                @csrf
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-link text-dark px-3 mb-0" id="save"><i
                        class="fas fa-save text-dark me-2" aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                    href="{{ url()->previous() }}"><i
                        class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-md-5">
                        <label class="mb-2">Payment Amount: </label>
                        <select name="paymentAmount[]" id="paymentAmount" onchange="onPaymentAmountChange({{ $breakups_price }})" required class="form-control" multiple="multiple">
                            @foreach ($breakups_price as $bp)
                                <option value="{{ $bp->id }}">{{ $bp->breakup_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="mb-2">Payment Type: </label>
                        <select name="payment_type" id="payment_type" class="form-control" onchange="onPaymentTypeChange()">
                            <option value="">Select Payment Type</option>
                            <option value="dd">DD</option>
                            <option value="checque">Cheque</option>
                            <option value="online">Online</option>
                            <option value="cash">Cash</option>
                        </select>  
                    </div>
                </div>
                <div class="row mt-2 mb-2 dd">
                    <div class="col-md-4">
                        <label for="dd_no">DD No: </label>
                        <input type="text" name="dd_no" id="dd_no" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="dd_date">DD Date: </label>
                        <input type="date" name="dd_date" id="dd_date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="dd_amount">DD Amount: </label>
                        <input type="number" name="dd_amount" id="dd_amount" class="form-control amountInput" readonly>
                    </div>
                </div>
                <div class="row mt-2 mb-2 checque">
                    <div class="col-md-5">
                        <label for="checq_no">Checque No: </label>
                        <input type="number" name="checq_no" id="checq_no" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label for="checq_date">Checque Date: </label>
                        <input type="date" name="checq_date" id="checq_date" class="form-control">
                    </div>
                </div>
                <div class="row mt-2 mb-2 checque">
                    <div class="col-md-5">
                        <label for="checq_amount">Amount: </label>
                        <input type="number" name="checq_amount" id="checq_amount" class="form-control amountInput" readonly>
                    </div>
                    <div class="col-md-5">
                        <label for="bank_name">Bank Name: </label>
                        <input type="text" name="bank_name" id="bank_name" class="form-control">
                    </div>
                </div>
                <div class="row mt-2 mb-2 online">
                    <div class="col-md-4">
                        <label for="online_date">Date: </label>
                        <input type="date" name="online_date" id="online_date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="transaction_no">Transaction No: </label>
                        <input type="text" name="transaction_no" id="transaction_no" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="online_amount">Amount: </label>
                        <input type="number" name="online_amount" id="online_amount" class="form-control amountInput" readonly>
                    </div>
                </div> 
                <div class="row mt-2 mb-2 cash">
                    <div class="col-md-5">
                        <label for="cash_amount">Amount: </label>
                        <input type="number" name="cash_amount" id="cash_amount" class="form-control amountInput" readonly>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    $(`#paymentAmount`).select2({
            width: '25em',
            placeholder: "Select Amount",
            allowClear: true
    });
    $(document).ready(function (){
        $('.dd').hide();
        $('.checque').hide();
        $('.online').hide();
        $('.cash').hide();
    });

    function onPaymentTypeChange()
    {
        var payment_type = $('#payment_type').val();
        if(payment_type == ""){
            $('.dd').hide();
            $('.checque').hide();
            $('.online').hide();
            $('.cash').hide();
        } else if (payment_type == "dd") {
            $('.dd').show();
            $('.checque').hide();
            $('.online').hide();
            $('.cash').hide();
        } else if (payment_type == "checque") {
            $('.dd').hide();
            $('.checque').show();
            $('.online').hide();
            $('.cash').hide();
        } else if (payment_type == "online") {
            $('.dd').hide();
            $('.checque').hide();
            $('.online').show();
            $('.cash').hide();
        } else {
            $('.dd').hide();
            $('.checque').hide();
            $('.online').hide();
            $('.cash').show();
        }
    }

    function onPaymentAmountChange(breakups_price)
    {
        var total_amount = 0;
        console.log('onPaymentAmountChange');
        var selected_amount = $('#paymentAmount').val();
        for (let i = 0; i < selected_amount.length; i++) {
            console.log(selected_amount[i]);
            breakups_price.forEach(bp => {
                if(selected_amount[i] == bp.id){
                    total_amount += parseInt(bp.breakup_amount);
                }
            });
        }
        console.log('total_amount : ',total_amount);
        $('.amountInput').val(total_amount);
    }
</script>
@endsection
