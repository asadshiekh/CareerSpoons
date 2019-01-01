<?php

namespace App\Http\Controllers\admin_controllers\admin_profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function viewAdminProfile(Request $request)
    {
        $username=$request->session()->get('admin_username');
        $email=$request->session()->get('admin_email');
        $phone=$request->session()->get('admin_phone');

        $ad_info=DB::table('Admin_account')->where(['admin_username'=>$username,'admin_email'=>$email,'admin_phone'=>$phone])->first();
        $em_info=DB::table('Admin_account')->where('account_right','!=', 'superadmin')->get();
        
        return view('admin_views/admin_profile/admin_pro',['ad_info'=>$ad_info,'em_info'=>$em_info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doAdminUpdate(Request $request)
    {
        $current_date=date("Y.m.d h:i:s");
        $id=$request->post('id');
        $new_info=array(
        'admin_fullname'=>$request->post('new_admin_name'),
        'admin_phone'=>$request->post('new_admin_phone'),
        'admin_address'=>$request->post('new_admin_address'),
        'admin_email'=>$request->post('new_admin_email'),
        'updated_at'=>$current_date
        );
        // print_r($new_info);
        if(DB::table('Admin_account')->where(['account_id'=>$id])->update($new_info)){
       $request->session()->flash('success', $id);
       return redirect('admin-profile');
       $request->session()->flash('Access', true);
   }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewEmployee(Request $request)
    {
        $current_date=date("Y.m.d h:i:s");
        $employee=array(
        'admin_fullname'=>$request->post('employee_name'),
        'admin_phone'=>$request->post('employee_phone'),
        'admin_address'=>$request->post('employee_address'),
        'admin_email'=>$request->post('employee_email'),
        'account_right'=>$request->post('employee_right'),
        'admin_username'=>$request->post('employee_user'),
        'admin_pass'=>$request->post('employee_pass'),
        'account_activation'=>true,
        'created_at'=>$current_date,
        'updated_at'=>$current_date
    );
       // print_r($employee);
    if(DB::table('Admin_account')->insert($employee)){
        $id=DB::getPdo()->lastInsertId();
        $request->session()->flash('employee');
        return redirect('admin-profile');
        $request->session()->flash('Access', true);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEmployee(Request $request)
    {
        $id=$request->post('id');
        if(DB::table('Admin_account')->where(['account_id'=>$id])->delete()){
        echo "yes";
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
