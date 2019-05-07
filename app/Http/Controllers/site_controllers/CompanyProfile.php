<?php

namespace App\Http\Controllers\site_controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Job\JobModel;
use App\SiteModel\Company\CompanyProfileModel;
use App\Http\Requests\Client_Request\Company_Post_Validation;
use Validator;
use DB;
use Carbon\Carbon;


class CompanyProfile extends Controller
{
    public function viewCompanyProfile(Request $request){
        
        $fetch_city=DB::table('Add_cities')->get();
        $fetch_up_city=$fetch_city;
        $industry=DB::table('company_industries')->get();
        $fetch_up_indus=$industry;
        $id=$request->session()->get('company_id');
        $degree=DB::table('Add_degreelevel')->get();
        $major=DB::table('Add_major')->get();
        $area=DB::table('Add_functionalarea')->get();
        $qual=DB::table('Add_qualification')->get();
        $fetch_up_type=DB::table('company_types')->get();
        $fetch_links=DB::table('add_organization_social_link')->where(['organization_id'=>$id])->first();

        $fetch_org=DB::table('Add_organizations')->where(['company_id'=>$id])->first();
        $data=$fetch_org;
        $fetch_post=DB::table('organization_posts')->where(['company_id'=>$id])->get();
        $fetch_pic=DB::table('upload_org_img')->where(['company_id'=>$id])->first();

        $fetch_links=DB::table('add_organization_social_link')->where(['organization_id'=>$request->session()->get('company_id')])->first();

      $fetch_company_advertise_logo=DB::table('company_advertised_logo')->where(['company_id'=>$request->session()->get('company_id')])->first();        

        $page_title="careerSpoons - ".$fetch_org->company_name;

        
    	return view('client_views.company_related_pages.company_profile',['fetch_city'=>$fetch_city,'fetch_org'=>$fetch_org,'fetch_pic'=>$fetch_pic,'industry'=>$industry,'industry1'=>$industry,'degree'=>$degree,'major'=>$major,'area'=>$area,'qual'=>$qual,'fetch_post'=>$fetch_post,'fetch_links'=>$fetch_links,'data'=>$data,'fetch_up_indus'=>$fetch_up_indus,'fetch_up_city'=>$fetch_up_city,'fetch_up_type'=>$fetch_up_type,'fetch_links'=>$fetch_links,'advertise_logo'=>$fetch_company_advertise_logo,'page_title'=>$page_title]);
    }
    public function PreferencesCitiesData(){
      $city=DB::table('Add_cities')->get();
      $random_value = rand();
     
      echo '<div id="fields'.$random_value.'">
      <div class="col-md-3 col-sm-6" id="inner_bgg">
      <label style="display:inline-block;">Select City:</label><span style="display:inline;"></span>
      <select class="form-control" name="selected_city[]" id="selected_city[]">
      <option value="" disabled="disabled" selected="selected" hidden>Select City</option>';
      foreach($city as $city){
        echo '<option value="'.$city->company_city_name.'">'.$city->company_city_name.'</option>';
      }
      echo ' </select>
      </div>
      <!-- Job type -->
      <div class="col-md-3 col-sm-6">
      <label>Job Type:</label>
      
      <select class="form-control" name="selected_type[]" id="selected_type[]">
      <option value="" disabled="disabled" selected="selected" hidden>Select Type</option>
      <option value="Full Time">Full Time</option>
      <option value="Part Time">Part Time</option>
      </select>
      </div>
      <!-- job shift-->
      <div class="col-md-3 col-sm-6">
      <label>Job Shift:</label>
      <select name="selected_shift[]" class="form-control" placeholder="select Shift" id="selected_shift[]">
      <option value="" disabled="disabled" selected="selected">Select Shift</option>
      <option value="Morning Shift">Morning Shift</option>
      <option value="Night Shift">Night Shift</option>
      </select>
      </div>
      <div class="col-md-3 col-sm-6">
      <label>Del</label>
      <div class="paren">

      <div class="chil"><button type="button" id="del_butn" class="btn-danger" onclick="del_front_field('.$random_value.');"><i class="fa fa-close"></i></button>
      </div>
      </div>
      </div>
      <div class="clearfix"></div>
      </div>';
    }

    public function PreferencesQualData(){
      $random_value = rand();
      $degree=DB::table('Add_degreelevel')->get();
      $qual=DB::table('Add_qualification')->get();
      echo '<div id="fields'.$random_value.'">
      <div class="col-md-4 col-sm-4">
      <label>Required Qualification:</label>    
      <select name="selected_qualificaltion[]" class="form-control" id="selected_qualification[]">
      <option value="select gender preferences" disabled="disabled" selected="selected">Select Qualification</option>';
      foreach($qual as $qual):
        echo '<option value="'.$qual->qualification_title.'">'.$qual->qualification_title.'</option>';
      endforeach;
      echo '</select>
      </div>
      <!---majors --->
      <!-- required degree level-->
      <div class="col-md-4 col-sm-4">
      <label>Required Degree Level:</label>
      <select name="req_degree[]" class="form-control" id="req_degree[]">
      <option value="select Degree" disabled="disabled" selected="selected">Select Degree Level</option>';
      foreach($degree as $degree):
        echo '<option value="'.$degree->degree_title.'">'.$degree->degree_title.'</option>';
      endforeach;
      echo '</select>
      </div>

      <div class="col-md-4 col-sm-4">
      <label>Del</label>
      <div class="input-group paren">
      <div class="chil"><button type="button" id="del_butn" class="btn-danger" onclick="del_front_field('.$random_value.');"><i class="fa fa-close"></i></a>
      </div>
      </div>
      </div><div class="clearfix"></div></div>';
    }

