<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Job\JobModel;
use App\SiteModel\ClientSite\ClientSiteModel;
use App\Http\Controllers\Controller;
use DB;

class SiteJobController extends Controller
{
    public function viewRelatedJobSearch(Request $request){


        // $title = !empty($request->title) ? $request->title : " ";
        // $city = !empty($request->city) ? $request->city :  " ";
        // $area = !empty($request->area) ? $request->area : " ";
       $title = $request->title;
       $citi = $request->city;
       $areas =$request->area;
       $f_city="";
       $f_area="";
       $f_indus="";
       $f_qual="";
       $f_exp="";
       $f_type="";  
       $f_shift="";     


        $obj = new JobModel();
        $job = $obj->fetch_all_jobs($title,$citi,$areas);
        
        // echo "<pre>";
        // print_r($job);
        $area = $obj->get_functional_area();
        $city = $obj->get_cities();
        $qual = $obj->get_qual();
        $indus = $obj->get_indus();
        

        //dd($job);
        $page_title="CareerSpoons - Jobs";
        return view('client_views.jobs_related_pages.search_related_job',['job'=>$job,'area'=>$area,'city'=>$city,'qual'=>$qual,'indus'=>$indus,'area1'=>$area,'get_cities'=>$city,'f_city'=>$f_city,'f_area'=>$f_area,'f_indus'=>$f_indus,'f_qual'=>$f_qual,'f_exp'=>$f_exp,'f_type'=>$f_type,'f_shift'=>$f_shift,'page_title'=>$page_title]);
    
    }
    public function viewFilterJobSearch(Request $request){
        $fcity = $request->f_city;
        $farea = $request->f_area;
        $findus = $request->f_indus;
        $fexp = $request->f_exp;
        $fqual = $request->f_qual;
        $ftype = $request->f_type;
        $fshift = $request->f_shift;

        $obj = new JobModel();
        $job = $obj->fetch_filter_jobs($fcity,$farea,$findus,$fexp,$fqual,$ftype,$fshift);

        $area = $obj->get_functional_area();
        $city = $obj->get_cities();
        $qual = $obj->get_qual();
        $indus = $obj->get_indus();
        // echo "<pre>";
        // print_r($job);
        $page_title="CareerSpoons - Filter Jobs";
       return view('client_views.jobs_related_pages.search_related_job',['job'=>$job,'area'=>$area,'city'=>$city,'qual'=>$qual,'indus'=>$indus,'area1'=>$area,'get_cities'=>$city,'f_city'=>$fcity,'f_area'=>$farea,'f_indus'=>$findus,'f_qual'=>$fqual,'f_exp'=>$fexp,'f_type'=>$ftype,'f_shift'=>$fshift,'page_title'=>$page_title]);


    }


    public function viewAllJobSearch(Request $request){

      $get_industry=$request->segment(2);
      $obj = new JobModel();
      $city = $obj->get_cities();
      $indus = $obj->get_indus();
      // if($get_industry){}else{}
      
      $search_result = $obj->get_select_industry_jobs($get_industry);
      
      //dd($search_result);
      $page_title="CareerSpoons - All Jobs";
    	return view('client_views.jobs_related_pages.all_jobs',['cities'=>$city,'industry'=>$indus,'search_results'=>$search_result,'page_title'=>$page_title]);
    }


    public function searchByIndustry(Request $request){

      $get_indus = $request->company_industry;
      $get_career = $request->select_career_level;
      $get_city = $request->company_city;
      if($get_indus){
        $get_i= $get_indus;
      }else{
       $get_i= "jobs";
      }

      $obj = new JobModel();
      $city = $obj->get_cities();
      $indus = $obj->get_indus();
      $search_result = $obj->filter_result_by_industry($get_indus,$get_career,$get_city);
      echo "<pre>";
      print_r($search_result);
      echo "</pre>";die();
      $page_title="CareerSpoons - ".$get_i;
      return view('client_views.jobs_related_pages.all_jobs',['cities'=>$city,'industry'=>$indus,'search_results'=>$search_result,'page_title'=>$page_title]);
    
    }

    public function viewjobDetail($id){
        
        $obj = new JobModel();


        $job_detail=$obj->fetch_job_details($id);
        $job_similar=$obj->fetch_job_similar($job_detail->req_industry,$id);
        $job_req=DB::table('job_req_qualifications')->where(['post_id'=>$id])->get();
        $job_p=DB::table('job_preferences')->where(['post_id'=>$id])->get();
        
 // echo "<pre>";
 // print_r($job_detail);
        $page_title="CareerSpoons - Job Detail";
        return view('client_views.jobs_related_pages.job_details',['job_detail'=>$job_detail,'job_req'=>$job_req,'job_p'=>$job_p,'job_similar'=>$job_similar,'page_title'=>$page_title]);   
    }

