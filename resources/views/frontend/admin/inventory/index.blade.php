@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Inventory</h6>
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('inventory') }}">Overview</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Product</a>
          <ul class="dropdown-menu" aria-labelledby="productDropdown">
            <a class="dropdown-item" href="{{ route('allproducts') }}">Products</a>
            <a class="dropdown-item" href="#">Product variants</a>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Configaration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Oprations</a>
        </li>
      </ul>
    </div>
</nav> 
@yield('inventory_content')  
@endsection

