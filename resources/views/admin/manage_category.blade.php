@extends('admin/layout')
@section('page_title','Manage Category')
@section('category_selected','active')

@section('container')
<h2 class="mb-2">
@if ($id == '')
Add Category
@else 
Manage Category
@endif
</h2>
 <a href="{{url('admin/category')}}" class="btn btn-md btn-info mb-3">Back</a> 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">{{$id}}
                <form action="{{route('category.manage_category_process')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="Category" class="control-label mb-1">Category</label>
                        <input id="category" value="{{$category_name}}" name="category_name" type="text" class="form-control"  aria-invalid="false" required>
                        @error('category_name')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                    </div>
                   
                    <div class="form-group has-success">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" 
                        class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                            autocomplete="category_slug" required>
                            @error('category_slug')
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