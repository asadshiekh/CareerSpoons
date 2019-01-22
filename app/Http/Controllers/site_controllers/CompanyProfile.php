<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CompanyProfile extends Controller
{
    public function viewCompanyProfile(Request $request){
        $fetch_city=DB::table('Add_cities')->get();
        $industry=DB::table('company_industries')->get();
        $id=$request->session()->get('company_id');
        $degree=DB::table('Add_degreelevel')->get();
        $major=DB::table('Add_major')->get();
        $area=DB::table('Add_functionalarea')->get();
        $qual=DB::table('Add_qualification')->get();
        $fetch_org=DB::table('Add_organizations')->where(['company_id'=>$id])->first();
        $fetch_post=DB::table('organization_posts')->where(['company_id'=>$id])->get();
        $fetch_pic=DB::table('upload_org_img')->where(['company_id'=>$id])->first();
        $fetch_links=DB::table('add_organization_social_link')->where(['organization_id'=>$request->session()->get('company_id')])->first();
        
    	return view('client_views.company_related_pages.company_profile',['fetch_city'=>$fetch_city,'fetch_org'=>$fetch_org,'fetch_pic'=>$fetch_pic,'industry'=>$industry,'industry1'=>$industry,'degree'=>$degree,'major'=>$major,'area'=>$area,'qual'=>$qual,'fetch_post'=>$fetch_post,'fetch_links'=>$fetch_links]);
    }
    public function PreferencesCitiesData(){
      $city=DB::table('Add_cities')->get();
      $random_value = rand();
      echo '<div id="fields'.$random_value.'">
      <div class="col-md-3 col-sm-6">
      <label>Where You need Employee:</label>
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
          return redirect('company-profile')->with('success','Information Added Successfully!');
          
        }
      }
  }

  public function frontOrgPostJob(Request $request){
      
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
        'post_visibility_date' => $request->post('post_visibility_date'),
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



}