  public function addingOrgRemainingData(Request $request){
      $id=$request->post('id');
      $file=$request->file('company_doc');
      $new_name = rand().'.'.$file->getClientOriginalExtension();
      $destination='uploads/organization_documents';
      if($file->move($destination,$new_name)){
        $up_organization=array(
        "company_branch" => $request->post('company_branch_name'),
        "company_website" => $request->post('company_website'),
        "company_employees" => $request->post('selected_employees'),
        "company_industry" => $request->post('selected_industry'),
        "company_since" => $request->post('company_s'),
        "company_location" => $request->post('company_location'),
        "company_info" => $request->post('company_info'),
        "company_document" => $new_name,
        "registeration_process" =>"C"

        );
        if(DB::table('Add_organizations')->where(['company_id'=>$id])->update($up_organization)){
          $request->session()->forget("registeration_process");
          $request->session()->put("registeration_process","C");
          return redirect('company-profile')->with('success','Information Added Successfully!');
          
        }
      }
  }

  public function frontOrgPostJob(Request $request){
      
       $post_dat = $request->post('last_apply_date');
      $post_date=(strtotime($post_dat. ' + 1 days'));
      $obj = new Company_Post_Validation();
      $validation = Validator::make($request->all(),$obj->rules(),$obj->messages());

      if($validation->passes()){

      $company_id=$request->session()->get('company_id');
      $current_date = date("Y.m.d h:i:s");
      $job_post= array(
        'company_id' => $company_id,
        'job_title' => $request->post('posted_job_title'), 
        'job_skills' => $request->post('skill_tags'), 
        'functional_area' => $request->post('req_functional_area'),
        'req_major' => $request->post('selected_majors'),
        'req_industry' => $request->post('req_industry'), 
        'req_career_level' => $request->post('req_career_level'),
        'job_experience' => $request->post('job_exp_req'), 
        'total_positions' => $request->post('total_positions'), 
        'working_hours' => $request->post('working_hour'), 
        'min_salary' => $request->post('min_salary'), 
        'max_salary' => $request->post('max_salary'), 
        'last_apply_date' => $request->post('last_apply_date'), 
        'post_visibility_date' => $post_date,
        'selected_gender' => $request->post('selected_gender'), 
        'prefered_age' => $request->post('prefered_age'),
        'job_post_info' =>$request->post('post_information'),
        'post_status' =>"Active",
        'created_at' => $current_date,
        'updated_at' => $current_date
      );
      DB::table('Organization_posts')->insert($job_post);
      $id=DB::getPdo()->lastInsertId();
      $value=count($_POST['selected_city']);
       //city criteria adding in dtabase
      if(count($_POST['selected_city'])>0){
        foreach($_POST['selected_city'] as $row){
                //echo "Value".$row."<br/>\n";
          $cities[] = $row;
        }
        foreach($_POST['selected_type'] as $row){
                //echo "Value".$row."<br/>\n";
          $types[] = $row;
        }
        foreach($_POST['selected_shift'] as $row){
                //echo "Value".$row."<br/>\n";
          $shifts[] = $row;
        }
        for ($i=0; $i<$value ; $i++) {
                // echo $cities[$i];
          $city_criteria=array(
           'city'=>$cities[$i],
           'job_type'=>$types[$i],
           'job_shift'=>$shifts[$i],
           'post_id'=>$id,
           'company_id'=>$company_id
         );
          DB::table('job_preferences')->insert($city_criteria);
        }
      }
        //qualification criteria adding in database
      $val_qual=count($_POST['selected_qualificaltion']);
      if(count($_POST['selected_qualificaltion'])>0){
        foreach($_POST['selected_qualificaltion'] as $row){
                //echo "Value".$row."<br/>\n";
          $quals[] = $row;
        }
        foreach($_POST['req_degree'] as $row){
                //echo "Value".$row."<br/>\n";
          $degrees[] = $row;
          
        }
        for ($i=0; $i<$val_qual ; $i++) {
                // echo $cities[$i];
          $qual_criteria=array(
           'req_qualification'=>$quals[$i],
           'req_degree_level'=>$degrees[$i],
           'post_id'=>$id,
           'company_id'=>$company_id
         );
          DB::table('job_req_qualifications')->insert($qual_criteria);
        }
      }
       return redirect('company-profile')->with('success','Your  Post Successfully Added!');

     }

     else{

      //dd($validation->errors());
      return redirect('company-profile')->with(['p_errors' => 'Your Post Not Added Successfully!','errors' => $validation->errors()]);
     }


  }


  public function updateSocialLinks(Request $request){

      $update_links=array(
        "organization_fackbook" => $request->organization_facebook_link,
        "organization_google" => $request->organization_google_link,
        "organization_twitter" => $request->organization_twitter_link,
        "organization_linkedin" => $request->organization_linkedin,
        );

      // echo "<pre>";
      // print_r($update_links);
    $info =  DB::table('add_organization_social_link')->where('organization_id','=',$request->session()->get('company_id'))->update($update_links);

    if($info){

       return redirect('company-profile')->with('success','Your Links Are Updated Successfully!');
    }

    else{

       return redirect('company-profile')->with('p_errors','Your Links Are Not Update!');
    }


  }

