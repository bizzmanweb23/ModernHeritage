@extends('frontend.admin.inventory.index')

@section('inventory_content')
{{-- <style>
    .ui-font{
        z-index: 99999999 !important;
    }
</style> --}}
<h4 class="font-weight-bolder mb-2 mt-2">Units of Measure</h4>
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uomModal">Create</a>
<div class="container-fluid d-flex flex-row flex-wrap">
    <table class="table mb-2 mt-2">
        <thead>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Units of Measure</p>
            </th>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Category</p>
            </th>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Type</p>
            </th>
        </thead>
        <tbody>
            @foreach($alluom as $au )
                <tr>
                    <td>
                        <p class="mb-0">{{ $au->uom }}</p>
                    </td>
                    <td>
                        <p class="mb-0">{{ $au->uom_category_name }}</p>
                    </td>
                    <td>
                        <p class="mb-0">{{ $au->uom_type }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- UOM-Modal -->
<div class="modal" id="uomModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 150%">
            <form action="{{ route('saveuom') }}" method="POST">
                @csrf
                <!-- UOM-Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Unit Of Measure</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="uom">Unit Of Measure</label>
                            <input type="text" class="form-control" id="uom" name="uom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="active">Active</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="active" name="active">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">select</option>
                                @foreach($uom_category as $uc)
                                    <option value="{{ $uc->id }}">{{ $uc->uom_category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="rounding_precision">Rounding Precision</label>
                            <input type="text" class="form-control" id="rounding_precision" name="rounding_precision"
                               value="0.01000" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="gst_uqc">Indian GST UQC</label>
                            <input type="text" class="form-control" id="gst_uqc" name="gst_uqc" required>
                        </div>
                        <div class="col-md-6">
                            <label for="uom_type">Type</label>
                            <select name="uom_type" id="uom_type" class="form-control" onchange="onUomChange()"
                                required>
                                <option value="Bigger than the reference unit of measure">Bigger than the reference unit
                                    of measure</option>
                                <option value="Reference unit of measure for this category" selected>Reference unit of
                                    measure for this category</option>
                                <option value="Smaller than the reference unit of measure">Smaller than the reference
                                    unit of measure</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2" id="ratio_div">
                        <div class="col-md-6">
                            <label for="ratio">Ratio</label>
                            <input type="number" class="form-control" id="ratio" name="ratio">
                        </div>
                    </div>
                </div>

                <!-- UOM-Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#ratio_div').hide();
    });

    function onUomChange() {
        console.log('onUomChange - ' + $('#uom_type').val());
        var uom_type = $('#uom_type').val();
        if (uom_type != 'Reference unit of measure for this category') {
            $('#ratio_div').show();
            $('#ratio').val(1.00);

        } else {
            $('#ratio_div').hide();
        }
    }

</script>
@endsection
