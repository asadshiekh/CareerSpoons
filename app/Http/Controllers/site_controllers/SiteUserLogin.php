<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\User\UserloginModel;
use App\SiteModel\User\UserForgetPassword;
use App\SiteModel\User\UserProfileImages;
use App\SiteModel\User\UserProfileModel;
use DB;
use App\Mail\Site_Mail\User_Mail\User_Forget_Password;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\UrlGenerator;
class SiteUserLogin extends Controller
{
  public function viewUserLogin(){

   return view('client_views.user_related_pages.user_login');
 }

 public function viewUserForgotPassword(){

   return view('client_views.user_related_pages.user_forgot_password');
 }

 public function verifyCandidateEmail(Request $request){


  $candidate_email = $request->candidate_email;

  $obj =  new UserForgetPassword();
  $response = $obj->do_verify_candidate_email($candidate_email);

  if($response){

   date_default_timezone_set("Asia/Karachi");
   $current_date = date("Y.m.d h:i:s");

   $created_at  =  date("d-m-Y");
                // echo date("h:i a"); 
   $now = time();
                // echo  "<br/>";
   $ten_minutes = $now + (5 * 60);
                // echo  "<br/>";
   $startTime = date('h:i a', $now);
                // echo  "<br/>";
   $endTime = date('h:i a', $ten_minutes);

   $userdata=array(
    "candidate_id"=>$response->id,
    "candidate_email"=>$response->user_email,
    "start_time"=>$startTime,
    "expire_time"=>$endTime,
    "current_date_year"=>$created_at,
    "created_at"=>$current_date,

  );


   $response_2 = $obj->do_register_forget_password($userdata);
   $lastInsertId = DB::getPdo()->lastInsertId();
   $request->session()->put('lastInsertId',$lastInsertId);
   $request->session()->put('CandidateUniqueEmail',$candidate_email);
   echo "yes";


           //return redirect('user-forgot-password')->with('success','We Have Send You Email Check Your Email To Proceed further');

 }

 else{

  echo "no";

        //return redirect('user-forgot-password')->with('error','No Email Found Sorry!');

}


}


public function sendCandidateForgetEmail(){

 Mail::send(new User_Forget_Password());

}


public function viewCreateNewPassword(){

 return view('client_views.user_related_pages.create_new_password');
}


public function updateCandidatePassword(Request $request){

 date_default_timezone_set("Asia/Karachi");
 $current_date  =  date("d-m-Y");
 $now = time();
 $current_Time = date('h:i a', $now);

 $create_password = $request->new_password;
 $lastInsertId  =  Session::get('lastInsertId');
 $candidate_email  =  Session::get('CandidateUniqueEmail');


 $obj =  new UserForgetPassword();
 $response = $obj->get_all_details_of_forget_password($candidate_email,$lastInsertId);


 if($current_date == $response->current_date_year &&  $current_Time<=$response->expire_time  && $current_Time>=$response->start_time){


  $info = $obj->update_verification_link($candidate_email,$create_password,$lastInsertId);
  $request->session()->forget('lastInsertId');
  $request->session()->forget('CandidateUniqueEmail');


  echo "yes";
         //return redirect('user-login')->with('password_updated','Your Password Is Updated');
}

else{

  $request->session()->forget('lastInsertId');
  $request->session()->forget('CandidateUniqueEmail');
  echo "no";
     //return redirect('user-forgot-password')->with('error','Sorry Link Is Expired Try Again');

}
}


public function doUserLogin(Request $request){


 $email = $request->get('user_email');
 $password = $request->get('user_password');

 $obj =  new UserloginModel();
 $info = $obj->do_login_user($email,$password);

        //print_r($info);

 if($info){ 

   $obj2 =  new UserProfileImages();
   $info2 = $obj2->get_user_profile_image($info->id);

    $obj3 =  new UserProfileModel();
   $info3 = $obj3->get_user_review_data($info->id);


   $userdata=array(
    "id"=>$info->id,
    "candidate_name"=>$info->candidate_name,
    "user_email"=>$info->user_email,
    "username"=>$info->username,
    "phone_number"=>$info->phone_number,
    "cv_status"=>$info->current_cv_status,
    "login_status"=>'Active',
    "user_status"=>'Active',
    "email_status"=>$info->verify_by_email,
    "profile_image"=>$info2->profile_image,
    "cover_image"=>$info2->cover_image,
    "cropped_cover_image"=>$info2->cropped_cover_image,
    "candidate_rating"=>$info3->rating_points,
    "phone_status"=>$info->current_number_status,
  );
    	//print_r($userdata);
   $request->session()->put($userdata);
   echo "yes";

 }else{

  echo "no";

}


}

public function logout(Request $request){
        //alert()->success('You have been logged out.', 'Good bye!');
        //$email = $request->session()->get('email');
  $request->session()->flush();
  $request->session()->forget('email_status');
  echo "yes";
 // return redirect('/');
}




}
