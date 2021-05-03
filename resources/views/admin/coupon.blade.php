@extends('admin/layout')
@section('page_title','Coupon')
@section('coupon_selected','active')
    
@section('container')
<h2 class="mb-2">Coupon</h2>
<a href="{{url('admin/coupon/manage_coupon')}}"> <button type="button" class="btn btn-primary">
    Add Coupon</button>
</a>
    <div class="row mt-3">

        <div class="col-lg-12">
            @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
            @endif
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th class="text-right">Title</th>
                            <th class="text-right">Code</th>
                            <th class="text-right">Value</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->title}}</td>
                            <td>{{$list->code}}</td>
                            <td>{{$list->value}}</td>
                            <td>
                                <a href="{{url('admin/coupon/manage_coupon')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-success">Edit</button>    
                                   </a>
                               
                                   @if ($list->status == 1)
                                   <a href="{{url('admin/coupon/status/0')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-primary">Active</button>    
                                   </a>
                                   @elseif($list->status == 0)
                                   <a href="{{url('admin/coupon/status/1')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-warning">Deactive</button>    
                                   </a>
                                   @endif
                                   <a href="{{url('admin/coupon/delete')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-danger">Delete</button>    
                                   </a>
                                    </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     
    </div>
 
    
@endsection