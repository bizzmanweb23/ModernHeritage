@extends('frontend.admin.layouts.master')

@section('content')
<h5> Assign Drivers To collect Products</h5>
<div class="content-wrapper card">
    <div class="content-body card-body">
  
        @if(!$collection)
        <form action="{{route('saveCollection')}}" method="POST">
            @csrf
            <div class="row">
              <input type="hidden" value="{{$order_id}}" name="order_id" id="order_id">
                <div class="form-group col-md-6">
                    <label>Driver</label>

                    <select name="driver_id" id="driver_id" class="form-control" required>
                    <option value="">--Select-- </option>
                        @foreach($drivers as $row)
                        <option value="{{$row->unique_id}}"> {{$row->emp_name}} </option>
                        @endforeach
                    </select>
                </div>
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

                    <a href="{{route('orderList')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
        @else
        <form action="{{route('saveCollection')}}" method="POST">
            @csrf
            <div class="row">
              <input type="hidden" value="{{$order_id}}" name="order_id" id="order_id">
                <div class="form-group col-md-6">
                    <label>Driver</label>

                    <select name="driver_id" id="driver_id" class="form-control" required>
                    <option value="">--Select-- </option>
                        @foreach($drivers as $row)
                        <option value="{{$row->unique_id}}" @if($collection->driver_id == $row->unique_id) selected @endif > {{$row->emp_name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Warehouses</label>

                    <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                    <option value="">--Select-- </option>
                        @foreach($warehouse as $row)
                        <option value="{{$row->id}}" @if($collection->warehouse_id == $row->id) selected @endif > {{$row->name}} </option>
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group col-md-6">
                    <label>Remarks</label>
                    <textarea id="remarks" name="remarks" class="form-control">{{$collection->remarks}}</textarea>
                    </div>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{route('orderList')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection