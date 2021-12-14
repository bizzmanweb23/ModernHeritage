<form method="POST" action="{{ route('savecustomer') }}">
    @csrf
    <!-- Modal body -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="customer_type" id="customertype1"
                        value="individual" checked>
                    <label class="form-check-label" for="customer_type">
                        Individual
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="customer_type" id="customertype2"
                        value="company">
                    <label class="form-check-label" for="customer_type">
                        Company
                    </label>
                </div>
            </div>
        </div>
        <label>Client Name</label>
        <div class="mb-3">
            <input type="text" class="form-control" name="customer_name" id="customer_name" required
                placeholder="Enter Client Name" aria-label="Client Name" aria-describedby="client-name-addon">
        </div>
        <label>Email</label>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" id="email" required placeholder="Email"
                aria-label="Email" aria-describedby="email-addon">
        </div>
        <label>Password</label>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" id="password" required
                placeholder="Password" aria-label="Password" aria-describedby="password-addon">
        </div>
        <label>Mobile No</label>
        <div class="mb-3 d-flex">
            <select name="country_code_m" class="form-control" style="width: 30em" id="country_code_m" required>
                <option value="">{{ __('select') }}</option>
                @foreach($countryCodes as $c)
                    <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})</option>
                @endforeach
            </select>
            <input type="text" class="form-control" style="width: 70em" name="mobile" id="mobile" required
                placeholder="Mobile No" aria-label="Mobile No" aria-describedby="client-mobile-no-addon">
        </div>
        {{-- @if(Auth::check() && $path=='any')
            <label for="role">Role</label>
            <div class="mb-3">
                <select name="role" class="form-control" id="role">
                    <option value="">{{ __('select') }}</option>
                    @foreach($roles as $r)
                        <option value="{{ $r->name }}">{{ $r->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('role')
                <span style="color: red">{{ $message }}</span>
                <br>
            @enderror
        @endif --}}
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    </div>
</form>