  public function viewPrivateSinglePost(Request $request){
    $id=$request->post("x");
    $obj = new JobModel();
    $job_detail=$obj->fetch_job_details($id);
    $job_req=DB::table('job_req_qualifications')->where(['post_id'=>$id])->get();
    $job_p=DB::table('job_preferences')->where(['post_id'=>$id])->get();

    echo '<div id="viewpostmodalwindow" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"> 
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header"> <!-- modal header -->
    <button type="button" class="close" 
    data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Information About You</h4>
    </div>
    <div class="modal-body" style="padding:5%;"> <!-- modal body -->
    <div class="row no-mrg">
   <div class="full-card">

              <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Job Detail</h2>
                <ul class="job-detail-des" style="padding-right:5%;">
                  <li><span>Role:</span>'.$job_detail->job_title.'</li>
                  <li><span>Salary:</span>'.$job_detail->min_salary.' - '.$job_detail->max_salary.' Rs</li>
                  <li><span>Industry:</span>';

                    echo $data = str_replace("_"," ",$job_detail->req_industry);


                  echo '</li>
                  <li><span>Required Experience:</span>'.$job_detail->job_experience.'</li>
                  <li><span>Total Positions:</span>'.$job_detail->total_positions.'</li>
                  <li><span>Working Hours:</span>'.$job_detail->working_hours.'</li>


                </ul>
              </div>
              <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Location</h2>
                <ul class="job-detail-des" style="padding-right:5%;">
                  <li><span>Address:</span>'.$job_detail->company_location.'</li>
                  <li><span>State:</span>Punjab</li>
                  <li><span>Country:</span>Pakistan</li>
                  <li><span>Telephone:</span>'.$job_detail->company_phone.'</li>
                  <li><span>Email:</span>'.$job_detail->company_email.'</li>
                </ul>
              </div>
              <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Job Preferences Cities:</h2>
                <ul class="job-detail-des">';
                  foreach($job_p as $job_p){
                  echo '<div class="media">
                    <div class="media-left media-middle">
                      <a href="#">
                        <img class="media-object" src="public/client_assets/img/university/circle.png" alt="..." style="width:30px; height:30px">
                      </a>
                    </div>
                    <div class="media-body">
                      <h5 class="media-heading" style="color:grey"><b>In '.$job_p->city.'</b></h5>
                      <h5 style="color:gray"><li><b style="padding-right: 2%;">Job Type:</b>'.$job_p->job_type.'</li>
                      </h5>
                      <h5 style="color:gray"><li><b style="padding-right: 2%;">Job Shift:</b> '.$job_p->job_shift.'</li>
                      </h5>

                      <h5 style="color:gray"><li><b style="padding-right: 2%;">last date for Apply:</b> '.$job_detail->last_apply_date.'</li></h5>
                    </div>
                  </div>
                  <hr>';
                }

              echo '</ul>
                </div>
              <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Job Qualification Requirements:</h2>
                <ul class="job-detail-des">';

                  foreach($job_req as $job_req){
                  echo '<div class="media">
                    <div class="media-left media-middle">
                      <a href="#">

                        <img class="media-object" src="public/client_assets/img/university/circle.png" alt="..." style="width:30px; height:30px">
                      </a>
                    </div>
                    <div class="media-body">

                      <h5 style="color:gray"><li><b style="padding-right: 2%;">Qualification:</b> '.$job_req->req_qualification.'</li>
                      </h5>
                      <h5 style="color:gray"><li><b style="padding-right: 2%;">Degree Level:</b> '.$job_req->req_degree_level.'</li>
                      </h5>

                      <h5 style="color:gray"><li><b style="padding-right: 2%;">last date for Apply:</b> '.$job_detail->last_apply_date.'</li></h5>
                    </div>
                  </div>
                  <hr>';
                }

              echo '</ul>
                 </div>

              <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Job Responsibilities</h2>
                <p style="padding-left:5%;">';
              
               $job_detail->job_post_info=str_ireplace('<p>','',$job_detail->job_post_info);
               echo $job_detail->job_post_info=str_ireplace('</p>','',$job_detail->job_post_info);


                
              echo '</p>
              </div>
              <div class="row row-bottom mrg-0">
                <h2 class="detail-title">Required Skills</h2>
                <p style="padding-left:5%;">'.$job_detail->job_skills.'</p>
              </div>
          </div>

    </div>
    </div>
    <div class="modal-footer"> <!-- modal footer -->
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
    </div>
    </div>
    </div>
    </div>';
  }

public function deletePostSingleFront(Request $request){
  $id=$request->post("x");

  $del=DB::table('organization_posts')->where(['post_id'=>$id])->delete();
  if($del){
    echo "yes";
  }
}
public function updatePostSingleFront(Request $request){
        $fetch_city=DB::table('Add_cities')->get();
        $industry=DB::table('company_industries')->get();
        $degree=DB::table('Add_degreelevel')->get();
        $major=DB::table('Add_major')->get();
        $area=DB::table('Add_functionalarea')->get();
        $qual=DB::table('Add_qualification')->get();
   $id=$request->post("x");
   $job_pre=DB::table('job_preferences')->where(['post_id' => $id])->get();
    $job_qual=DB::table('job_req_qualifications')->where(['post_id' => $id])->get();  
    $job=DB::table('organization_posts')->where(['post_id' => $id])->first();   $areas=$job->functional_area;
      $area_majors=DB::table('Add_major')->where(['area_title' => $areas])->get();
   echo '<div id="editpostmodalwindow" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"> 
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="post" id="info_post_up">
    <div class="modal-header"> <!-- modal header -->
    <button type="button" class="close" 
    data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Information About You</h4>
    </div>
    <div class="modal-body" style="padding:5%;"> <!-- modal body -->

    <!-- start form -->
    
                    <div class="edit-pro">
                    <input type="hidden" name="org_post" id="org_post" value="'.$id.'">
                      <div class="col-md-4 col-sm-6">
                        <label>Job Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="u_posted_job_title" id="u_posted_job_title" value="'.$job->job_title.'">
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Skills</label>
                        <input type="text" class="form-control" placeholder="Enter Skills which are Required for Job" name="u_skill_tags" id="u_skill_tags" value="'.$job->job_skills.'">
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Functional Area</label>
                        <select class="form-control" name="n_req_functional_area" id="n_req_functional_area" onchange="n_select_major();">
                          <option disabled="disabled" hidden="hidden">Select Required Functional area</option>
                          <option value="'.$job->functional_area.'" selected="selected">'.$job->functional_area.'</option>';
                          foreach($area as $area_val){
                              echo '<option id="industry-option" value="'.$area_val->area_title.'">'.$area_val->area_title.'</option>';
                              }
                        echo '</select>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Majors</label>
                        <select class="form-control" name="n_req_major" id="n_req_major">
                          <option disabled="disabled" hidden="hidden">Select Required Majors</option>
                          <option value="'.$job->req_major.'" selected="selected">'.$job->req_major.'</option>';
                         foreach($area_majors as $m){
                              echo '<option id="industry-option" value="'.$m->major_title.'">'.$m->major_title.'</option>';
                           }
                        echo '</select>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Industry</label>
                        <select class="form-control" name="req_industry" id="req_industry">
                          <option disabled="disabled" hidden="hidden">Select Required Industry</option>
                          <option value="'.$job->req_industry.'" selected="selected">'.$job->req_industry.'</option>';
                          foreach($industry as $industry_val){
                              echo '<option id="industry-option" value="'.$industry_val->company_industry_name.'">'.$industry_val->company_industry_name.'</option>';
                            }
                       echo '</select>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Career Level</label>
                        <select class="form-control" name="req_career_level" id="req_career_level">
                          <option disabled="disabled" hidden="hidden">Select Required Career level</option>
                          <option value="Entry Level">Entry Level</option>
                          <option value="Intermediate">Intermediate</option>
                          <option value="Experienced Professional">Experienced Professional</option>
                          <option value="Department Head">Department Head</option>
                          <option value="Gm / CEO / Country Head">Gm / CEO / Country Head</option>
                        </select>
                      </div>
        <!--////////////////////-->
                      <!-- Ciities criteria-->
      <div class="bgg col-md-12">';
//for($i=1; $i<=$count_pre; $i++){
      foreach ($job_pre as $pre):
        echo '<div id="Cityfields'.$pre->job_preferences_id.'">
        <div class="col-md-3 col-sm-6">
        <label>City:</label>
        <input type="text" disabled="disabled" class="form-control" selected="selected" value="'.$pre->city.'"/>';
        echo '
        </div>

        <!-- Job type -->

        <div class="col-md-3 col-sm-6">
        <label>Job Type:</label>
        
        <input type="text" class="form-control" disabled="disabled" value="'.$pre->job_type.'"/>
        </div>
        <!-- job shift-->
        <div class="col-md-3 col-sm-6">
        <label>Job Shift:</label>
        
        <input type="text" disabled="disabled" class="form-control" value="'.$pre->job_shift.'"/>
        </div>
        <!------>
        <div class="col-md-3 col-sm-6">
        <label>Del</label>
        <div class="input-group">

        <a class="btn btn-primary" onclick="del_fields('.$pre->job_preferences_id.');"><i class="fa fa-close"></i></a>
        </div>
        </div>
        <div class="clearfix"></div>
        <div id="content">

        </div>
        </div>';

      endforeach;

      echo '<div class="form-group col-sm-3">
      <label>ADD</label>
      <div class="input-group">

      <a class="btn btn-primary" onclick="add_modal_area();"><i class="fa fa-plus"></i></a>
      </div>
      </div>
      <div class="clearfix"></div>
      <div id="content_modal_area">

      </div>
      </div>
      <!------>
       <!-- ///////////////////    -->          
                   
                      <div class="col-md-4 col-sm-6">
                        <label>Year of Experience Required</label>
                        <input type="number" placeholder="Enter Required Experience" class="form-control" name="u_job_exp_req" id="u_job_exp_req" value="'.$job->job_experience.'">
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Total positions</label>
                         <input id="u_total_positions" name="u_total_positions" type="number" class="form-control" placeholder="Enter in Numbers" value="'.$job->total_positions.'"/>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Working Hours</label>
                        <input id="working_hour" name="working_hour" type="number" class="form-control" placeholder="Enter hours in Numbers" value="'.$job->working_hours.'"/>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Minimum Salary:</label>
                        <input id="min_salary" name="min_salary" type="number" class="form-control" placeholder="just Enter Amount" value="'.$job->min_salary.'"/>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Maximum Salary:</label>
                        <input id="max_salary" name="max_salary" type="number" class="form-control" placeholder="just Enter Amount" value="'.$job->max_salary.'"/>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Last Apply Date</label>
                        <input type="text" id="last_apply" name="last_apply_date"  class="form-control" placeholder="11/25/2018" data-theme="my-style" data-format="F S- Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en" value="'.$job->last_apply_date.'"/>
                      </div>
                      <!--<div class="col-md-4 col-sm-6">
                        <label>Post visibility Date:</label>
                        <input type="text" class="form-control" id="post_visible" name="post_visibility_date" placeholder="select date" data-theme="my-style" data-format="F S- Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en" value="'.$job->post_visibility_date.'"/>
                      </div>-->
                      <div class="col-md-4 col-sm-6">
                        <label>Gender Preferences</label>
                        <select name="selected_gender" class="form-control" id="selected_gender">
                        <option value="'.$job->selected_gender.'" selected="selected">'.$job->selected_gender.'</option>
                                  <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                      <option value="None">None</option>
                                    </select>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label>Prefered Age Group</label>
                        <select name="prefered_age" class="form-control" id="prefered_age">
                                      <option selected="selected" value="'.$job->prefered_age.'">'.$job->prefered_age.'</option>
                                      <option value="under 20">Under 20</option>
                                      <option value="20 to 30">20 to 30</option>
                                      <option value="30 to 40">30 to 40</option>
                                      <option value="40 to 50">40 to 50</option>
                                      <option value="Above 50">Above 50</option>
                                    </select>
                      </div>
                      <!-- ////////////////////-->

                       <!--Career criteria -->
      <div class="bgg col-md-12">';
      foreach ($job_qual as $quali):
        echo '<div id="fields'.$quali->job_qual_id.'"><!-- Search Result Title-->
        <div class="col-md-4 col-sm-4">
        <label>Required Qualification:</label>
        <input type="text" class="form-control" value="'.$quali->req_qualification.'" disabled="disabled" class="form-control"/>';


        echo '
        </div>
        
        <!-- required degree level-->
        <div class="col-md-4 col-sm-4">
        <label>Required Degree Level:</label>
        <input type="text" value="'.$quali->req_degree_level.'" disabled="disabled" class="form-control"/>';
        echo '
        </div>
        <!------>
        <div class="col-md-4 col-sm-4">
        <label>Del</label>
        <div class="input-group">

        <a class="btn btn-primary" onclick="del_qual_area('.$quali->job_qual_id.');"><i class="fa fa-close"></i></a>
        </div>
        </div>
        <div class="clearfix"></div>
        </div>';
      endforeach;
      echo '

      <div class="form-group col-sm-3">
      <label>ADD</label>
      <div class="input-group">

      <a class="btn btn-primary" onclick="add_modal_qual_area();"><i class="fa fa-plus"></i></a>
      </div>
      </div>
      <div class="clearfix"></div>
      <div id="content_modal_qual">

      </div>

      </div>
      <!---end criteria--->

                      <!-- ////////////////////-->
                    
                    <div class="col-md-12 col-sm-12">
                        <label>Information About Post</label>
                        <textarea class="form-control" id="post_information" name="user_info" class="user_info">'.$job->job_post_info.'</textarea>
                      </div>
                      
                    
                    </div>
                    
                  
    <!-- end form -->

    </div>
    <div class="modal-footer"> <!-- modal footer -->
    <div id="foot-p">
    <button type="button" class="btn btn-success" onclick="update_post_info('.$id.');">Update Post</button>
    <button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
    </div>
    </div>
     </form>
    </div>
    </div>
    </div>';
}

