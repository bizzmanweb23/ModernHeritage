@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Add Quotation</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
      <div class="card">
        <form action="#" method="post">
            @csrf
            
                <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back" href="{{ route('getRequest') }}"><i class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                    <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2" aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Discard</a>
                </div>
            </div>
        </form>
       </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input').hide();
        $('#tag').hide();
        $('#edit').hide();;
        $('#save').click(function() {
            $('#opportunity_span').hide();
            $('#expected_price_span').hide();
            $('#probability_span').hide();
            $('#client_name_span').hide();
            $('#email_span').hide();
            $('#mobile_no_span').hide();
            $('#priority_span').hide();
            $('#expected_closing_span').hide();
            $('#tag_span').hide();
            $('#save').show();
            $('#discard').show();
            $('#edit').hide();
            $('#back').hide();
            $('input').show();
            $('#tag').select2({
                width: '50%',
                placeholder: "Select a tag",
                allowClear: true
            });
        });

        $('#discard').click(function() {
            location.reload();
        });
    });
</script>
@endsection