    function doApplyNow(Request $request){
        $c_id=$request->post('c_id');
        $p_id=$request->post('p_id');
        //echo $c_id." ".$p_id;
        $u_id=$request->session()->get("id");
        $u_in=DB::table('add_user_generals_info')->where(['candidate_id'=>$u_id])->first();
        $p_in=DB::table('organization_posts')->where(['post_id'=>$p_id])->first();
        $post_indus=$p_in->req_industry;
        $user_indus=$u_in->candidate_industries;

        if($post_indus == $user_indus){
        $resume=DB::table('user_choose_temp')->where(['candidate_id'=>$u_id])->first();
        $r_id=$resume->temp_id;

        $apply=array(
            'company_id' => $c_id ,
            'user_id' => $u_id,
            'post_id' => $p_id,
            'resume_id' => $r_id,
            'view_status' => "0",
            'shortlisted' => "0",
            'interview_status' => "0",
            'message' => "0",
            'selected' => "0",
            'rejected' => "0"
             );
        //print_r($apply);
        
        if(DB::table('apllied_jobs')->insert($apply)){
        echo "yes";
        }
      }else{
        echo "no";
      }

    }

    function viewApplicantsOfPost(Request $request){
        $obj = new JobModel();
         $p_id=$request->post('p_id');
         $c_id=$request->session()->get("company_id");
         $info = DB::table('apllied_jobs')->where(['company_id'=>$c_id,'post_id'=>$p_id])->count();
        if($info > 0){
          // $applied=DB::table('apllied_jobs')->where(['company_id'=>$c_id,'post_id'=>$p_id])->get();
          $users=$obj->fetch_users_against_post($c_id,$p_id);
          //print_r($users);
          echo '  <div id="users_list" class="modal fade "> <!-- class modal and fade -->

          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
          <div class="modal-header"> <!-- modal header -->
          <button type="button" class="close" 
          data-dismiss="modal" aria-hidden="true">×</button>

          <h4 class="modal-title">Applicants List</h4>
          </div>

          <div class="modal-body" style="padding: 3%;"> <!-- modal body -->
          
          <div class="row">';
          foreach($users as $us){
          echo '<div class="col-md-12 col-sm-12">
          <div class="manage-resume-box">
          <div class="col-md-3 col-sm-3">
          <div class="manage-resume-picbox">
          <img src="uploads/client_site/profile_pic/'.$us->profile_image.'" class="img-responsive" alt="" />
          </div>
          </div>
          <div class="col-md-4 col-sm-4">
          <h5>'.$us->candidate_name.'</h5>
          <span>'.$us->user_email.'</span>
          </div>
          <div class="col-md-3 col-sm-3">';
          if($us->shortlisted === "1"){
            echo '<button type="button" class="btn btn-success" style="height:30px;padding-top:2px;background-color:white;color:green;">Short Listed <i class="fa fa-check" disabled></i></button>';
          }else{
          echo '<button type="button" class="btn btn-success" style="height:30px;padding-top:2px;width:150px;" onclick="change_status('.$p_id.','.$c_id.','.$us->id.');">Short List</button>';
             }
          echo '</div>
          <div class="col-md-2 col-sm-2">
          
          <a href="show-temp-preview/'.$us->id.'" data-toggle="tooltip" title="View" class="btn btn-success" style="height:30px;padding-top:2px;" onclick="go('.$p_id.','.$c_id.','.$us->id.');">View</a>
          </div>
          </div>
          </div>';
           }
          echo '</div>


          </div>

          <div class="modal-footer"> <!-- modal footer -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel!</button>
          </div>

          </div> <!-- / .modal-content -->

          </div> <!-- / .modal-dialog -->

          </div><!-- / .modal -->';


        }else{
            echo "no";
        }
    }

