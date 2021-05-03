<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
// guard management
    Route::get('admin/guard', [UsersController::class, 'index']);
    Route::get('admin/guard/manage_guard', [UsersController::class, 'manage_guard']);
    Route::get('admin/guard/manage_guard/{id}', [UsersController::class, 'manage_guard']);
    Route::post('admin/guard/manage_guard_process', [UsersController::class, 'manage_guard_process'])->name('guard.manage_guard_process');
    Route::get('admin/guard/delete/{id}', [UsersController::class, 'delete']);
    Route::get('admin/guard/verify_status/{status}/{id}', [UsersController::class, 'verify_status']);
    Route::get('admin/guard/active_status/{status}/{id}', [UsersController::class, 'active_status']);
    Route::get('admin/guard/view_details/{id}', [UsersController::class, 'view_details']);
    Route::get('admin/guard/send_guard_credentials/{id}', [MailController::class, 'sendAuMail']);

    // guard management

 //new jobs
 Route::get('admin/newjobs', [RequirementController::class, 'index']);
 Route::get('admin/newjobs/approve/{status}/{id}', [RequirementController::class, 'approve']);
 Route::get('admin/newjobs/broadcast/{id}', [RequirementController::class, 'broadcast']);


    // Route::get('admin/updatepassword', [AdminController::class, 'updatepassword']);
    Route::get('admin/logout', function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('TOTAL_GUARD');
        session()->flash('error','Logout Successfully');
    return redirect('admin');
    });
});


