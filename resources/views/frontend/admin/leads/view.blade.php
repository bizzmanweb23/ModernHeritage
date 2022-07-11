@extends('frontend.admin.layouts.master')
@section('content')


<div class="content-wrapper card">

    <div class="content-body card-body">
       
            <div class="row">
      
            <div class="ms-auto text-end">
                   

                   <a href="{{route('leadsManagement')}}" class="btn btn-link"> <i class="fa fa-arrow-left"></i> Back</a>
               </div>
            
                <div class="form-group col-md-6">
                    <label>Name</label>
                    {{$data->name}}
                  
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    {{$data->email}}
                </div>
                <div class="form-group col-md-6">
                    <label>Phone</label>
                    {{$data->phone}}
                    
                </div>
                <div class="form-group col-md-6">
                    <label>Subject</label>
                    {{$data->subject}}
                   
                </div>
               
                <div class="form-group col-md-6">
                    <label>Message</label>
                   {{$data->message}} 
                </div>
               
            </div>
   
    </div>
</div>
@endsection