 public function delQualFrontField(Request $request){
     $id = $request->post('x');
     if(DB::table('job_req_qualifications')->where(['job_qual_id' => $id])->delete()){
       echo $id;
     }
   }
  public function delCityFrontField(Request $request){
     $id = $request->post('x');
     if(DB::table('job_preferences')->where(['job_preferences_id' => $id])->delete()){
       echo $id;
     }
   }

   public function doPostUpdateFront(Request $request){
     $current_date = date("Y.m.d h:i:s");
      $post_dat = $request->post('last_apply_date');
      $post_date=(strtotime($post_dat. ' + 1 days'));
    $j_post= array(
      'job_title' => $request->post('u_posted_job_title'), 
      'job_skills' => $request->post('u_skill_tags'), 
      'functional_area' => $request->post('n_req_functional_area'),
      'req_major' => $request->post('n_req_major'),
      'req_industry' => $request->post('req_industry'), 
      'req_career_level' => $request->post('req_career_level'),
      'job_experience' => $request->post('u_job_exp_req'), 
      'total_positions' => $request->post('u_total_positions'), 
      'working_hours' => $request->post('working_hour'), 
      'min_salary' => $request->post('min_salary'), 
      'max_salary' => $request->post('max_salary'), 
      'last_apply_date' => $request->post('last_apply_date'), 
      'post_visibility_date' =>  $post_date,
      'selected_gender' => $request->post('selected_gender'), 
      'prefered_age' => $request->post('prefered_age'),
      'job_post_info' =>$request->post('user_info'),
      'updated_at' => $current_date
    );
      $p_id=$request->post('org_post');//1
      if(DB::table('Organization_posts')->where(['post_id'=>$p_id])->update($j_post)){
       $info=DB::table('Organization_posts')->where(['post_id'=>$p_id])->first();
             $o_id=$info->company_id;//27
            //print_r($j_post);
             echo $current_date;
           }

      //start if city

           if($request->has('selected_city')){
            echo $value = count($_POST['selected_city']);

              //start 

            foreach($_POST['selected_city'] as $row){
                        //echo "Value".$row."<br/>\n";
              $cities[] = $row;
            }
            foreach($_POST['selected_type'] as $row){
                        //echo "Value".$row."<br/>\n";
              $types[] = $row;
            }
            foreach($_POST['selected_shift'] as $row){
                        //echo "Value".$row."<br/>\n";
              $shifts[] = $row;
            }
            for ($i=0; $i<$value ; $i++) {
                        // echo $cities[$i];
              $city_criteria=array(
               'city'=>$cities[$i],
               'job_type'=>$types[$i],
               'job_shift'=>$shifts[$i],
               'post_id'=>$p_id,
               'company_id'=>$o_id
             );
              DB::table('job_preferences')->insert($city_criteria);
            }
             //end
          }

      //end if city

      //start if qualification

          if($request->has('selected_qualificaltion')){

            $val_qual=count($_POST['selected_qualificaltion']);

            foreach($_POST['selected_qualificaltion'] as $row){
                      //echo "Value".$row."<br/>\n";
              $quals[] = $row;
            }
            
            foreach($_POST['req_degree'] as $row){
                      //echo "Value".$row."<br/>\n";
              $degrees[] = $row;
            }
            for ($i=0; $i<$val_qual ; $i++) {
                      // echo $cities[$i];
              $qual_criteria=array(
               'req_qualification'=>$quals[$i],
               'req_degree_level'=>$degrees[$i],
               'post_id'=>$p_id,
               'company_id'=>$o_id
             );
              DB::table('job_req_qualifications')->insert($qual_criteria);

            }
          }
          //return redirect('company-profile')->with('success','Your  Post Successfully Updated!');
          echo $p_id;
   }
   public function doUpdateBioPost(Request $request){
    //echo $request->post("update_bio");
    $bio=array(
      'company_info'=>$request->post("update_bio")
    );
    if(DB::table("add_organizations")->update($bio)){
     return redirect('company-profile')->with('success','Your  Bio Successfully Updated!');

    }
   }

