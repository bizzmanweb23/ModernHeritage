<form method="POST" action="{{ url('/') }}/register/client">
    @csrf
    <!-- Modal body -->
    <div class="modal-body">
        <label>First Name</label>
        <div class="mb-3">
            <input type="text" class="form-control" name="firstname" id="firstname" required
                placeholder="First Name" aria-label="First Name" aria-describedby="first-name-addon">
        </div>
        <label>Last Name</label>
        <div class="mb-3">
            <input type="text" class="form-control" name="lastname" id="lastname" required
                placeholder="Last Name" aria-label="Last Name" aria-describedby="last-name-addon">
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
        <label>Phone No</label>
        <div class="mb-3 d-flex">
            <select name="country_code" class="form-control" style="width: 30em" id="country_code">
                <option value="">{{ __('select') }}</option>
                @foreach($countryCodes as $c)
                    <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})</option>
                @endforeach
            </select>
            <input type="text" class="form-control" style="width: 70em" name="phone" id="phone" required
                placeholder="Phone No" aria-label="Phone No" aria-describedby="phone-no-addon">
        </div>
        @if(Auth::check() && $path=='any')
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
        @endif
    </div>
    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    </div>
</form>