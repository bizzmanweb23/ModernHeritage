@extends('frontend.admin.layouts.master')
@section('content')


<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('postClaim') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Claiming Amount (per month)</label>
                            <input type="text" class="form-control" id="claiming_amount" name="claiming_amount" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label>Upload Application</label>
                        <input type="file" class="form-control" id="app_file" name="app_file" required>

                    </div>
                    <div class="col-md-6">
                        <label>Comment</label>
 
                       <textarea class="form-control" name="comment" id="comment"></textarea>
                    </div>


                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('employeeClaims') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection