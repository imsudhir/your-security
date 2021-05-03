<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Mail\AuMail;
use Mail;


class MailController extends Controller
{ 
    public function sendAuMail(Request $request, $id)
    {
        $length=8;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $login_digits = "123456789";

         $email = 'sudhirsinghkumar11@gmail.com';
         $model=Users::find($id);
        if(!empty($model)){
            $login_id_exist = $model->login_id;
            $login_password_exist = $model->login_password;
             if(!empty($login_id_exist)>0 && !empty($login_password_exist)){
                $details = [
                    'userid' => $model->login_id,
                    'password' => $model->login_password,
                    'brodcast'=> 0
                ];
            } else {
                $login_id = '00'.$id.substr(str_shuffle($login_digits),0,4);
                $login_password = substr(str_shuffle($chars),0,$length);
                $model->login_id=$login_id;
                $model->login_password=$login_password;
                if($model->save()){
                    $result=Users::where(['id'=>$id])->get();
                    $details = [
                        'userid' => $result['0']->login_id,
                        'password' => $result['0']->login_password,
                        'brodcast'=> 0

                    ];
                } else {
                    $request->session()->flash('message','Server error please contact administrator');

                }
            }
         
            } else {
             $request->session()->flash('message','Login credentials are not found');
                return redirect('admin/guard');
            }
  
        Mail::to($email)->send(new AuMail($details));
        $request->session()->flash('message','Login credentials are Sent Successfully');
   
        return redirect('admin/guard');

    }
    public function broadCastNewJobsToGuard($id)
    {
        

         $email = 'sudhirsinghkumar11@gmail.com';
         $model=Users::where(['role'=>2,'verify_status'=>1,'active_status'=>1])->get();
        // echo "<pre>";
        //  print_r($model);
        //  return $model['2']->id;
        foreach($model  as $key=>$value ){
        echo $mail= $value->email;
        echo '<br>';
        $details = [
            'totaljobs' => 'New jobs available to accept click link below',
            'link' => 'http://127.0.0.1:8000/admin/newjobs/approve/1/2',
            'brodcast'=>1
        ];
        if(!empty($mail)){
            echo $mail.'inside loop mail';
            Mail::to($mail)->send(new AuMail($details));
        }
        }
        
       
        return redirect('admin/newjobs');

    }
}