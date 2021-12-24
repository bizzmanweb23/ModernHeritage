@extends('frontend.admin.layouts.master')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="">Overview</a>
        </li>      
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="configuration" role="button" data-bs-toggle="dropdown" aria-expanded="false">Delivery</a>
          <ul class="dropdown-menu" aria-labelledby="configuration">
            <a class="dropdown-item" href="{{ route('presentDelivery') }}">Present Delivery</a>
            <a class="dropdown-item" href="#">Previous Delivery</a>
          </ul>
        </li>       
      </ul>
    </div>
</nav> 
<div class="mt-3">
  @yield('driver_content')  
</div>
@endsection