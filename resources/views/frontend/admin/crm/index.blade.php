@extends('frontend.admin.layouts.master')

@section('content')


<a href= "#" class="btn btn-primary">Create</a>

<div class="container-fluid pt-3">
    <div class="row flex-row flex-sm-nowrap py-3">
        @foreach($stage as $s)
        <div class="col-sm-6 col-md-4 col-xl-3">
            <div class="card bg-light">
                <div class="card-body">
                    <h6 class="card-title text-uppercase text-truncate py-2">{{$s->stage_name}}</h6>
                    <div class="items border border-light">
                        <div class="card draggable shadow-sm" id="cd1" draggable="true" ondragstart="drag(event)">
                            <div class="card-body p-2">
                                <div class="card-title">
                                    <img src="//via.placeholder.com/30" class="rounded-circle float-right">
                                    <a href="" class="lead font-weight-light">TSK-154</a>
                                </div>
                                <p>
                                    This is a description of a item on the board.
                                </p>
                                <button class="btn btn-primary btn-sm">View</button>
                            </div>
                        </div>
                        <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
