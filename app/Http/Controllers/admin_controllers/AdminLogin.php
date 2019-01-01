<?php

namespace App\Http\Controllers\admin_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminLogin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLoginPage()
    {
        return view('admin_views/login');
    }
    public function doAdminLogin(Request $request){
       $user= $request->post('user');
       $pass= $request->post('pass');
       $info=DB::table('Admin_account')->where(['admin_username' => $user,'admin_pass' => $pass])->first();
       if($info){
            if($info->account_activation == true){
          $admin=array(
            'admin_name' => $info->admin_fullname,
            'admin_phone' => $info->admin_phone,
            'admin_address' => $info->admin_address,
            'admin_username' => $info->admin_username,
            'admin_email' => $info->admin_email
        );
          $request->session()->put($admin);
          if($request->session()->get('admin_name')){
              echo "yes";
          }
        }else{
          echo "Acount Blocked";
        }
      }


  }


  public function viewSession(Request $request){
  $data = $request->session()->all();
  echo "<pre>";
  print_r($data);
  }
  public function doCheckEmail(Request $request){
    echo $email=$request->post('email');
  }




}
