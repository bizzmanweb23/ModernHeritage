@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('saveArticle')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Article</label>
                    <input type="text" class="form-control" id="article" name="article" placeholder="Enter article" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Benefit</label>
                    <input type="text" class="form-control" id="benefit" name="benefit" placeholder="Enter benefit" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Status</label>

                      <select name="status" id="status" class="form-control">
             
                                <option value="1"> Active </option>
                                <option value="0"> Inactive </option>
                            </select>
                </div>
                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('kb_articles')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection