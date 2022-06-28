@extends('frontend.admin.layouts.master')
@section('content')


<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('updateClaim') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Claiming Amount (per month)</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$claim->id}}">
                            <input type="number" class="form-control" id="claiming_amount" name="claiming_amount" value="{{$claim->claiming_amount}}"required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label>Upload Application</label>
                        <input type="file" class="form-control" id="app_file" name="app_file">
                        <input type="hidden" class="form-control" id="app_file_old" name="app_file_old" value="{{$claim->app_file}}">

                    </div>
                    <div class="col-md-6">
                        <label>Comment</label>
 
                       <textarea class="form-control" name="comment" id="comment">{{$claim->comment}}</textarea>
                       
                     
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