    public function viewApplicants(Request $request,$p_id){
     $obj = new JobModel();
        // $p_id=$request->post('p_id');
         $c_id=$request->session()->get("company_id");
         $info = DB::table('apllied_jobs')->where(['company_id'=>$c_id,'post_id'=>$p_id])->count();
        if($info > 0){
          // $applied=DB::table('apllied_jobs')->where(['company_id'=>$c_id,'post_id'=>$p_id])->get();
          $users=$obj->fetch_users_against_post($c_id,$p_id);
          $viewed_users=$obj->fetch_Viewed_users_against_post($c_id,$p_id);
          $short_users=$obj->fetch_short_users_against_post($c_id,$p_id);
          $call_users=$obj->fetch_called_users_against_post($c_id,$p_id);
          $app_users=$obj->fetch_app_users_against_post($c_id,$p_id);
          $match_users=$obj->fetch_match_users_against_post($c_id,$p_id);
          $obj1 =  new ClientSiteModel();
          $city=$obj1->get_all_cities();
          $qual=$obj1->get_all_qualification();
          $industry=$obj1->get_all_indutries();
          $cit='';
          $gender='';
          $career='';
          $quali='';
          $indus='';
               // dd($match_users);
          $page_title="CareerSpoons - Applicants";
          return view("client_views.company_related_pages.applicants",['users'=>$users,'p_id'=>$p_id,'c_id'=>$c_id,'viewed_users'=>$viewed_users,'short_users'=>$short_users,'call_users'=>$call_users,'app_users'=>$app_users,'city'=>$city,'qual'=>$qual,'industry'=>$industry,'cit'=>$cit,'gender'=>$gender,'career'=>$career,'quali'=>$quali,'indus'=>$indus,'match_users'=>$match_users,'page_title'=>$page_title]);
        }

    }
    public function sendMessageInterview(Request $request){
      $p_id=$request->post("p");
      $c_id=$request->post("c");
      $u_id=$request->post("u");
      $msg=$request->post("msg");

      $change=array(
        'message'=>$msg
      );
       if(DB::table('apllied_jobs')->where(['company_id'=>$c_id,'user_id'=>$u_id, 'post_id'=>$p_id])->update($change)){
            echo "yes";
          }
    }
    public function changeSRstatus(Request $request){
      $p_id=$request->post("p");
      $c_id=$request->post("c");
      $u_id=$request->post("u");
      $val=$request->post("v");
      if($val == "selected"){
        $change=array(
        'selected'=>"1",
        'rejected'=>"0",
        );
      }else{
       $change=array(
        'selected'=>"0",
        'rejected'=>"1",
      );
     }
       if(DB::table('apllied_jobs')->where(['company_id'=>$c_id,'user_id'=>$u_id, 'post_id'=>$p_id])->update($change)){
           if($val == "selected"){
            echo "yes";
          }else{
            echo "no";
            
          }
          }
    }

    public function changeInterstatus(Request $request){
       $p_id=$request->post("p");
      $c_id=$request->post("c");
      $u_id=$request->post("u");
      $val=$request->post("v");
      if($val == "conducted"){
        $change=array(
        'interview_status'=>"1"
        );
      }else{
       $change=array(
        'interview_status'=>"0"
      );
     }
       if(DB::table('apllied_jobs')->where(['company_id'=>$c_id,'user_id'=>$u_id, 'post_id'=>$p_id])->update($change)){
           if($val == "conducted"){
            echo "yes";
          }else{
            echo "no";
            
          }
          }
    }

    public function doFilterApplicants(Request $request,$p_id){
       $c_id=$request->session()->get("company_id");
         $info = DB::table('apllied_jobs')->where(['company_id'=>$c_id,'post_id'=>$p_id])->count();
        if($info > 0){
    $cit=$request->post('selected_city');
    $gender=$request->post('selected_gender');
    $career=$request->post('selected_career');
    $quali=$request->post('selected_qual');
    $indus=$request->post('selected_indus');
    
    $obj = new JobModel();
    $users = $obj->do_filter_search($p_id,$c_id,$cit,$gender,$career,$quali,$indus);
    //dd($users);
         $city=DB::table('Add_cities')->get();
         $industry=DB::table('Company_industries')->get();
         $degree=DB::table('Add_degreelevel')->get();
         $qual=DB::table('Add_qualification')->get();
          $viewed_users=$obj->fetch_Viewed_users_against_post($c_id,$p_id);
          $short_users=$obj->fetch_short_users_against_post($c_id,$p_id);
          $call_users=$obj->fetch_called_users_against_post($c_id,$p_id);
          $app_users=$obj->fetch_app_users_against_post($c_id,$p_id);
          $match_users=$obj->fetch_match_users_against_post($c_id,$p_id);
         // echo "<pre>";
         // print_r($candidates);
          //dd($match_users);
          $page_title="CareerSpoons - Filter Applicants";
        return view('client_views.company_related_pages.applicants',['users'=>$users,'p_id'=>$p_id,'c_id'=>$c_id,'viewed_users'=>$viewed_users,'short_users'=>$short_users,'call_users'=>$call_users,'app_users'=>$app_users,'city'=>$city,'qual'=>$qual,'industry'=>$industry,'cit'=>$cit,'gender'=>$gender,'career'=>$career,'quali'=>$quali,'indus'=>$indus,'match_users'=>$match_users,'page_title'=>$page_title]);
       }
    }



   

}
