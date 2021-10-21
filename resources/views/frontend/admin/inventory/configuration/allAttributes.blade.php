@extends('frontend.admin.inventory.index')

@section('inventory_content')
<h4 class="font-weight-bolder mb-2 mt-2">Attributes</h4>
<a href="{{ route('addattributes') }}" class="btn btn-primary">Create</a>
<div class="container-fluid d-flex flex-row flex-wrap">
    <table class="table mb-2 mt-2">
        <thead>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Attributes</p>
            </th>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Display Type</p>
            </th>
            <th class="text-uppercase" scope="col">
                <p class="mb-0 mt-0 ml-0 font-weight-bolder">Variants Creation Mode</p>
            </th>
        </thead>
        <tbody>
            @foreach($attributes as $a )
                <tr>
                    <td>
                        <p class="mb-0">{{ $a->attributes_name }}</p>
                    </td>
                    <td>
                        <p class="mb-0">{{ $a->display_type }}</p>
                    </td>
                    <td>
                        <p class="mb-0">{{ $a->variants_creation_mode }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