   public function doUpdateOrgFront(Request $request){
    $current_date = date("Y.m.d h:i:s");
    $id= $request->session()->get("company_id");
    $up_organization=array(
      "company_name" => $request->post('new_company_name'),
      "company_type" => $request->post('new_selected_company_type'),
      "company_city" => $request->post('new_selected_city'),
      "company_branch" => $request->post('new_company_branch_name'),
      "company_phone" => $request->post('new_company_phone'),
      "company_website" => $request->post('new_company_website'),
      "company_employees" => $request->post('new_selected_employees'),
      "company_industry" => $request->post('new_selected_industry'),
      "company_since" => $request->post('new_company_since'),
      "company_location" => $request->post('new_company_location'),
      "updated_at" => $current_date
    );
    if(DB::table('Add_organizations')->where(['company_id'=>$id])->update($up_organization)){
      return redirect('company-profile')->with('success','Your Information Successfully Updated!');
     
    }
   }
  public function doUpdateOrgPassFront(Request $request){
  $current_pass=$request->post("y");
  $new_pass=$request->post("x");
  $id= $request->session()->get("company_id");
  $info= DB::table('Add_organizations')->where('company_id','=',$id)->select("company_password")->first();
       $pass=$info->company_password;
    if($current_pass == $pass){
        $for_up=array(
          "company_password" =>$new_pass
        );
        if(DB::table('Add_organizations')->where('company_id','=',$id)->update($for_up)){
          $data="yes";

          return $data;
        }
    }else{
      $error="no";

      return $error;
    }
  }
  public function doUpdateOrgEmailFront(Request $request){
  $current_pass=$request->post("y");
  $new_email=$request->post("x");
  $id= $request->session()->get("company_id");
  $info= DB::table('Add_organizations')->where('company_id','=',$id)->select("company_password")->first();
       $pass=$info->company_password;

        if($current_pass == $pass){
          $for_up=array(
            "company_email"=>$new_email
          );
          if(DB::table('Add_organizations')->where('company_id','=',$id)->update($for_up)){
              $data="yes";
              return $data;
          }
       }else{
        $error="no";
        return $error;
        }
  }

