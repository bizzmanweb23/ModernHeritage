@extends('frontend.admin.driver.index')

@section('page')
<h6 class="font-weight-bolder mb-0">Present Deliveries</h6>
@endsection

@section('driver_content')
<div class="card mb-4">
    <div class="card-header pb-0">
        <h6>{{ $delivery_time == 'today' ? 'Upcoming Deliveries' : 'Delivery History' }}</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Driver</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Pickup Details</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Delivery Details</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Expected Date
                          </th>
                        {{-- <th class="text-secondary opacity-7"></th> --}}
                    </tr>
                </thead>
                <tbody>
                  @foreach ($deliveries as $dv)
                    <tr>
                      <td>
                          <div class="d-flex px-2 py-1">
                              <div>
                                @if(isset($dv->emp_image))
                                    <img src="{{ asset($dv->emp_image) }}" alt="Product"
                                        class="avatar avatar-sm me-3">
                                @else
                                    <img src="{{ asset('images/products/default.jpg') }}"
                                        alt="Product" class="avatar avatar-sm me-3">
                                @endif
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $dv->emp_name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $dv->work_email }}</p>
                              </div>
                          </div>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $dv->pickup_client }}</p>
                          <p class="text-xs text-secondary mb-0">{{ $dv->pickup_add_1 }} {{ $dv->pickup_add_2 }} {{ $dv->pickup_add_3 }}</p>
                          <p class="text-xs text-secondary mb-0">{{ $dv->pickup_state }} {{ $dv->pickup_pin }} {{ $dv->pickup_country }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $dv->delivery_client }}</p>
                        <p class="text-xs text-secondary mb-0">{{ $dv->delivery_add_1 }} {{ $dv->delivery_add_2 }} {{ $dv->delivery_add_3 }}</p>
                        <p class="text-xs text-secondary mb-0">{{ $dv->delivery_state }} {{ $dv->delivery_pin }} {{ $dv->delivery_country }}</p>
                    </td>
                      <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{ $dv->expected_date }}</span>
                      </td>
                      {{-- <td class="align-middle">
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Edit user">
                              Edit
                          </a>
                      </td> --}}
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
