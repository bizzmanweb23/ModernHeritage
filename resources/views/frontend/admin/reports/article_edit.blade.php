@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('updateArticle')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Article</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Enter article" required>
                    <input type="text" class="form-control" id="article" name="article" value="{{$data->article}}" placeholder="Enter article" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Benefit</label>
                    <input type="text" class="form-control" id="benefit" name="benefit" value="{{$data->benefit}}" placeholder="Enter benefit" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Status</label>

                    <select name="status" id="status" class="form-control">

                        <option value="1" @if($data->status == 1)selected @endif> Active </option>
                        <option value="0" @if($data->status == 0)selected @endif> Inactive </option>
                    </select>
                </div>
                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{route('kb_articles')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection