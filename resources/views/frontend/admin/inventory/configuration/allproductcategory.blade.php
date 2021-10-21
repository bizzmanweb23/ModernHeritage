@extends('frontend.admin.inventory.index')

@section('inventory_content')
<h4 class="font-weight-bolder mb-2 mt-2">Product Categories</h4>
<a href="{{ route('addproductcategory') }}" class="btn btn-primary">Create</a>
<div class="container-fluid d-flex flex-row flex-wrap">
    <table>
        <thead>
            <th>
                <span class="mb-2 text-dark font-weight-bold">Product Category</span>
            </th>
        </thead>
        <tbody>
            @foreach($product_category as $pc )
                <tr>
                    <td>
                        <p class="mb-0">{{ $pc->category_name }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
