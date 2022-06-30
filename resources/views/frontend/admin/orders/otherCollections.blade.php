@extends('frontend.admin.layouts.master')

@section('content')
<h5> Assign Drivers To collect Products from other warehouses</h5>
<div class="content-wrapper card">
    <div class="content-body card-body">


        <form action="{{route('otherCollection')}}" method="POST">
            @csrf
            <div class="row">

                <input type="hidden" name="order_id" value="{{$col->order_id}}"/>

                <input type="hidden" name="driver_id" value="{{$col->driver_id}}"/>
                <div class="form-group col-md-6">
                    <label>Warehouses</label>

                    <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                        <option value="">--Select-- </option>
                        @foreach($warehouse as $row)
                        <option value="{{$row->id}}"> {{$row->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Remarks</label>
                    <textarea id="remarks" name="remarks" class="form-control"></textarea>
                </div>

                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('collection_form')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection