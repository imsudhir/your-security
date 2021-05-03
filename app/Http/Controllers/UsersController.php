<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result['data']=Users::all();
        $result['data']=Users::all()->where('role',2);
        $result['userRole']=2;
        return view('admin.guard', $result);
    }
    public function view_details($id)
    {
        $model['data']=Users::find($id);
        // $result['data']=Users::all()->where('role',2);
        return view('admin/view_details', $model);
    }
    public function verify_status(Request $request,$verify_status,$id)
    {
        //
       if($verify_status == 1){
        $msg = 'Guard Verified successfuly';
       }else{
        $msg = 'Guard Un verified successfuly';

       }
        
        $model=Users::find($id);
        $model->verify_status=$verify_status;
        $model->save();
       
        $request->session()->flash('message',$msg);
        return redirect('admin/guard');
        
    }
    public function active_status(Request $request,$active_status,$id)
    {
        //
        echo $active_status;
       if($active_status == 1){
        $msg = 'Guard activated successfuly';
       }else{
        $msg = 'Guard deactivated successfuly';

       }
        
        $model=Users::find($id);
        $model->active_status=$active_status;
        $model->save();
       
        $request->session()->flash('message',$msg);
        return redirect('admin/guard');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
