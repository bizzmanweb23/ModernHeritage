@extends('frontend.admin.inventory.index')

@section('inventory_content')
<h4 class="font-weight-bolder mb-2 mt-2">Services</h4>
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#serviceModal">Create</a>
<div class="container-fluid d-flex flex-row flex-wrap">
    <table class="table mb-2 mt-2">
        <thead>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Sl.No</p>
            </th>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Services</p>
            </th>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Service Description</p>
            </th>
        </thead>
        <tbody>
            @foreach($services as $s )
                <tr>
                    <td>
                        <p class="mb-0">{{ $s->id }}</p>
                    </td>
                    <td>
                        <p class="mb-0">{{ $s->service_name }}</p>
                    </td>
                    <td>
                        <p class="mb-0">{{ $s->service_desc }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Service-Modal -->
<div class="modal" id="serviceModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 100%">
            <form action="{{ route('saveServices') }}" method="POST">
                @csrf
                <!-- Service-Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Service</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="service_name">Service Name:</label>
                            <input type="text" class="form-control" id="service_name" name="service_name" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="service_desc">Service Description:</label>
                            <input type="text" class="form-control" id="service_desc" name="service_desc">
                        </div>
                    </div>
                </div>

                <!-- Service-Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection