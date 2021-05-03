<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $MailController;
    public function __construct(MailController $MailController)
    {
        $this->MailController = $MailController;
    }

    public function index()
    {
        //
        $result['data']=Requirement::all();
          $result['data'];
        return view('admin.requirement', $result);
    }
    public function approve(Request $request,$approve,$id)
    {
        //

       if($approve == 1){
        $msg = 'Job approved successfuly';
       }else{
        $msg = 'Job does not approved';
       }
        
        $model=Requirement::find($id);
        $model->approve=$approve;
        $model->save();
       
        $request->session()->flash('message',$msg);
        return redirect('admin/newjobs');
        
    }
    public function broadcast($id){
        $response = $this->MailController->broadCastNewJobsToGuard($id);
        return redirect('admin/newjobs');
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
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirement $requirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirement $requirement)
    {
        //
    }
}
