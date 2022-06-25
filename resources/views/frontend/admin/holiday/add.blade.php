@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('saveHoliday') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Holiday</label>
                        <input type="text" name="holiday" id="holiday" value="" class="form-control" required />

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Period</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="start_date" name="end_date" required>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control" required>

                            <option value="1">Active</option>
                            <option value="0">Inactive</option>

                        </select>

                    </div>
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('holidayList') }}">Back</a>
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
            toastr.success("{{ $error }}");
        @endforeach
    @endif
    </script>
@endsection