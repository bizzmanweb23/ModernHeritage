@extends('frontend.admin.layouts.master')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('allVehicles') }}">Vehicles</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="maintenance" role="button" aria-expanded="false">Maintenance</a>
        </li>       
      </ul>
    </div>
</nav> 
<div class="mt-3">
  @yield('fleet_content')  
</div>
@endsection