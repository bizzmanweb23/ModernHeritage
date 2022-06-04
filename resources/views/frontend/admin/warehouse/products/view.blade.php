@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updateWarePro') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" required>
                            <select name="pro_id" class="form-control" id="pro_id" required>
                                <option value="">--Select--</option>
                                @foreach($products as $p)
                                <option value="{{ $p->id }}" @if($data->pro_id == $p->id) selected @endif>{{ $p->product_name }} </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{$data->selling_price}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Min Stock</label>
                            <div class="row">

                                <?php
                                $m_sto = $data->min_stock;
                                $mst = intval($m_sto);

                                $result = preg_replace("/[^a-zA-Z]+/", "",  $data->min_stock);

                                ?>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" id="min_stock" name="min_stock" value="{{$mst}}" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="unit_1" class="form-control" id="unit_1" required>
                                        <option value="">--Select--</option>
                                        @foreach($unit as $u)
                                        <option value="{{ $u->unit }}" @if($u->unit == $result) selected @endif>{{ $u->unit }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Max Stock</label>
                            <div class="row">
                                

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Available Stock</label>
                            <div class="row">
                                

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{$data->sku}}" required>
                        </div>
                    </div>

                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('warehouseProducts') }}">Back</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</form>


@endsection