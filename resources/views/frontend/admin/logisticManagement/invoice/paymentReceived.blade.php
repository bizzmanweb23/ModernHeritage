@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">Payment Recived</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card container container-fluid">
            <form action="" method="post">
                @csrf
                <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                    href="{{ url()->previous() }}"><i
                        class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                </div>
                <div class="row mt-2">
                    <div class="col-md-5">
                        <label class="mb-2">Payment Amount: </label>
                        <select name="paymentAmount" id="paymentAmount" required class="form-control">
                            <option value="">Select Amount</option>
                            @foreach ($breakups_price as $bp)
                                <option value="{{ $bp->id }}">{{ $bp->breakup_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="mb-2">Payment Type: </label>
                        <select name="payment_type" id="payment_type" class="form-control">
                            <option value="">Select Payment Type</option>
                            <option value="DD">DD</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Online">Online</option>
                            <option value="Cash">Cash</option>
                        </select>  
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                    <span id="dd">
                        <label for="dd_no">DD No: </label>
                        <input type="text" name="dd_no" id="dd_no" class="form-control" required>
                    </span>
                    </div>
                    <div class="col-md-4">
                        <span id="dd">
                            <label for="dd_date">DD Date: </label>
                            <input type="date" name="dd_date" id="dd_date" class="form-control" required>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span id="dd">
                            <label for="dd_amount">DD Amount: </label>
                            <input type="number" name="dd_amount" id="dd_amount" class="form-control" required>
                        </span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-5">
                        <span id="checque">
                            <label for="checq_no">Checque No: </label>
                            <input type="number" name="checq_no" id="checq_no" class="form-control" required>
                        </span>
                    </div>
                    <div class="col-md-5">
                        <span id="checque">
                            <label for="checq_date">Checque Date: </label>
                            <input type="date" name="checq_date" id="checq_date" class="form-control" required>
                        </span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-5" id="checque">
                        <span>
                            <label for="checq_amount">Amount: </label>
                            <input type="number" name="checq_amount" id="checq_amount" class="form-control" required>
                        </span>
                    </div>
                    <div class="col-md-5" id="checque">
                        <span>
                            <label for="bank_name">Bank Name: </label>
                            <input type="text" name="bank_name" id="bank_name" class="form-control" required>
                        </span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <span id="online">
                            <label for="date">Date: </label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span id="online">
                            <label for="date">Transection No: </label>
                            <input type="text" name="transection_no" id="transection_no" class="form-control" required>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span id="online">
                            <label for="online_amount">Amount: </label>
                            <input type="number" name="online_amount" id="online_amount" class="form-control" required>
                        </span>
                    </div>
                </div> 
                <div class="row mt-2">
                    <div class="col-md-5">
                        <span id="cash">
                            <label for="cash_amount">Amount: </label>
                            <input type="number" name="cash_amount" id="cash_amount" class="form-control" required>
                        </span> 
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<script>
    
</script>
@endsection
