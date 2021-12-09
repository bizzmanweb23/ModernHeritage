@extends('frontend.admin.layouts.master')

@section('page')
  {{-- <h6 class="font-weight-bolder mb-0">Employee</h6> --}}
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('allEmployee') }}">Employees</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Department</a>
        </li>       
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="comfigureDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Configuration</a>
          <ul class="dropdown-menu" aria-labelledby="comfigureDropdown">
            <a class="dropdown-item" href="#}">Job Position</a>
            <a class="dropdown-item" href="#">Department</a>
            <a class="dropdown-item" href="#">Settings</a>
          </ul>
        </li>
      </ul>
    </div>
</nav> 
<div class="mt-3">
  @yield('employee_content')  
</div>
@endsection

