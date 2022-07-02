@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('saveExpenses')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Details</label>
                    <input type="text" class="form-control" id="details" name="details" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Payment</label>
                    <select name="payment_mode" id="payment_mode" class="form-control">
                        <option value="">--Select-- </option>
                        <option value="1"> CASH </option>
                        <option value="2"> ONLINE </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Expense Amount</label>
                    <input type="text" class="form-control" id="expense_amount" name="expense_amount" required>
                </div>
                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('allExpenses')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection