@extends('frontend.admin.layouts.master')

@section('content')
<h5> Assign Drivers To collect Products</h5>
<div class="content-wrapper card">
    <div class="content-body card-body">
        <form action="{{route('saveRole')}}" method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Driver</label>

                    <select name="driver_id" id="driver_id" class="form-control">
                        @foreach($drivers as $row)
                        <option value="{{$row->id}}"> {{$row->emp_name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Warehouses</label>

                    <select name="driver_id" id="driver_id" class="form-control">
                        @foreach($warehouse as $row)
                        <option value="{{$row->id}}"> {{$row->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('orderList')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection