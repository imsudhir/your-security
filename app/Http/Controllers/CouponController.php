<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result['data']=Coupon::all();
        // echo "<pre>";
        // print_r($result['data']);
        // die;
        return view('admin.coupon', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_coupon(Request $request,$id='')
    {
        //
        if($id>0){
             $arr=Coupon::where(['id'=>$id])->get();
             $result['title']=$arr['0']->title;
             $result['code']=$arr['0']->code;
             $result['value']=$arr['0']->value;
             $result['id']=$id;
 
            } else{
            $result['title']='';
            $result['code']='';
            $result['value']='';
            $result['id']='';

        }
//         echo "<pre>";
//         print_r($result);
// die();
        return view('admin.manage_coupon', $result);
    }
    public function manage_coupon_process(Request $request)
    {
        //
        // return ($request->post());
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons,code,'.$request->post('id'),
            'value'=>'required',
            ]);
        if($request->post('id')>0){
            $model=new coupon();
            $model=Coupon::find($request->post('id'));
            $msg="Coupon Updated Successfuly";
        }else{
        $model=new coupon();
        $msg="Coupon Added Successfuly";

        }
        $model->title=$request->post('title');
        $model->code=$request->post('code');
        $model->value=$request->post('value');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }
    public function delete(Request $request,$id)
    {
        //
        $model=Coupon::find($id);
        $model->delete();
        $request->session()->flash('message','Coupon deleted successfuly');
        return redirect('admin/coupon');
        echo "delete";
        echo $id;
    }
    public function status(Request $request,$status,$id)
    {
        //
        echo $status,$id;
       if($status == 1){
        $msg = 'coupon Activated successfuly';
       }else{
        $msg = 'coupon Deactivated successfuly';

       }
        
        $model=Coupon::find($id);
        $model->status=$status;
        $model->save();
       
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
        
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
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupon  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(coupon $coupon)
    {
        //
    }
}
