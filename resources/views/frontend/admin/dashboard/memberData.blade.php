@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <form action="{{url('/')}}/edit/{{$user->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="unique_id">Unique Id</label>
                <input type="text" class="form-control" id="unique_id" name="unique_id" value="{{$user->unique_id}}" readonly>
            </div>

            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{$user->firstname}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="lastname">lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{$user->state}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="pincode">Zipcode</label>
                <input type="text" class="form-control" id="pincode" name="pincode" value="{{$user->pincode}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}" {{($route=='edit')?'':'readonly'}}>
            </div>


            <div class="form-group">
                <label for="device_id">Device ID</label>
                <input type="text" class="form-control" id="device_id" name="device_id" value="{{$user->device_id}}" {{($route=='edit')?'':'readonly'}}>
            </div>

            <div class="form-group">
                <label for="device_name">Device name</label>
                <input type="text" class="form-control" id="device_name" name="device_name"
                    value="{{$user->device_name}}" {{($route=='edit')?'':'readonly'}}>
            </div>

        
            <br> <br>
            @if($route == 'edit')

            <button type="submit" class="btn btn-primary">Save</button>

            @endif

            <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
            
        </form>
    </div>
</div>
@endsection