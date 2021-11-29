@extends('frontend.admin.layouts.master')

@section('content')
<form action="{{ route('customer') }}" method="GET">
    @csrf
    <div class="form-group">
        <label for="unique_id">Unique Id</label>
        <input type="text" class="form-control" id="unique_id" placeholder="Enter unique id" name="unique_id">
    </div>

    <div class="form-group">
        <label for="customer_name">Name</label>
        <input type="text" class="form-control" id="customer_name" placeholder="Enter customer name" name="customer_name">
    </div>

    <button type="submit" class="btn btn-primary">Search</button>
</form>
<br>
<br>
<div>
    <a href="{{ route('addcustomer') }}" class="btn btn-primary">Add customer</a>
</div>
<br>
<div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Unique Id</th>
                <th scope="col">customername</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile No</th>
                <th scope="col">Operate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allCustomer as $c)
                <tr>
                    <td>{{ $c->unique_id }}</td>
                    <td>{{ $c->customer_name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->mobile }}</td>

                    <td><a href="{{ url('/') }}/admin/customerdetails/{{ $c->id }}">Details</a>
                        <a href="{{ url('/') }}/admin/customeredit/{{ $c->id }}">Edit</a>
                        @if($c->status==1)
                            <a href="{{ url('/') }}/admin/customerstatus/{{ $c->id }}/0">active</a>
                        @else
                            <a
                                href="{{ url('/') }}/admin/customerstatus/{{ $c->id }}/1">inactive</a>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
