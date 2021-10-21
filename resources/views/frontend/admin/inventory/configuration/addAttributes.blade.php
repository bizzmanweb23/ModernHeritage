@extends('frontend.admin.inventory.index')

@section('inventory_content')
<h4 class="font-weight-bolder mb-2 mt-2">New Attributes</h4>
<form action="{{ route('addattributes') }}" method="post">
    @csrf
    <div class="row mb-2">
        <div class="col-md-8">
            <span class="mb-2 ">Attributes Name:
                <input type="text" name="attributes_name" id="attributes_name" value="" placeholder="Add Attribute Name"
                    class="form-control" required />
            </span>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-2"><span class="mb-2 ">Display Type:</span></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-1 align-content-right"> <input type="radio" name="display_type" id="radio" value="radio"
                        class="form-check" required /></div>
                <div class="col"><span class="text-dark ">Radio</span></div>
            </div>
            <div class="row">
                <div class="col-md-1 align-content-right"> <input type="radio" name="display_type" id="select" value="select"
                        class="form-check" required /></div>
                <div class="col"><span class="text-dark ">Select</span></div>
            </div>
            <div class="row">
                <div class="col-md-1 align-content-right"> <input type="radio" name="display_type" id="color" value="color"
                        class="form-check" required /></div>
                <div class="col"><span class="text-dark ">Color</span></div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-2"><span class="mb-2 ">Variants creation mode:</span></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-1 align-content-right"> <input type="radio" name="variants_creation_mode"
                        id="instantly" value="instantly" class="form-check" required /></div>
                <div class="col"><span class="text-dark ">Instantly</span></div>
            </div>
            <div class="row">
                <div class="col-md-1 align-content-right"> <input type="radio" name="variants_creation_mode"
                        id="dynamically" value="dynamically" class="form-check" required /></div>
                <div class="col"><span class="text-dark ">Dynamically</span></div>
            </div>
            <div class="row">
                <div class="col-md-1 align-content-right"> <input type="radio" name="variants_creation_mode" id="never" value="never"
                        class="form-check" required /></div>
                <div class="col"><span class="text-dark ">Never</span></div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
@endsection
