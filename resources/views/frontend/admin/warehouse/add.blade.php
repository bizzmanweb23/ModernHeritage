@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">
                <h5>Add Warehouse</h5>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile no</label>
                            <input type="number" class="form-control" id="mobile_no" name="mobile_no">
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone no</label>
                            <input type="number" class="form-control" id="phone" name="phone">
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="war_house_img" id="war_house_img" >
                        </div>
                    </div>
                   

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control" required>

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>
                    </div>

                    <h6>Address Details</h6>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" id="adddress_1" name="adddress_1" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control" id="adddress_2" name="adddress_2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 3</label>
                            <input type="text" class="form-control" id="adddress_3" name="adddress_3">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" id="country_id" name="country_id">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zipcode</label>
                            <input type="number" class="form-control" id="zipcode" name="zipcode">
                        </div>
                    </div>
                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('wareHouses') }}">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<script>
     @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ $error }}");
        @endforeach
    @endif
   
</script>

@endsection