@extends('frontend.admin.employee.index')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>






<div class="container card" style="padding:15px;">
    <form method="post" action="{{ route('searchVisitor') }}">
        @csrf
        <div class="col-md-12">
            <div class="form-group">

                <div class="row">

                    <div class="col-md-3">
                        From: <input type="date" name="start_date" id="start_date" class="form-control" required />

                    </div>
                    <div class="col-md-3">
                        To:<input type="date" name="end_date" id="end_date" class="form-control" required />
                    </div>
                    <div class="col-md-3">

                        <br>
                        <button type="submit" class="btn btn-primary">Search</button>


                    </div>

                </div>
            </div>

        </div>
    </form>


    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $key=>$ex)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{date("d/m/Y", strtotime($ex->created_at))}}</td>

                <td>{{$ex->name}}</td>

                <td>{{$ex->email}}</td>

                <td>{{$ex->phone}}</td>

                <td>
                    <a href="leadView/{{$ex->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                </td>

            </tr>

            @endforeach
        </tbody>

    </table><br>

</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });
</script>
@endsection