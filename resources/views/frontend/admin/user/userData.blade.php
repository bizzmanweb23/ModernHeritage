@extends('frontend.admin.layouts.master')

@section('content')
<style>
    .upload {
        height: 100px;
        width: 100px;
        position: relative;
    }

    .upload:hover>.edit {
        display: block;
    }

    .edit {
        display: none;
        position: absolute;
        top: 1px;
        right: 1px;
        cursor: pointer;
    }

</style>
<form action="{{ url('/') }}/admin/useredit/{{ $user->id }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i
                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ route('index') }}"><i class="fas fa-arrow-left text-dark me-2"
                            aria-hidden="true"></i>Back</a>
                    <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="javascript:;"><i
                            class="far fa-trash-alt me-2"></i>Discard</a>
                </div>
                @if($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="user_name">Name:</label>
                            <span class="view_span">{{ $user->user_name }}</span>
                            <input type="text" class="form-control edit_input" id="user_name" name="user_name"
                                placeholder="Name" value="{{ $user->user_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="upload view_span">
                            @if(isset($user->customer_image))
                                <img src="{{ asset($user->customer_image) }}" alt="Product"
                                    style="height: 100px; width:100px">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 100px; width:100px">
                            @endif
                        </div>
                        <div class="upload edit_input">
                            @if(isset($user->customer_image))
                                <img src="{{ asset($user->customer_image) }}" alt="Product"
                                    style="height: 100px; width:100px">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 100px; width:100px">
                            @endif
                            <label for="user_image" class="edit">
                                <i class="fas fa-pencil-alt"></i>
                                <input id="user_image" type="file" style="display: none" name="user_image"
                                    value="{{ $user->customer_image }}">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <span class="view_span">{{ $user->email }}</span>
                            <input type="email" class="form-control edit_input" id="email" name="email"
                                placeholder="Email" value="{{ $user->email }}" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <span class="view_span">{{ $user->mobile }}</span>
                            <div class="row edit_input">
                                <div class="col-md-3">
                                    <select name="country_code_m" class="form-control" id="country_code_m">
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                            <option value="+{{ $c->code }}"
                                                {{ substr($user->mobile, 0, 3) == $c->code ? 'selected' : '' }}>
                                                +{{ $c->code }}({{ $c->name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="mobile" id="mobile"
                                        value="{{ substr($user->mobile, 3) }}" placeholder="user Mobile"
                                        class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tab lists --}}
                <ul class="nav nav-tabs mt-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#access_rights">Access Rights</a>
                    </li>
                </ul>

                {{-- Tab Panes --}}
                <div class="tab-content mb-3">

                    {{-- Access rights --}}
                    <div id="access_rights" class="container tab-pane active"><br>
                        <div class="view_span">
                            <label for="user_type">User Type:</label>
                            <span class="text-uppercase" id="user_type_span">{{ $user->user_type }}</span>
                        </div>
                        <div style="display: flex; flex-wrap: no-wrap;" class="edit_input">
                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="user_type" id="employee"
                                    value="employee"
                                    {{ $user->user_type == "employee" ? "checked" : "" }}>
                                <label class="form-check-label" for="user_type">
                                    Employee
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="user_type" id="customer"
                                    value="customer"
                                    {{ $user->user_type == "customer" ? "checked" : "" }}>
                                <label class="form-check-label" for="user_type">
                                    Customer
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="user_type" id="others" value="others"
                                    {{ $user->user_type == "others" ? "checked" : "" }}>
                                <label class="form-check-label" for="user_type">
                                    Others
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2 employee">
                            <div class="col-md-6">
                                <h5>Sales</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="sales">Sales:</label>
                                        <span class="view_span">{{ $user->sales }}</span>
                                        <select name="sales" id="sales" class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="Administrator"
                                                {{ $user->sales == "Administrator" ? "selected" : "" }}>
                                                Administrator</option>
                                            <option value="User: Own Documents only"
                                                {{ $user->sales == "User: Own Documents only" ? "selected" : "" }}>
                                                User: Own Documents only</option>
                                            <option value="User: All Documents"
                                                {{ $user->sales == "User: All Documents" ? "selected" : "" }}>
                                                User: All Documents</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Purchase</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="bom_purchase_request">BOM Purchase Request:</label>
                                        <span class="view_span">{{ $user->bom_purchase_request }}</span>
                                        <select name="bom_purchase_request" id="bom_purchase_request"
                                            class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="BOM Request User"
                                                {{ $user->bom_purchase_request == "BOM Request User" ? "selected" : "" }}>
                                                BOM Request User</option>
                                            <option value="BOM Request Manager"
                                                {{ $user->bom_purchase_request == "BOM Request Manager" ? "selected" : "" }}>
                                                BOM Request Manager</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 employee">
                            <div class="col-md-6">
                                <h5>Services</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="project">Project:</label>
                                        <span class="view_span">{{ $user->project }}</span>
                                        <select name="project" id="project" class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="Administrator"
                                                {{ $user->project == "Administrator" ? "selected" : "" }}>
                                                Administrator</option>
                                            <option value="User"
                                                {{ $user->project == "User" ? "selected" : "" }}>
                                                User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Accounting</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="invoicing">Invoicing:</label>
                                        <span class="view_span">{{ $user->invoicing }}</span>
                                        <select name="invoicing" id="invoicing" class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="Billing"
                                                {{ $user->invoicing == "Billing" ? "selected" : "" }}>
                                                Billing</option>
                                            <option value="Accountant"
                                                {{ $user->invoicing == "Accountant" ? "selected" : "" }}>
                                                Accountant</option>
                                            <option value="Billing Administrator"
                                                {{ $user->invoicing == "Billing Administrator" ? "selected" : "" }}>
                                                Billing Administrator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 employee">
                            <div class="col-md-6">
                                <h5>Inventory</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="inventory">Inventory:</label>
                                        <span class="view_span">{{ $user->inventory }}</span>
                                        <select name="inventory" id="inventory" class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="Administrator"
                                                {{ $user->inventory == "Administrator" ? "selected" : "" }}>
                                                Administrator</option>
                                            <option value="User"
                                                {{ $user->inventory == "Administrator" ? "selected" : "" }}>
                                                User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="purchase">Purchase:</label>
                                        <span class="view_span">{{ $user->purchase }}</span>
                                        <select name="purchase" id="purchase" class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="Administrator"
                                                {{ $user->purchase == "Administrator" ? "selected" : "" }}>
                                                Administrator</option>
                                            <option value="User"
                                                {{ $user->purchase == "User" ? "selected" : "" }}>
                                                User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Human Resource</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="employees">Employees:</label>
                                        <span class="view_span">{{ $user->employees }}</span>
                                        <select name="employees" id="employees" class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="Administrator"
                                                {{ $user->employees == "Administrator" ? "selected" : "" }}>
                                                Administrator</option>
                                            <option value="Officer"
                                                {{ $user->employees == "Officer" ? "selected" : "" }}>
                                                Officer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 employee">
                            <div class="col-md-6">
                                <h5>Administration</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="administration">Administration:</label>
                                        <span class="view_span">{{ $user->administration }}</span>
                                        <select name="administration" id="administration"
                                            class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="Access Rights"
                                                {{ $user->administration == "Access Rights" ? "selected" : "" }}>
                                                Access Rights</option>
                                            <option value="Settings"
                                                {{ $user->administration == "Settings" ? "selected" : "" }}>
                                                Settings</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 customer">
                            <div class="col-md-6">
                                <h5>Website</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="website">Website:</label>
                                        <span class="view_span">{{ $user->website }}</span>
                                        <select name="website" id="website" class="form-control edit_input">
                                            <option>--Select--</option>
                                            <option value="All"
                                                {{ $user->website == "All" ? "selected" : "" }}>
                                                All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#save').hide();
        $('#discard').hide();
        if ($('#user_type_span').text().trim() !== 'customer') {
            $('.customer').hide();
        } else {
            $('.employee').hide();
        }

        $('.edit_input').hide();
    });

    $('#customer').click(function () {
        $('.employee').hide();
        $('.customer').show();
    });

    $('#employee').click(function () {
        $('.customer').hide();
        $('.employee').show();
    });
    $('#others').click(function () {
        $('.customer').hide();
        $('.employee').show();
    });

    $('#edit').click(function () {
        $('#save').show();
        $('#discard').show();
        $('#edit').hide();
        $('#back').hide();
        $('.edit_input').show();
        $('.view_span').hide();
    });

    $('#discard').click(function () {
        location.reload();
    });

</script>
@endsection
