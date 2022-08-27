@extends('frontend.admin.layouts.master')

@section('content')
<h4>Edit Vehicle Models</h4>
<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('updateModels')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Model</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$model->id}}">
                    <input type="text" class="form-control" id="model_name" name="model_name" value="{{$model->model_name}}"placeholder="Enter a model name" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Brand</label>
                  
                    <select name="brand_id" id="brand_id" class="form-control" required>
                    <option value="">--Select--</option>
                    @foreach ($brand as $b)
                    <option value="{{ $b->id }}" @if($model->brand_id == $b->id) selected @endif  >{{ $b->brand_name }}</option>
                    @endforeach
                </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Vehicle type</label>

                    <select name="vehicle_type" id="vehicle_type" class="form-control" required>

                        <option value="Crane" @if($model->vehicle_type == 'Crane')selected @endif>Crane </option>
                        <option value="Lorry" @if($model->vehicle_type == 'Lorry')selected @endif >Lorry </option>
                        <option value="Car" @if($model->vehicle_type == 'Car')selected @endif >Car </option>
                        <option value="Bike" @if($model->vehicle_type == 'Bike')selected @endif>Bike </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>

                    <select name="status" id="status" class="form-control">

                        <option value="1" @if($model->status == 1)selected @endif> Active </option>
                        <option value="0" @if($model->status == 0)selected @endif> Inactive </option>
                    </select>
                </div>

                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{route('allModels')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection