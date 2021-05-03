@extends('admin/layout')
@section('page_title','Guard')
@section('guard_selected','active')
    
@section('container')
@if ($userRole==2)
<h2 class="mb-2">Guard</h2>
    <div class="row card card-body p-4">

        <div class="col-lg-12">
            @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
            @endif
            
        </div>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th class="text-right">Email</th>
                    <th class="text-right">Mobile</th>
                    <th class="text-right">Address</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->mobile}}</td>
                    <td>{{$list->address}}                    
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                         <a class="btn btn-primary" href="{{url('admin/guard/view_details')}}/{{$list->id}}">
                            View     
                        </a>
                       
                           @if ($list->verify_status == 1)
                           <a class="btn btn-primary" href="{{url('admin/guard/verify_status/0')}}/{{$list->id}}">
                             Verified    
                           </a>
                           @elseif($list->verify_status == 0)
                           <a class="btn btn-warning" href="{{url('admin/guard/verify_status/1')}}/{{$list->id}}">
                          Not Verified     
                           </a>
                           @endif
                           @if ($list->active_status == 1)
                           <a class="btn btn-primary" href="{{url('admin/guard/active_status/0')}}/{{$list->id}}">
                            Active   
                           </a>
                           @elseif($list->active_status == 0)
                           <a class="btn btn-warning" href="{{url('admin/guard/active_status/1')}}/{{$list->id}}">
                             Deactive   
                           </a>
                           @endif

                           <a class="btn btn-warning" href ="{{url('admin/guard/send_guard_credentials')}}/{{$list->id}}">
                             Send login data
                         </a>
                        
                      </div>
                    </td>
                 
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    @endif
    
@endsection