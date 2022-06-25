@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('updateHoliday') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Holiday</label>
                        <input type="text" name="holiday" id="holiday" value="{{$holiday->holiday}}" class="form-control" required />
                        <input type="hidden" name="id" id="id" value="{{$holiday->id}}" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Period</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{$holiday->start_date}}" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="start_date" name="end_date" value="{{$holiday->end_date}}" required>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control" required>

                            <option value="1" @if($holiday->status == 1) selected @endif>Active</option>
                            <option value="0" @if($holiday->status == 0) selected @endif >Inactive</option>

                        </select>

                    </div>
                </div><br>
                <div class="ms-auto text-end">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('holidayList') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection