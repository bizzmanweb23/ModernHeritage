@extends('frontend.admin.layouts.master')
@section('page')
  <h6 class="font-weight-bolder mb-0">Add Client</h6>
@endsection
@section('content')
{{-- <main class="main-content  mt-0"> --}}
    {{-- <section> --}}
      {{-- <div class="page-header min-vh-75"> --}}
        {{-- <div class="container content-body"> --}}
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-4">
                <div class="content-body">
                  <form method="POST" action="{{url('/')}}/register/client">
                    @csrf
                    <label>First Name</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="firstname" id ="firstname" required placeholder="First Name" aria-label="First Name" aria-describedby="first-name-addon">
                    </div>
                    <label>Last Name</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="lastname" id ="lastname" required placeholder="Last Name" aria-label="Last Name" aria-describedby="last-name-addon">
                    </div>
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" id ="email" required placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" id ="password" required placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <label>Phone No</label>
                    <div class="mb-3 d-flex">
                        <select name="country_code" class="form-control" style="width: 30em" id="country_code">
                          <option value="">{{__('select')}}</option>
                          @foreach($countryCodes as $c)
                          <option value="+{{$c->code}}">+{{$c->code}}({{$c->name}})</option>
                          @endforeach
                        </select>
                        <input type="text" class="form-control" style="width: 70em" name="phone" id ="phone" required placeholder="Phone No" aria-label="Phone No" aria-describedby="phone-no-addon">
                    </div>
                    @if(Auth::check() && $path=='any')
                      <label for="role">Role</label>
                      <div class="mb-3">
                          <select name="role" class="form-control" id="role">
                              <option value="">{{__('select')}}</option>
                              @foreach($roles as $r)
                              <option value="{{$r->name}}">{{$r->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      @error('role')
                      <span style="color: red">{{ $message }}</span>
                      <br>
                      @enderror
                    @endif
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        {{-- </div>
      </div> --}}
    {{-- </section> --}}
  {{-- </main> --}}
@endsection