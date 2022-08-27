@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('payStructureUpdate')}}" method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Year</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" required>
                    <select name="year" id="year" class="form-control" required>
                        <option value="">--Select-- </option>
                        <option value="2020" @if($data->year == 2020) selected @endif>2020 </option>
                        <option value="2021" @if($data->year == 2021) selected @endif>2021 </option>
                        <option value="2022" @if($data->year == 2022) selected @endif>2022 </option>
                        <option value="2023" @if($data->year == 2023) selected @endif>2023 </option>
                        <option value="2024" @if($data->year == 2024) selected @endif>2024 </option>
                        <option value="2025" @if($data->year == 2025) selected @endif>2025 </option>
                        <option value="2026" @if($data->year == 2026) selected @endif>2026 </option>
                        <option value="2027" @if($data->year == 2027) selected @endif>2027 </option>
                        <option value="2028" @if($data->year == 2028) selected @endif>2028 </option>
                        <option value="2029" @if($data->year == 2029) selected @endif>2029 </option>
                        <option value="2030" @if($data->year == 2030) selected @endif>2030 </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Commission</label>
                    <input type="text" class="form-control" id="commission" name="commission" value="{{$data->commission}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$data->cpf}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Insurance</label>
                    <input type="text" class="form-control" id="insurance" name="insurance" value="{{$data->insurance}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Medical Allowance</label>
                    <input type="text" class="form-control" id="medical_leave_entitlement" name="medical_leave_entitlement" value="{{$data->medical_leave_entitlement}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Medical Leave Entitlement</label>
                    <input type="text" class="form-control" id="medical_allowance" name="medical_allowance" value="{{$data->medical_allowance}}" required>
                </div>
                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{route('payStructure')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection