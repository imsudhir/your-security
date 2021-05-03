<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Users;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // echo "welcome to admin";
        if($request->session()->has('ADMIN_LOGIN')){
        return redirect('admin/dashboard');
        }else{
        return view('admin.login');
        }
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function auth(Request $request)
    {
        //
        $email = $request->post('email');
        $password = $request->post('password');
        // $result = Admin::where(['email'=>$email,'password'=>$password])->get();
         $result = Admin::where(['email'=>$email])->first();
        
        if($result){
            if(Hash::check($request->post('password'), $result->password)){
                $totalguard = Users::where(['role'=>2])->get()->count();
                $totalnewjobs = Requirement::get()->count();
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('TOTAL_GUARD', $totalguard);
            $request->session()->put('TOTAL_NEW_JOBS', $totalnewjobs);
            $request->session()->put('ADMIN_ID',$result->id);
            return redirect ('admin/dashboard');
        }else{
            $request->session()->flash('error','Please enter correct password..');
            return redirect ('admin');
        }
    }
            
        if(isset($result['0']->id)){
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('ADMIN_ID',$result['0']->id);
            print_r($result['0']->id);
            return redirect ('admin/dashboard');

        } else {
            $request->session()->flash('error','please enter valid login details');
            return redirect ('admin');
         }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    //update password with hashing to database
    // public function updatepassword()
    // {
    //     $r = Admin::find(1);
    //     $r->password=Hash::make('admin');
    //     $r->save();
    // }

        
    }


