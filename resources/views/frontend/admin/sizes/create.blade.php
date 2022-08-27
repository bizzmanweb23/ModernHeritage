@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('saveSize') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <span class="mb-2 ">Height
                            <input type="number" name="height" id="height" value="" placeholder="Add Height" class="form-control" required />
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span class="mb-2 ">Width
                            <input type="number" name="width" id="width" value="" placeholder="Add Width" class="form-control" required />
                        </span>
                    </div>
              
                    <div class="col-md-6" style="padding-top:30px;">
                        <span class="mb-2 ">Unit
                            <select name="unit" id="unit" class="form-control" required>
                               <option value="">--Select--</option>
                               @foreach($units as $ut)
                               <option value="{{$ut->id}}"  >{{$ut->unit}}</option>
                               @endforeach
                            </select>
                        </span>
                    </div>
                    <div class="col-md-6" style="padding-top:30px;">
                        <span class="mb-2">Status
                            <select name="status" id="status" class="form-control" required>

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </span>
                    </div>
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('sizes') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection