@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <form action="#" method="POST">
            @csrf

            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Name" required>
            </div>

            <div class="form-group">
                <label for="opportunity">Opportunity</label>
                <input type="text" class="form-control" id="opportunity" name="opportunity" placeholder="opportunity" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="">
            </div>

            <div class="form-group">
                <label for="mobile_no">Mobile No</label>
                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="">
            </div>

            <div class="form-group">
                <label for="expected_price">Expected Price</label>
                <input type="text" class="form-control" id="expected_price" name="expected_price" placeholder="">
            </div>

            {{-- <div class="form-group">
                <label for="rating">Ratings</label>
                <input type="text" class="form-control" id="rating" name="rating" placeholder="rating" required>
            </div> --}}


            <br> <br>

            <button type="submit" class="btn btn-primary">Save</button>

            <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>

        </form>
    </div>
</div>
@endsection