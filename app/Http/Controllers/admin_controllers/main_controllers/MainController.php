<?php

namespace App\Http\Controllers\admin_controllers\main_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Admin_Mail\User_Mail\Reply_Contact_us;
use Mail;
use DB;

class MainController extends Controller
{
    //contact us functions
    public function viewContactUs(){
    	$contact=DB::table('user_contact_us')->where(['replay_status'=>"0"])->get();
      $contact1=DB::table('user_contact_us')->where(['replay_status'=>"1"])->get();
    	return view('admin_views/main_views/view_contact_us',['contact'=>$contact,'contact1'=>$contact1]);
    }
    public function viewSingleMessage(Request $request){
       $id=$request->post('x');
       $contact=DB::table('user_contact_us')->where(['id'=>$id])->first();
       echo '<div id="mymodalmesage" class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-lg">
       <div class="modal-content">

       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
       </button>
       <h4 class="page-title text-center model-head" id="myModalLabel">Message</h4>
       </div>
       <div class="modal-body" style="font-family:georgia regular;">
       <ul class="list-unstyled" id="job-detail-des" style="padding-left:15%;padding-right:15%;">
          <li><span>To :</span> Career Spoon</li>
          <li><span>From :</span>'.$contact->candidate_name.'</li>
          <li><span>Subject :</span>'.$contact->candidate_subject.'</li>
          <li><span>Message :</span></li>
          <li style="padding-left:12%;">'.$contact->candidate_message.'</li>
       </ul>
       <div class="row">


       </div>
       </div>
       <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

       </div>
       </div>
       </div>
       </div>';

    }

    public function replySingleMessage(Request $request){
      $id=$request->post('x');
      $name =$request->post('y');
      $email =$request->post('z');
      $n_id = "'".$id."'";
      $n_email ="'".$email."'";
      $n_name ="'".$name."'";
       echo '<div id="mymodalreply" class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-lg">
       <div class="modal-content">

       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
       </button>
       <h4 class="page-title text-center model-head" style="font-family:georgia regular;margin-bottom:0px;">Reply Message</h4>
       </div>
       <div class="modal-body" style="font-family:georgia regular;">
       <div class="row">
       <form>
       <ul class="list-unstyled" id="job-detail-des">
          <li><span>To :</span>'.$name.'</li>
          <li><span>Email :</span> '.$email.'</li>
          <li><span>From :</span> Career Spoon (careerspoon@gmail.com)</li>
          <li style="border-bottom:none;">
          <label>Enter Message:</label>
          </li>
           </ul>
          <div class="input-group col-sm-10 col-md-offset-1">
          <textarea class="form-control" name="message" id="message"></textarea>
          </div>
       </form>
       </div>
       </div>
       <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-success" data-dismiss="modal" onclick="send_email_message('.$n_id.','.$n_email.','.$n_name.');">Send</button>

       </div>
       </div>
       </div>
       </div>';

    }
  public function replyContactMessage(Request $request){
    $id=$request->post('x');
    $email=$request->post('y');
    $msg=$request->post('msg');
    $status=array(
    'replay_status'=>"1"
    );
     $contact=DB::table('user_contact_us')->where(['id'=>$id])->update($status);
     if($contact){
      echo "yes";
     }
  }

  public function sendingReplyEmail(Request $request){

    Mail::send(new Reply_Contact_Us());
   
  
  }

}
