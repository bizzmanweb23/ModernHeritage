@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('updateSize') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <span class="mb-2 ">Height
                        <input type="hidden" name="id" id="id" value="{{$data->id}}"  class="form-control"  />
                            <input type="number" name="height" id="height" value="{{$data->height}}" placeholder="Add Height" class="form-control" required />
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span class="mb-2 ">Width
                            <input type="number" name="width" id="width" value="{{$data->width}}" placeholder="Add Width" class="form-control" required />
                        </span>
                    </div>
              
                    <div class="col-md-6" style="padding-top:30px;">
                        <span class="mb-2 ">Unit
                            <select name="unit" id="unit" class="form-control">
                            <option value="">--Select--</option>
                               @foreach($units as $ut)
                               <option value="{{$ut->id}}" @if($ut->id == $data->unit) selected @endif >{{$ut->unit}}</option>
                               @endforeach
                            </select>
                        </span>
                    </div>
                    <div class="col-md-6" style="padding-top:30px;">
                        <span class="mb-2">Status
                            <select name="status" id="status" class="form-control">

                            <option value="1" @if($data->status==1) selected @endif>Active</option>
                                <option value="0" @if($data->status==0) selected @endif>Inactive</option>

                            </select>
                        </span>
                    </div>
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('sizes') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection