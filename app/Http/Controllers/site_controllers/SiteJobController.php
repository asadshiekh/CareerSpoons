<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Job\JobModel;
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
        return view('client_views.jobs_related_pages.search_related_job',['job'=>$job,'area'=>$area,'city'=>$city,'qual'=>$qual,'indus'=>$indus,'area1'=>$area,'get_cities'=>$city,'f_city'=>$f_city,'f_area'=>$f_area,'f_indus'=>$f_indus,'f_qual'=>$f_qual,'f_exp'=>$f_exp,'f_type'=>$f_type,'f_shift'=>$f_shift]);
    
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
        return view('client_views.jobs_related_pages.search_related_job',['job'=>$job,'area'=>$area,'city'=>$city,'qual'=>$qual,'indus'=>$indus,'area1'=>$area,'get_cities'=>$city,'f_city'=>$fcity,'f_area'=>$farea,'f_indus'=>$findus,'f_qual'=>$fqual,'f_exp'=>$fexp,'f_type'=>$ftype,'f_shift'=>$fshift]);


    }


    public function viewAllJobSearch(){
        $obj = new JobModel();
    	return view('client_views.jobs_related_pages.all_jobs');
    }

    public function viewjobDetail($id){
        
        $obj = new JobModel();


        $job_detail=$obj->fetch_job_details($id);
        $job_similar=$obj->fetch_job_similar($job_detail->req_industry,$id);
        $job_req=DB::table('job_req_qualifications')->where(['post_id'=>$id])->get();
        $job_p=DB::table('job_preferences')->where(['post_id'=>$id])->get();
        
 // echo "<pre>";
 // print_r($job_detail);
        return view('client_views.jobs_related_pages.job_details',['job_detail'=>$job_detail,'job_req'=>$job_req,'job_p'=>$job_p,'job_similar'=>$job_similar]);   
    }

    function doApplyNow(Request $request){
        $c_id=$request->post('c_id');
        $p_id=$request->post('p_id');
        //echo $c_id." ".$p_id;
        $u_id=$request->session()->get("id");
        $resume=DB::table('user_choose_temp')->where(['candidate_id'=>$u_id])->first();
        $r_id=$resume->temp_id;

        $apply=array(
            'company_id' => $c_id ,
            'user_id' => $u_id,
            'post_id' => $p_id,
            'resume_id' => $r_id,
            'view_status' => "0",
            'shortlisted' => "0"
             );
        //print_r($apply);
        
        if(DB::table('apllied_jobs')->insert($apply)){
        echo "yes";
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



   

}
