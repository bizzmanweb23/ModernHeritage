@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Quotation</h6>
@endsection

@section('content')
<table class="table mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-primary font-weight-bolder" scope="col">Quotation Id</th>
            <th class="text-uppercase text-primary font-weight-bolder" scope="col">Sales Id</th>
            <th class="text-uppercase text-primary font-weight-bolder" scope="col">Customer name</th>
            <th class="text-uppercase text-primary font-weight-bolder" scope="col">Creation Date</th>
            <th class="text-uppercase text-primary font-weight-bolder" scope="col">Expiry Date</th>
            <th class="text-uppercase text-primary font-weight-bolder" scope="col">Operate</th>

        </tr>
    </thead>
    <tbody>
        @foreach($quotation as $q)
        <tr>
            <td><p class="text-s font-weight-bold mb-0">{{$q->quotation_unique_id}}</p></td>
            <td><p class="text-s font-weight-bold mb-0">{{$q->sales_id}}</p></td>
            <td><p class="text-s font-weight-bold mb-0">{{$q->client_name}}</p></td>
            <td><p class="text-s font-weight-bold mb-0">{{$q->created_at}}</p></td>
            <td><p class="text-s font-weight-bold mb-0">{{$q->expiration}}</p></td>
            <td><p class="text-s font-weight-bold mb-0">
                <a href="{{ url('/') }}/admin/confirmquotation/{{$q->id}}">Details</a>
                {{-- <a href="{{ url('/') }}/admin/edit/{{$u->id}}">Edit</a>
                @if($u->status==1)
                    <a href="{{ url('/') }}/admin/userstatus/{{$u->id}}/0">active</a>
                @else
                    <a href="{{ url('/') }}/admin/userstatus/{{$u->id}}/1">inactive</a>
                @endif --}} 
                </p>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection