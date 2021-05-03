@extends('admin/layout')
@section('page_title','Dashboard')
@section('dashboard_selected','active')

@section('container')
{{-- <div class="row">Dashboard</div> --}}
<div class="row m-t-25">
    <a href="{{url('admin/guard/')}}" class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix text-center">
                    <div class="text text-center mb-5">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                            <h2 style="fon t-size: 18px !important">Guard</h2>
                            <h2>        {{session('TOTAL_GUARD')}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </a>
    <a href="{{url('admin/newjobs/')}}" class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix text-center">
                    <div class="text text-center mb-5">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                            <h2 style="fon t-size: 18px !important">New Jobs</h2>
                            <h2>        {{session('TOTAL_NEW_JOBS')}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix text-center">
                    <div class="text text-center mb-5">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                            <h2 style="fon t-size: 18px !important">Guard</h2>
                            <h2>   
                                     {{session('TOTAL_GUARD')}}
                            </h2>
                        </div>
                      
                      
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
 
     
  
</div>
    
@endsection