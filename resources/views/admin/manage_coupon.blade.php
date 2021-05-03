@extends('admin/layout')
@section('page_title','Manage coupon')
@section('coupon_selected','active')

@section('container')
<h2 class="mb-2">Manage Coupon</h2>
 <a href="{{url('admin/coupon')}}" class="btn btn-md btn-info mb-3">Back</a> 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">{{$id}}
                <form action="{{route('coupon.manage_coupon_process')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" value="{{$title}}" name="title" type="text" class="form-control"  aria-invalid="false" required>
                        @error('title')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        
                    </div>
                   
                    <div class="form-group has-success">
                        <label for="code" class="control-label mb-1">Code</label>
                        <input id="code" value="{{$code}}" name="code" type="text" 
                        class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                            autocomplete="code" required>
                            @error('code')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                    </div>
                    <div class="form-group has-success">
                        <label for="value" class="control-label mb-1">Value</label>
                        <input id="value" value="{{$value}}" name="value" type="text" 
                        class="form-control cc-name valid" data-val="true" data-val-required="Please enter the value"
                            autocomplete="code" required>
                            @error('value')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                    </div>
                   
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                    <input type="hidden" name="id" value="{{$id}}" />
                </form>
            </div>
        </div>
    </div>
     
</div>
 
    
@endsection