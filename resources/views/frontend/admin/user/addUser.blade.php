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
<form action="{{ route('saveUser') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">
                    <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ url()->previous() }}"><i
                            class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                </div>
                <div class="row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="user_name">Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name"
                                required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="upload">
                            <img src="{{ asset('images/products/default.jpg') }}" alt="Product"
                                style="height: 100px; width:100px">
                            <label for="user_image" class="edit">
                                <i class="fas fa-pencil-alt"></i>
                                <input id="user_image" type="file" style="display: none" name="user_image">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                                required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Confirm Password" required>
                        </div>
                    </div>
                </div>

                {{-- Tab lists --}}
                <ul class="nav nav-tabs mt-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#access_rights">Access Rights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#preferences">Preferences</a>
                    </li>
                </ul>

                {{-- Tab Panes --}}
                <div class="tab-content mb-3">

                    {{-- Access rights --}}
                    <div id="access_rights" class="container tab-pane active"><br>
                        <div style="display: flex; flex-wrap: no-wrap;">
                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="user_type" id="customer"
                                    value="customer" checked>
                                <label class="form-check-label" for="user_type">
                                    Customer
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input class="form-check-input" type="radio" name="user_type" id="employee"
                                    value="employee">
                                <label class="form-check-label" for="user_type">
                                    Employee
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2 mb-2 customer">
                            <div class="col-md-6">
                                <label for="customer_type">Customer Type</label>
                                <select name="customer_type" id="customer_type" class="form-control">
                                    <option value="Individual">Individual</option>
                                    <option value="Company">Company</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2 customer">
                            <div class="col-md-6">
                                <h5>Sales</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="sales">Sales</label>
                                        <select name="sales" id="sales" class="form-control">
                                            <option>--Select--</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="User: Own Documents only">User: Own Documents only</option>
                                            <option value="User: All Documents">User: All Documents</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Purchase</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="bom_purchase_request">BOM Purchase Request</label>
                                        <select name="bom_purchase_request" id="bom_purchase_request" class="form-control">
                                            <option>--Select--</option>
                                            <option value="BOM Request User">BOM Request User</option>
                                            <option value="BOM Request Manager">BOM Request Manager</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 customer">
                            <div class="col-md-6">
                                <h5>Services</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="project">Project</label>
                                        <select name="project" id="project" class="form-control">
                                            <option>--Select--</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Accounting</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="invoicing">Invoicing</label>
                                        <select name="invoicing" id="invoicing" class="form-control">
                                            <option>--Select--</option>
                                            <option value="Billing">Billing</option>
                                            <option value="Accountant">Accountant</option>
                                            <option value="Billing Administrator">Billing Administrator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 customer">
                            <div class="col-md-6">
                                <h5>Inventory</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="inventory">Inventory</label>
                                        <select name="inventory" id="inventory" class="form-control">
                                            <option>--Select--</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="purchase">Purchase</label>
                                        <select name="purchase" id="purchase" class="form-control">
                                            <option>--Select--</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Human Resource</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="employees">Employees</label>
                                        <select name="employees" id="employees" class="form-control">
                                            <option>--Select--</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Officer">Officer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 customer">
                            <div class="col-md-6">
                                <h5>Administration</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="administration">Administration</label>
                                        <select name="administration" id="administration" class="form-control">
                                            <option>--Select--</option>
                                            <option value="Access Rights">Access Rights</option>
                                            <option value="Settings">Settings</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 employee">
                            <div class="col-md-6">
                                <h5>Website</h5>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <label for="website">Website</label>
                                        <select name="website" id="website" class="form-control">
                                            <option>--Select--</option>
                                            <option value="All">All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Preferences --}}
                    <div id="preferences" class="container tab-pane fade"><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="language">Language:</label>
                                <select name="language" id="language" class="form-control">
                                    <option value="English(US)">English(US)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="timezone">Timezone:</label>
                                <select name="timezone" id="timezone" class="form-control">
                                    <option>--Select--</option>
                                    <option value="Asia/Kolkata">Asia/Kolkata</option>
                                    <option value="Asia/Kolkata">Singapore</option>
                                    <option value="Asia/Kolkata">Universal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function (){
        $('.employee').hide();
    });

    $('#customer').click(function (){
        $('.employee').hide();
        $('.customer').show();
    });

    $('#employee').click(function (){
        $('.customer').hide();
        $('.employee').show();
    });

</script>
@endsection
