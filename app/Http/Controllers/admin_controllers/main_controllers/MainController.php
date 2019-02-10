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

  //About Us functions


public function viewAboutUs(){
  $about=DB::table('about_us_content')->first();
  return view('admin_views.main_views.about_us',['about'=>$about]);
}

public function aboutUsFormSend(Request $request){
 
 $file = $request->file('video');
 $filename = $file->getClientOriginalName();
 $path ='uploads/aboutus_video';
 $new = time().$filename;
     if($file->move($path, $new)){
          $about_us=array(
            'about_qoute'=>$request->post('qoute'),
            'about_address'=>$request->post('address'),
            'about_email'=>$request->post('email'),
            'about_no'=>$request->post('phone'),
            'about_video'=>$new

          );
          if(DB::table('about_us_content')->update($about_us)){
           echo "yes";
           }
     
    }


  }


  public function viewFrequentAskedQuestion(){
    $faq=DB::table('frequently_asked_questions')->get();
    return view('admin_views/main_views/view_faq',['faq'=>$faq]);
  }


  public function doPostFaq(Request $req){

    $question = $req->question;
    $solution = $req->answer;
    $solution=str_ireplace('<p>','',$solution);
    $solution=str_ireplace('</p>','',$solution);
    $random_key  = time();
    $current_date = date("Y.m.d h:i:s");

    $user_response=array(
            'question'=>$question,
            'random_key'=>$random_key,
            'solution'=>$solution,
            'created_at' => $current_date
          );

    $data = DB::table('frequently_asked_questions')->insert($user_response);

    if($data){

      return redirect('view-faq-page')->with('success','Your FAQ Successfully Posted To Main Site');
    }

    else{

      return redirect('view-faq-page')->with('error','Your FAQ Links are Not Posted!');
    }

  }


  public function doDeleteFaq($id){

    $info= DB::table('frequently_asked_questions')->where('id','=',$id)->delete();

    if($info){

       return redirect('view-faq-page')->with('success','Your FAQ Successfully Delete');
    }

    else{

      return redirect('view-faq-page')->with('error','Something Wrong To Delete Faq');
    }
    
  }


  function viewProductReview(Request $request){

    $candidate_reviews = DB::table('candidate_reviews')->join('register_users','candidate_reviews.candidate_id', '=', 'register_users.id')->select('candidate_reviews.*', 'register_users.*')->get();
    
    if($candidate_reviews->count()>0){
      
    }
    else{
      $candidate_reviews  = $candidate_reviews->count();
    } 

  $organization_reviews = DB::table('organization_reviews')->join('add_organizations','organization_reviews.organization_id', '=', 'add_organizations.company_id')->select('organization_reviews.*', 'add_organizations.*')->get();
    
    if($organization_reviews->count()>0){
      
    }
    else{
       $organization_reviews  = $organization_reviews->count();
    }

    // echo "<pre>";
    // dd($organization_reviews);


       return view('admin_views/main_views/product_reviews',['candidate_reviews'=>$candidate_reviews,'organization_reviews'=>$organization_reviews]);
  }   

  function doChangeCandidateReviewStatus(Request $request){
    $status = $request->post("val");
    $candidate_id = $request->post("id");

    $current_date = date("Y.m.d h:i:s");
    $user_response = array(
      'review_status' => $status,
      'created_at' => $current_date
    );

    $data = DB::table('candidate_reviews')->where('candidate_id',$candidate_id)->update($user_response);

    if($data){

      echo "yes";
    }

    else{

    }
    

  }



  public function doChangeOrganizationReviewStatus(Request $request){

    $status = $request->post("val");
    $organization_id = $request->post("id");

    $current_date = date("Y.m.d h:i:s");
    $user_response = array(
      'review_status' => $status,
      'created_at' => $current_date
    );

    $data = DB::table('organization_reviews')->where('organization_id',$organization_id)->update($user_response);

    if($data){

      echo "yes";
    }

    else{

    }

  }


}