  public function doUploadOrgImgFront(Request $request){
     $id=$request->session()->get("company_id");
     $data = $request->image;
      
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        
        $data = base64_decode($data);
        $imageName = time().'.png';
        $destinationPath = 'uploads/organization_images/';
        $image = file_put_contents($destinationPath.$imageName,$data);
         $org_image= array(
            'company_img' => $imageName
          );
          $data = DB::table('upload_org_img')->where(['company_id'=>$id])->update($org_image);
        

        echo $imageName;
  }



  public function viewCompanyPublicProfile(Request $request){
    $id=$request->session()->get('company_id');
    $fetch_company=DB::table('Add_organizations')->where(['company_id'=>$id])->first();
    $fetch_posts=DB::table('organization_posts')->where(['company_id'=>$id])->simplePaginate(1);

    $fetch_company_social_links=DB::table('add_organization_social_link')->where(['organization_id'=>$id])->first();

    if($fetch_posts->count()>0){
       $fetch_posts=$fetch_posts;
    }else{
       $fetch_posts=$fetch_posts->count();
    }

    $about=DB::table('about_us_content')->first();
    $page_title="CareerSpoons - ".$fetch_company->company_name;
    return view('client_views.company_related_pages.company_public_profile',['about'=>$about,'fetch_company'=>$fetch_company,'fetch_posts'=>$fetch_posts,'company_social_links'=>$fetch_company_social_links,'page_title'=>$page_title]);

  }


  public function fetchFunctionalAreaMajors(Request $request){

    $area=$request->post('f_area');
    $info =DB::table('Add_major')->where(['area_title'=>$area])->get();
    //return $info;
    //foreach ($info as $key => $node) {
    //str_replace('_', '',$key->$node);
    // }
    return $info;
  }
  public function viewAllCompany(Request $request){
      $obj = new CompanyProfileModel();
      $org=$obj->fetch_all_companies();
      $fetch_citi=DB::table('Add_cities')->get();
      $name='';
      $city='';
      $page_title="CareerSpoons - Companies";
      return view("client_views.company_related_pages.allCompanies",['org'=>$org,'fetch_citi'=>$fetch_citi,'name'=>$name,'city'=>$city,'page_title'=>$page_title]);
  }
  

  public function viewCompanySingleProfile(Request $request,$id){
      
      $obj = new CompanyProfileModel();
      
    $fetch_company=DB::table('Add_organizations')->where(['company_id'=>$id])->first();
    $fetch_img=DB::table('upload_org_img')->where(['company_id'=>$id])->first();
    
    // Fetch All Details
    $fetch_posts=$obj->fetch_company_all_post($id);  // objects
    $post_counter = '0';
        
    $fetch_indus=$fetch_company->company_industry;
    $fetch_similar=DB::table('Add_organizations')->join('add_organization_social_link','Add_organizations.company_id','=','add_organization_social_link.organization_id')->where('Add_organizations.company_id','!=',$id)->where(['Add_organizations.company_industry'=>$fetch_indus])->select('Add_organizations.*','add_organization_social_link.*')->get();
    if($fetch_similar->count()>0){
       $fetch_similar=$fetch_similar;
    }else{
       $fetch_similar=$fetch_similar->count();
    }


    //dd($fetch_similar);


    $fetch_org_links=DB::table('add_organization_social_link')->where('organization_id','=',$id)->first();
    $us_id=$request->session()->get('id');
    $fetch_comments=DB::table('reviews_comments')->where('user_id','!=',$us_id)->where('company_id','=',$id)->count();

    if($fetch_comments>0){
     $fetch_comments=DB::table('reviews_comments')->join('user_profile_images','reviews_comments.user_id', '=', 'user_profile_images.candidate_id')->where('user_id','!=',$us_id)->where('company_id','=',$id)->inRandomOrder()->get();
     }
     //$fetch_comments=DB::table('reviews_comments')get();

    $page_title="CareerSpoons - ".$fetch_company->company_name;
     //dd($fetch_posts);
    return view("client_views.company_related_pages.single_company_profile",['fetch_company'=>$fetch_company,'fetch_posts'=>$fetch_posts,'$post_counter'=>$post_counter,'fetch_similar'=>$fetch_similar,'fetch_org_links'=>$fetch_org_links,'fetch_comments'=>$fetch_comments,'fetch_img'=>$fetch_img,'page_title'=>$page_title]);


  }


