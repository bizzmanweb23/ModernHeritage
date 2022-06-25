@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Holiday List</h5>
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addHoliday') }}" class="btn btn-primary">Add holiday List</a>
    </div>


</div>
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="card" style="padding:15px;">

<form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-5">
                    <select name="year" class="form-control" id="year">
                        <option value="all">Search By Year</option>
                        <option value="2022" @if(isset($_GET['year']) && $_GET['year']==2022 )selected @endif>2022</option>
                        <option value="2023" @if(isset($_GET['year']) && $_GET['year']==2023 )selected @endif>2023</option>
                        <option value="2024" @if(isset($_GET['year']) && $_GET['year']==2024 )selected @endif>2024</option>
                        <option value="2025" @if(isset($_GET['year']) && $_GET['year']==2025 )selected @endif>2025</option>
                        <option value="2026" @if(isset($_GET['year']) && $_GET['year']==2026 )selected @endif>2026</option>
                        <option value="2027" @if(isset($_GET['year']) && $_GET['year']==2027 )selected @endif>2027</option>
                    </select>
                </div>


            </div>
        </div>
    </form>



    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Holiday</th>
                <th>Period</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $key=>$hd)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$hd->holiday}}</td>
                <td><?php echo date("d/m/Y", strtotime($hd->start_date)) ?> - <?php echo date("d/m/Y", strtotime($hd->end_date)) ?></td>
                @if($hd->status == 1)
                <td><span class="badge badge-success">Active</span></td>
                @else
                <td><span class="badge badge-danger">Inactive</span></td>
                @endif
               
                <td>
                    <a href="editHoliday/{{$hd->id}}" title="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>

                    <a href="javascript:void(0)" onclick="return delete_holiday(this.id)" id="{{$hd->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

</div>



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });
    function delete_holiday(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
            url: "{{route('deleteHoliday')}}",
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
           if(data == 1){

            location.reload();
           }

            }
        });
        } else {

            console.log('Thing was not saved to the database.');
        }
    }
    $('#year').change(function(e) {
        e.preventDefault();
        var year = $('#year').val();

        $.ajax({
            url: "{{route('holidayList')}}",
            type: 'GET',
            data: {
                year: year
            },
            success: function(data) {
                location.replace('?year=' + year);

            }
        });


    });
</script>
@endsection