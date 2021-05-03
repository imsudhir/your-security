@extends('admin/layout')
@section('page_title','Guard')
@section('guard_selected','active')
    
@section('container')
{{-- {{$data}} --}}
<h2 class="mb-2">Guard Details</h2>  <a href="{{url('admin/guard')}}" class="btn btn-md btn-info mb-3">Back</a> 

    
<div class="card">
    <div class="card-body">
      <div class="row">
          <div class="col-lg-6">
            <b>Name:</b> {{$data->name}}    
          </div>
          <div class="col-lg-6">
            <b>Profile Image:</b> <img src='{{$data->profile_image}}'>    
           </div>
           <div class="col-lg-6">
            <b>Email:</b> {{$data->email}}    
           </div>
         <div class="col-lg-6">
            <b>Mobile: </b>{{$data->mobile}}    
        </div>
        <hr style="border: 2px solid black; width:100%;">
        <div class="col-lg-12">
            <b>Address: </b>{{$data->address}}    
        </div>
        <div class="col-lg-6">
            <b>City: </b>{{$data->city}}    
        </div>
        <div class="col-lg-6">
            <b>Pincode: </b>{{$data->pincode}}    
        </div>
        <div class="col-lg-6">
            <b>Availability: </b>{{$data->availability_time}}    
        </div>
        <div class="col-lg-6">
            <b>Verify Status: </b>{{$data->active_status}}    
        </div>
        <div class="col-lg-6">
            <b>Active Status: </b>{{$data->verify_status}}    
        </div>
        <div class="col-lg-6">
            <b>Login Credentials: </b>{{$data->login_id && $data->login_password? 'created':'n/a'}}    
        </div>
      </div>
    </div>
  </div>
  <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>

@endsection