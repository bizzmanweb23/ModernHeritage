@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('payStructureCreate')}}" method="POST">
            @csrf
            <div class="row">
               
                <div class="form-group col-md-6">
                    <label for="role_name">Year</label>

                      <select name="year" id="year" class="form-control" required>
                                <option value="">--Select-- </option>
                                <option value="2020" >2020 </option>
                                <option value="2021">2021 </option>
                                <option value="2022">2022 </option>
                                <option value="2023">2023 </option>
                                <option value="2024">2024 </option>
                                <option value="2025">2025 </option>
                                <option value="2026">2026 </option>
                                <option value="2027">2027 </option>
                                <option value="2028">2028 </option>
                                <option value="2029">2029 </option>
                                <option value="2030">2030 </option>
                              
                            </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Commission</label>
                    <input type="text" class="form-control" id="commission" name="commission" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf"  required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Insurance</label>
                    <input type="text" class="form-control" id="insurance" name="insurance" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Medical Allowance</label>
                    <input type="text" class="form-control" id="medical_leave_entitlement" name="medical_leave_entitlement" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Medical Leave Entitlement</label>
                    <input type="text" class="form-control" id="medical_allowance" name="medical_allowance"  required>
                </div>
                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('payStructure')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ $error }}");
        @endforeach
    @endif
    </script>
@endsection