@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('savePurchase')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Supplier/Vendor Name</label>
                    <input type="text" class="form-control" id="supplier_name" name="supplier_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Purchase Invoice</label>
                    <input type="file" class="form-control" id="purchase_invoice" name="purchase_invoice" required>
                </div>
                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('allPurchase')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection