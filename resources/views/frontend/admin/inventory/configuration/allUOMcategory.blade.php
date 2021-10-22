@extends('frontend.admin.inventory.index')

@section('inventory_content')
<h4 class="font-weight-bolder mb-2 mt-2">Units of Measure Categories</h4>
<form action="{{ route('UOMcategory') }}" method="post">
    @csrf
    <a class="btn btn-primary" id="create" href="#">Create</a>
    <button class="btn btn-primary" id="save" type="submit">Save</button>
    <a class="btn btn-primary" id="discard" href="#">Discard</a>
    <table class="table mb-2 mt-2">
        <thead>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Units of Measure Category</p>
            </th>
        </thead>
        <tbody>
            @foreach($uom_category as $uc )
                <tr>
                    <td>
                        <p class="mb-0">{{ $uc->uom_category_name }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function () {
        $('#save').hide();
        $('#discard').hide();
    });
    $('#create').click(function () {
        $('#save').show();
        $('#discard').show();
        $('#create').hide();
        $('tbody').append(`
                <tr>
                    <td>
                        <input class="form-control" type="text" name="uom_category_name" id="uom_catagory_name" required>
                    </td>
                </tr>
            `);
    });
    $('#discard').click(function () {
        location.reload();
    });

</script>
@endsection