  public function loadCompanyJobs(Request $request){

      $obj = new CompanyProfileModel();
      $last_post_id  = $request->last_post_id;
      $company_id  = $request->org_id;
      $info = $obj->fetch_remaining_post($last_post_id,$company_id);
      if($info === 0){
          return "0";
      }else{
        foreach($info as $fetch_post){
      echo '<article id="post-show'.$fetch_post->post_id.'">
              <div class="brows-resume">
                <div class="row">
                  
                  <div class="col-md-4 col-sm-4">
                    <div class="brows-resume-name">
                      <h4 id="job_name'.$fetch_post->post_id.'">'.$fetch_post->job_title.'</h4>
                      <span class="brows-resume-designation">( <i id="industry-td'.$fetch_post->post_id.'">';
                      
                        
                        $fetch_post->req_industry= str_replace("_"," ",$fetch_post->req_industry);
                        echo $fetch_post->req_industry;

                      echo '</i>)</span>

                      <span class="cand-status"><i class="far fa-clock"></i> '; 

                        // $this->load->helper('date');
                        //client created date get from database
                       $date=$fetch_post->created_at;
                         $now= Carbon::now();
                         $dat=Carbon::parse($date);
                     
                       $days= $dat->diffInDays($now);
                       $hours= $dat->diffInHours($now);
                       $months= $dat->diffInMonths($now);
                       $years= $dat->diffInYears($now);
                       $minutes= $dat->diffInMinutes($now);
                      if($years > 1)
                      {
                        echo $years.' Years Ago.' ;
                      }
                      else if($years == 1)
                      {
                      echo $years.' Year Ago.' ;
                      }
                      else if($months > 1)
                      {
                        echo $months.' Months Ago.' ;
                      }
                      else if($months == 1)
                      {
                        echo $months.' Month Ago.' ;
                      }
                      else if($days > 1)
                      {
                        echo $days.' Days Ago.' ;
                      }
                      else if($days == 1)
                      {
                        echo $days.' Day Ago.' ;
                      }
                      else if($hours > 1)
                      {
                        echo  $hours.' Hours Ago.' ;
                      }
                      else if($hours == 1)
                      {
                        echo  $hours.' Hour Ago.' ;

                      }
                      else
                      {
                        echo $minutes.' Minutes Ago.' ;
                      }
                        


                       
                    echo '</span>

                    </div>
                  </div>
                  
                  <div class="col-md-4 col-sm-4">
                    <div class="brows-resume-name">
                      <span><i class="fas fa-user-plus" id="position-td'.$fetch_post->post_id.'">&nbsp; ';
                        

                          if($fetch_post->total_positions>1){

                      echo   $fetch_post->total_positions.' 
                       Positions' ;
                          }
                          else{
                            echo $fetch_post->total_positions.' Position' ;

                          } 

                        
                        echo '</i></span>
                    </div>
                  </div>

                                  

                  <div class="col-md-4 col-sm-4">
                    <div class="brows-resume-name" style="text-align: center;">
                      <span><i class="fa fa-yelp"></i>
                      Exp. 
                        <span id="exp-td'.$fetch_post->post_id.'">'.$fetch_post->job_experience.' Year</span></span>
                    </div>
                  </div>

                  

                </div>
                <div class="row extra-mrg row-skill">
                  <div class="browse-resume-skills">
                    <div class="col-md-9 col-sm-9">
                      <div class="br-resume" id="skill-tags">';
                       
                        $str_tag=explode(",", $fetch_post->job_skills);
                        $count_skill= count($str_tag);
                                                 for($i=0;$i<$count_skill;$i++){
                                                  echo "<span>".$str_tag[$i]."</span>";
                                                 }
                         
                        
                      echo '</div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                      <span class="resume-exp"><button type="button" class="btn btn-success" onclick="view_post_private('.$fetch_post->post_id.');" style="height: 25px;padding-top: 1px;">view</button></span>
                    </div>
                    
                  </div>
                </div>
              </div>
              <span class="tg-themetag tg-featuretag"><b>Posted At: '. date('d M',strtotime($fetch_post->created_at)) .' </b></span>
            </article>';
            $post_counter = $fetch_post->post_id; 
            $organization_id = $fetch_post->company_id;
          }
          echo '<div class="row" id="load-row">
                <a class="btn btn-success btn_more" id="btn_more" onclick="load_more_data('.$post_counter.','.$organization_id.');">Load More</a>
            </div>';
          }

  }


  public function addReviewComments(Request $request){
    // echo "nayab";
    // print_r($request->all());
  $id=$request->post("x");
  $name=$request->post("name");
  $email=$request->post("email");
  $comment=$request->post("comment");
  $u_id=$request->session()->get('id');
  $current_date = date("Y.m.d h:i:s");
  
  $comments=array(
    'user_id'=>$u_id,
    'user_name'=>$name,
    'user_email'=>$email,
    'user_comments'=>$comment,
    'company_id'=>$id,
    'created_at'=>$current_date,
    'updated_at'=>$current_date
  );
   //print_r($comments);
   if(DB::table('reviews_comments')->insert($comments)){
     echo $last=DB::getPdo()->lastInsertId();
    }
  

   }



   public function addCompanyRating(Request $request){

    $current_date = date("Y.m.d h:i:s");
    $request->rating_description=str_ireplace('<p>','',$request->rating_description);
    $request->rating_description=str_ireplace('</p>','',$request->rating_description);

    $company_response = array(
      'rating_points' => $request->rating,
      'review_description' => $request->rating_description,
      'updated_at' => $current_date
    );
    
    $obj =  new CompanyProfileModel();
    $info = $obj->company_update_reviews($request->session()->get('company_id'),$company_response); 

    if($info){
        $request->session()->forget('organization_rating');
      $request->session()->put('organization_rating',$request->rating);
        echo "yes";
    } 
    else{


    }    
   

   }

   public function deleteReviewComments(Request $request,$id){
    //$id=$request->post("id");
   $for= DB::table('reviews_comments')->where(['comment_id'=>$id])->first();
   $c_id=$for->company_id;
    if(DB::table('reviews_comments')->where(['comment_id'=>$id])->delete()){
    return redirect('single-company-profile/'.$c_id)->with('success',' Review Deleted Successfully!');
    }else{
      return redirect('single-company-profile/'.$c_id)->with('error',' Something Wents Wrong Plz Try Again!');
    }
  }
  public function modelReviewComments(Request $request){
   $id=$request->post("id");
   $info=DB::table('reviews_comments')->where(['comment_id'=>$id])->first();
   echo '  <!-- Modal -->
   <div class="modal fade" id="myModalcomment" role="dialog">
   <div class="modal-dialog modal-md">
   <div class="modal-content">
   <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h4 class="modal-title">Edit Your Comment Here..</h4>
   </div>
   <div class="modal-body" style="padding:5%;padding-top:10%;padding-bottom:15%;">
   <form>
   <div class="col-md-6 col-sm-6">
   <input type="text" class="form-control" name="n_name" id="n_name" placeholder="Your Name" value="'.$info->user_name.'">
   </div>
   <div class="col-md-6 col-sm-6">
   <input type="email" class="form-control" name="n_email" id="n_email" placeholder="Your Email" value="'.$info->user_email.'">
   </div>
   <div class="col-md-12 col-sm-12">
   <textarea class="form-control" placeholder="Comment" name="n_comment" id="n_comment">'.$info->user_comments.'</textarea>
   </div>
   <div class="col-md-12 col-sm-12">
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   <button type="button" onclick="save_updates('.$id.');" class="btn btn-success" data-dismiss="modal">Save Changes</button>
   </div>
      </form>
   </div>

   </div>
   </div>
   </div>
   </div>';
 }

 public function editReviewComments(Request $request){
  $current_date = date("Y.m.d h:i:s");
  $id= $request->post("id");
  $name= $request->post("n");
  $email= $request->post("e");
  $comment= $request->post("c");
  $update_arr=array(
    'user_name'=>$name,
    'user_email'=>$email,
    'user_comments'=>$comment,
    'updated_at'=>$current_date
  );
  if(DB::table('reviews_comments')->where(['comment_id'=>$id])->update($update_arr)){
   echo "yes";
  }
 }

public function dofetchingCityMap(Request $request){
   $id=$request->session()->get('company_id');
    $fetch_org=DB::table('Add_organizations')->where(['company_id'=>$id])->first();
    $address =$fetch_org->company_location." ".$fetch_org->company_city; // Google HQ
    $pAddr = str_replace(' ','_',$address);
    $prepAddr = str_replace(' ','+',$address);
    $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyAJjtzMZotb60YwDCSgUSmsj4i4oGFZLjQ');
    // https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=YOUR_API_KEY

    $output= json_decode($geocode);
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;
     // echo "latitude - ".$latitude;
     // echo "longitude - ".$longitude;
    echo $latitude." ".$longitude." ".$pAddr;
    

}

public function dofetchingsingleCityMap(Request $request){
    $id = request()->post('id');
    $fetch_org=DB::table('Add_organizations')->where(['company_id'=>$id])->first();
    $address =$fetch_org->company_location." ".$fetch_org->company_city; // Google HQ
    $pAddr = str_replace(' ','_',$address);
    $prepAddr = str_replace(' ','+',$address);
    $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyAJjtzMZotb60YwDCSgUSmsj4i4oGFZLjQ');
    // https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=YOUR_API_KEY

    $output= json_decode($geocode);
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;
     // echo "latitude - ".$latitude;
     // echo "longitude - ".$longitude;
    echo $latitude." ".$longitude." ".$pAddr;
    

}

public function uploadCompanyLogo(Request $request){

    $data= $request->session()->get('company_name');
    $file = $request->file('upload_company_logo');
    $new_name = $data.'.'.rand();
    $destination='uploads/client_site/company_advertised_logo/';
    $file->move($destination,$new_name);
    $current_date = date("Y.m.d h:i:s");
    

    $company_id =  $request->session()->get('company_id');
  
    $company_response = array(
      'company_logo' => $new_name,
      'company_logo_submitted' => '1',
      'created_at' => $current_date
    );  

    $obj = new CompanyProfileModel();
    $info=$obj->update_company_profile_advertise_logo($company_id,$company_response); 

    if($info){

      $request->session()->forget("company_adverised_logo");
      $request->session()->put("company_adverised_logo","1");
      return redirect('company-profile')->with('success','Your Logo is  Uploaded Successfully!');
    }

    else{

      return redirect('company-profile')->with('return','File Not Upload Successfully!');
    }

}


}
