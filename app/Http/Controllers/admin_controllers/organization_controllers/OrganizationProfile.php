<?php

namespace App\Http\Controllers\admin_controllers\organization_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrganizationProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOrganizationProfile($id)
    {


     $org_page=DB::table('Add_organizations')->where(['company_id'=> $id])->first();
     $org_post=DB::table('organization_posts')->where(['company_id'=> $id])->get();
     $org_IMG=DB::table('upload_org_img')->where(['company_id'=> $id])->first();
     $city=DB::table('Add_cities')->get();
     $industry=DB::table('Company_industries')->get();
     $degree=DB::table('Add_degreelevel')->get();
     $major=DB::table('Add_major')->get();
     $area=DB::table('Add_functionalarea')->get();
     $qual=DB::table('Add_qualification')->get();

     if($org_page){
      return view('admin_views/Organization_views/organization_profile',['org_page'=>$org_page,'org_post'=>$org_post,'org_IMG'=>$org_IMG,'city'=>$city,'industry'=>$industry,'degree'=>$degree,'major'=>$major,'area'=>$area,'qual'=>$qual]);
    }
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doCompanyPost(Request $request){
      date_default_timezone_set("Asia/Karachi");
      $current_date = date("Y.m.d h:i:s");
      $job_post= array(
        'company_id' => $request->post('x'),
        'org_contact_phone' => $request->post('a'), 
        'org_contact_email' => $request->post('b'), 
        'posted_job_title' => $request->post('c'), 
        'career_level' => $request->post('d'), 
        'job_experience' => $request->post('e'), 
        'job_salary' => $request->post('f'), 
        'job_skills' => $request->post('g'), 
        'job_tags' => $request->post('h'), 
        'gender_preferences' => $request->post('i'), 
        'job_info' => $request->post('j'), 
        'created_at' => $current_date,
        'updated_at' => $current_date
      );
      if(DB::table('organization_posts')->insert($job_post)){
        echo "yes";
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteOrgPost(Request $request)
    {
     $id= $request->post('id');
     if(DB::table('organization_posts')->where(['post_id' => $id])->delete()){
      echo "yes";
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadOrgPic(Request $request)
    {
     // echo "yes";
     $id=$request->segment(3);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchCitiesPreferences(Request $request)
    {
      $city=DB::table('Add_cities')->get();
      $random_value = rand();
      echo '<div id="fields'.$random_value.'"><div class="form-group col-sm-3">
      <label>City:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-flag"></i>
      </div>
      <select name="selected_city[]" class="form-control" placeholder="select Career" id="selected_city[]">
      <option value="" disabled="disabled" selected="selected">Select City</option>';
      foreach($city as $city){
        echo '<option value="'.$city->company_city_name.'">'.$city->company_city_name.'</option>';
      }
      echo ' </select>
      </div>
      </div>
      <!-- Job type -->
      <div class="form-group col-sm-3">
      <label>Job Type:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-barcode"></i>
      </div>
      <select name="selected_type[]" class="form-control" placeholder="select Job Type" id="selected_type[]">
      <option value="" disabled="disabled" selected="selected">Select Type</option>
      <option value="Full Time">Full Time</option>
      <option value="Part Time">Part Time</option>
      </select>
      </div>
      </div>
      <!-- job shift-->
      <div class="form-group col-sm-3">
      <label>Job Shift:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-barcode"></i>
      </div>
      <select name="selected_shift[]" class="form-control" placeholder="select Shift" id="selected_shift[]">
      <option value="" disabled="disabled" selected="selected">Select Shift</option>
      <option value="Morning Shift">Morning Shift</option>
      <option value="Night Shift">Night Shift</option>
      </select>
      </div>
      </div>
      <div class="form-group col-sm-3">
      <div class="input-group paren">

      <div class="chil"><a onclick="del_field('.$random_value.');"><i class="fa fa-close"></i></a>
      </div>
      </div>
      </div><div class="clearfix"></div></div>';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchqualPreferences(Request $request)
    {
      $random_value = rand();
      $degree=DB::table('Add_degreelevel')->get();
      $major=DB::table('Add_major')->get();
      $qual=DB::table('Add_qualification')->get();
      echo '<div id="fields'.$random_value.'">
      <div class="form-group col-sm-4">
      <label>Required Qualification:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-globe"></i>
      </div>
      <select name="selected_qualificaltion[]" class="form-control" id="selected_qualification[]">
      <option value="select gender preferences" disabled="disabled" selected="selected">Select Qualification</option>';
      foreach($qual as $qual):
        echo '<option value="'.$qual->qualification_title.'">'.$qual->qualification_title.'</option>';
      endforeach;
      echo '</select>
      </div>
      </div>
      <!---majors --->
      <!-- required degree level-->
      <div class="form-group col-sm-4">
      <label>Required Degree Level:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-mortar-board"></i>
      </div>

      <select name="req_degree[]" class="form-control" id="req_degree[]">
      <option value="select Degree" disabled="disabled" selected="selected">Select Degree Level</option>';
      foreach($degree as $degree):
        echo '<option value="'.$degree->degree_title.'">'.$degree->degree_title.'</option>';
      endforeach;
      echo '</select>
      </div>
      </div>

      <div class="form-group col-sm-4">
      <div class="input-group paren">

      <div class="chil"><a onclick="del_field('.$random_value.');"><i class="fa fa-close"></i></a>
      </div>
      </div>
      </div><div class="clearfix"></div></div>';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doCompanyPostData(Request $request)
    {
      date_default_timezone_set("Asia/Karachi");
      $current_date = date("Y.m.d h:i:s");
      $post_dat = $request->post('last_apply_date');
      $post_date=(strtotime($post_dat. ' + 1 days'));
      $job_post= array(
        'company_id' => $request->post('org_id'),
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
        'job_post_info' =>$request->post('company_info'),
        'post_status' =>"Active",
        'created_at' => $current_date,
        'updated_at' => $current_date
      );
      DB::table('Organization_posts')->insert($job_post);
      $id=DB::getPdo()->lastInsertId();
      $comp_id=$request->post('org_id');
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
           'company_id'=>$comp_id
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
           'company_id'=>$comp_id
         );
          DB::table('job_req_qualifications')->insert($qual_criteria);
        }
      }

      
      //echo $id;
      
       return redirect('organization-profile/'.$comp_id)->with('success','Your  Post Successfully Added!');
       
    }


    public function doUpdateProfile(Request $request){
      $id = $request->post('x');
      $job=DB::table('organization_posts')->where(['post_id' => $id])->first();
      $areas=$job->functional_area;
      $area_majors=DB::table('Add_major')->where(['area_title' => $areas])->get();
      $job_qual=DB::table('job_req_qualifications')->where(['post_id' => $id])->get();
      $count_qual=DB::table('job_req_qualifications')->where(['post_id' => $id])->count();
      $job_pre=DB::table('job_preferences')->where(['post_id' => $id])->get();
      $count_pre=DB::table('job_preferences')->where(['post_id' => $id])->count();
      $city=DB::table('Add_cities')->get();
      $industry=DB::table('Company_industries')->get();
      $degree=DB::table('Add_degreelevel')->get();
      $major=DB::table('Add_major')->get();
      $area=DB::table('Add_functionalarea')->get();
      $qual=DB::table('Add_qualification')->get();
        //print_r($job);
       // print_r($job_qual);
        //print_r($job_pre);

      echo '<div id="mymodalpost" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">

      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="myModalLabel">Alter Organization Information</h4>
      </div>
      <div class="modal-body">

      <form id="info_post">
      <input type="hidden" name="org_post" id="org_post" value="'.$id.'">
      <div class="form-group col-sm-12">
      <label>Job Title:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="glyphicon glyphicon-tree-conifer"></i>
      </div>
      <input type="text" class="form-control" placeholder="Enter Job Title" name="u_posted_job_title" id="u_posted_job_title" value="'.$job->job_title.'">
      </div>     
      </div>
      <!-- Skills -->
      <div class="form-group col-sm-12">
      <label>What Skills are Required for Job?:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="glyphicon glyphicon-subscript"></i>
      </div>
      <input name="tags" id="modal_skill_tags" class="tags form-control" value="'.$job->job_skills.'"/>
      
      </div>     
      </div>



      <!-- Functional Area job-->
      <div class="form-group col-sm-6">
      <label>Functional Area:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-users"></i>
      </div>
      <select name="n_req_functional_area" class="form-control" placeholder="Select Functional Area" id="n_req_functional_area" onchange="n_select_major();">
      <option value="'.$job->functional_area.'" selected="selected">'.$job->functional_area.'</option>';
      foreach($area as $a):
        echo '<option value="'.$a->area_title.'">'.$a->area_title.'</option>';
      endforeach;
      echo '</select>
      </div>
      </div>
      <!-- Search Result Title-->
        <div class="form-group col-sm-6">
        <label>Majors:</label>
        <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-trophy"></i>
        </div>

        <select name="n_req_major" class="form-control" placeholder="Select Functional Area" id="n_req_major">
      <option value="'.$job->req_major.'" selected="selected">'.$job->req_major.'</option>';
      foreach($area_majors as $m):
        echo '<option id="industry-option" value="'.$m->major_title.'">'.$m->major_title.'</option>';
      endforeach;
      echo '</select>
         <!--<input type="text" disabled="disabled" class="form-control" value="/*$quali->req_majors*/"/>-->';


        echo '
        </div>
        </div>
      <!-- Industry job-->
      <div class="form-group col-sm-6">
      <label>Industry:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-building"></i>
      </div>
      <select name="req_industry" class="form-control" placeholder="select Industry" id="req_industry">
      <option value="'.$job->req_industry.'" selected="selected">'.$job->req_industry.'</option>';
      foreach($industry as $in):
        echo '<option value="'.$in->company_industry_name.'">'.$in->company_industry_name.'</option>';
      endforeach;

      echo '</select>

      </div>
      </div>
      <!-- Career Level-->
      <div class="form-group col-sm-6">
      <label>Required Career Level for This Job:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fas fa-level-up"></i>
      </div>
      <select name="req_career_level" class="form-control" placeholder="select Career" id="req_career_level">
      <option value="'.$job->req_career_level.'" selected="selected" hidden="hidden">'.$job->req_career_level.'</option>
      <option value="Entry Level">Entry Level</option>
      <option value="Intermediate">Intermediate</option>
      <option value="Experienced Professional">Experienced Professional</option>
      <option value="Department Head">Department Head</option>
      <option value="Gm / CEO / Country Head">Gm / CEO / Country Head</option>
      </select>
      </div>
      </div>

      <!-- Ciities criteria-->
      <div class="bg">';
//for($i=1; $i<=$count_pre; $i++){
      foreach ($job_pre as $pre):
        echo '<div id="Cityfields'.$pre->job_preferences_id.'">
        <div class="form-group col-sm-3">
        <label>City:</label>
        <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-flag"></i>
        </div>

        <input type="text" disabled="disabled" class="form-control" selected="selected" value="'.$pre->city.'"/>';
        // foreach($city as $c):
        //   echo '<option value="'.$c->company_city_name.'">'.$c->company_city_name.'</option>';
        // endforeach;

        echo '
        </div>
        </div>

        <!-- Job type -->

        <div class="form-group col-sm-3">
        <label>Job Type:</label>
        <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-barcode"></i>
        </div>
        
        <input type="text" class="form-control" disabled="disabled" value="'.$pre->job_type.'"/>

        </div>
        </div>
        <!-- job shift-->
        <div class="form-group col-sm-3">
        <label>Job Shift:</label>
        <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-barcode"></i>
        </div>
        
        <input type="text" disabled="disabled" class="form-control" value="'.$pre->job_shift.'"/>
        
        </div>
        </div>
        <!------>
        <div class="form-group col-sm-3">
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

      echo '      <div class="form-group col-sm-3">
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
      <!-- Experience for job -->
      <div class="form-group col-sm-4">
      <label>Year of Experience Required:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-external-link"></i>
      </div>
      <input type="number" placeholder="Enter Required Experience" class="form-control" name="job_exp_req" id="job_exp_req" value="'.$job->job_experience.'">
      </div>
      </div>

      <!-- Search Result Title-->
      <div class="form-group col-sm-4">
      <label>Total Positions:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-sort-amount-asc"></i>
      </div>

      <input id="total_positions" name="total_positions" type="number" class="tags form-control" placeholder="Enter in Numbers" value="'.$job->total_positions.'"/>
      </div>
      </div>
      <!-- Search Result Title-->
      <div class="form-group col-sm-4">
      <label>Working Hours:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-clock-o"></i>
      </div>

      <input id="working_hour" name="working_hour" type="number" class="tags form-control" placeholder="Enter hours in Numbers" value="'.$job->working_hours.'"/>
      </div>
      </div>
      <!-- Search Result Title-->
      <div class="form-group col-sm-6">
      <label>Minimum Salary:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-dollar"></i>
      </div>
      <input id="min_salary" name="min_salary" type="number" class="tags form-control" placeholder="just Enter Amount" value="'.$job->min_salary.'"/>
      </div>
      </div>
      <!-- Search Result Title-->
      <div class="form-group col-sm-6">
      <label>Maximum Salary:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-dollar"></i>
      </div>

      <input id="max_salary" name="max_salary" type="number" class="tags form-control" placeholder="just Enter Amount" value="'.$job->max_salary.'"/>
      </div>
      </div>
      <!-- Search Result Title-->
      <div class="form-group col-sm-6">
      <label>Last Apply Date:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-calendar-o"></i>
      </div>

      <input id="modal_last_date" name="last_apply_date" type="date" class="form-control" placeholder="select date" data-theme="my-style" data-format="S F, Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en" data-default-date="'.$job->last_apply_date.'"/>
      </div>
      </div>
      <!-- Search Result Title
      <div class="form-group col-sm-6">
      <label>Post visibility Date:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-calendar-o"></i>
      </div>

      <input type="date" id="modal_post_visible" name="post_visibility_date" placeholder="select date" class="form-control" data-theme="my-style" data-format="S F, Y" data-large-mode="true" data-min-year="1970" data-max-year="2030" data-translate-mode="true" data-lang="en" data-default-date="'.$job->post_visibility_date.'">


      </div>
      </div>-->
      <!-- Search Result Title-->
      <div class="form-group col-sm-6">
      <label>Gender Preferences:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-female"></i>
      </div>
      <select name="selected_gender" class="form-control" id="selected_gender">
      <option value="'.$job->selected_gender.'" selected="selected">'.$job->selected_gender.'</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="None">None</option>
      </select>
      </div>
      </div>
      <!-- Search Result Title-->
      <div class="form-group col-sm-6">
      <label>Prefered Age Group:</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-birthday-cake"></i>
      </div>

      <input id="prefered_age" name="prefered_age" type="text" class="tags form-control" placeholder="Enter Prefered Age Group (20 to 25)" value="'.$job->prefered_age.'"/>
      </div>
      </div>
      <!--Career criteria -->
      <div class="bg">';
      foreach ($job_qual as $quali):
        echo '<div id="fields'.$quali->job_qual_id.'"><!-- Search Result Title-->
        <div class="form-group col-sm-4">
        <label>Required Qualification:</label>
        <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-globe"></i>
        </div>
        
        <input type="text" class="form-control" value="'.$quali->req_qualification.'" disabled="disabled" class="form-control"/>';


        echo '
        </div>
        </div>
        
        <!-- required degree level-->
        <div class="form-group col-sm-4">
        <label>Required Degree Level:</label>
        <div class="input-group">
        <div class="input-group-addon">
        <i class="fa fa-mortar-board"></i>
        </div>

        
        <input type="text" value="'.$quali->req_degree_level.'" disabled="disabled" class="form-control"/>';


        echo '
        </div>
        </div>
        <!------>
        <div class="form-group col-sm-4">
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
      <!-- About Job -->
      <div class="form-group col-sm-12">
      <label>Job Description:</label>
      <div class="input-group col-sm-12">
      <textarea  class="form-control" name="user_info" id="user_info" rows="4">'.$job->job_post_info.'</textarea>
      </div>
      </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" onclick="update_post_info('.$id.');">Save Changes</button>
      </div>
      </form>

      </div>
      </div>
      </div>';


    }

    public function delQualFields(Request $request){
     $id = $request->post('x');
     if(DB::table('job_req_qualifications')->where(['job_qual_id' => $id])->delete()){
       echo $id;
     }
   }
   public function delCityFields(Request $request){
     $id = $request->post('x');
     if(DB::table('job_preferences')->where(['job_preferences_id' => $id])->delete()){
       echo $id;
     }
   }

   public function doUpdatePostData(Request $request){
    $post_dat = $request->post('last_apply_date');
    $post_date=(strtotime($post_dat. ' + 1 days'));
    date_default_timezone_set("Asia/Karachi");
    $current_date = date("Y.m.d h:i:s");
    $j_post= array(
      'job_title' => $request->post('u_posted_job_title'), 
      'job_skills' => $request->post('tags'), 
      'functional_area' => $request->post('n_req_functional_area'),
      'req_major' => $request->post('n_req_major'),
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
      'job_post_info' =>$request->post('user_info'),
      'post_status' =>"Active",
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

    //end if qualification



   // print_r($j_post);
        }
        public function viewPostData(Request $request){
         $id = $request->post('x');
         $name = $request->post('y');      
         $job=DB::table('organization_posts')->where(['post_id' => $id])->first();
         $job_qual=DB::table('job_req_qualifications')->where(['post_id' => $id])->get();
      //$count_qual=DB::table('job_req_qualifications')->where(['post_id' => $id])->count();
         $job_pre=DB::table('job_preferences')->where(['post_id' => $id])->get();
      //$count_pre=DB::table('job_preferences')->where(['post_id' => $id])->count();
         echo '  <div id="mymodalview" class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-lg">
         <div class="modal-content">

         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
         </button>
         <h4 class="modal-title text-center" id="myModalLabel">View Organization Post Information</h4>
         </div>
         <div class="modal-body">
         <h2 class="page-title text-center model-head" id="myModalLabel">'.$name.'</h2>
<div class="row">
<div class="col-sm-12">
 <ul class="list-unstyled text-center pl-5">
         <li><strong class="heading" style="display:inline-block;"> Post Title: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->job_title.'</p></li>
         </ul>
</div>
<div class="col-sm-12">
 <ul class="list-unstyled text-center pl-5 pt-3">
 <hr/>
         <li><strong class="heading" style="display:inline-block;"> Job Requirements: &nbsp; </strong></li>
         </ul>
         <br/>
</div>
<div class="col-sm-6">
         <ul class="list-unstyled text-left pl-5" style="padding-left:40%;">
          <li><strong class="heading" style="display:inline-block;"> Post Skills: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->job_skills.'</p></li>
         <li><strong class="heading" style="display:inline-block;"> Functional Area: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->functional_area.'</p></li>
         <li><strong class="heading" style="display:inline-block;"> Industry: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->req_industry.'</p></li>
         <li><strong class="heading" style="display:inline-block;"> Prefered Gender: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->selected_gender.'</p></li>
          <li><strong class="heading" style="display:inline-block;"> Post visibility Date: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->post_visibility_date.'</p></li>
          <li><strong class="heading" style="display:inline-block;"> Required Age Group: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->prefered_age.'</p></li>
         
         

         </ul>



                      
                      
</div>
<div class="col-sm-6">
<ul class="list-unstyled text-left pl-5" style="padding-left:10%;">
        <li><strong class="heading" style="display:inline-block;"> Required Career Level: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->req_career_level.'</p></li>
         <li><strong class="heading" style="display:inline-block;"> Required Experience: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->job_experience.'</p></li>
         <li><strong class="heading" style="display:inline-block;"> Total Positions: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->total_positions.'</p></li>
         <li><strong class="heading" style="display:inline-block;"> Working Hours: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->working_hours.'</p></li>
         <li><strong class="heading" style="display:inline-block;">Salary: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->min_salary.' to '.$job->max_salary.'</p></li>
         <li><strong class="heading" style="display:inline-block;"> last Apply Date: &nbsp; </strong><p class="info-text" style="display:inline-block;">'.$job->last_apply_date.'</p></li>
</u>
</div>
<div class="col-sm-12">
 <ul class="list-unstyled text-center pl-5">
 <hr/>
 <br/>

         <li><strong class="heading" style="display:inline-block;"> Job Description: &nbsp; </strong></li>
         </ul>
         <br/>
</div>
<div class="form-group col-sm-8 col-md-offset-2">
                      <div class="input-group col-sm-12">

                        <textarea rows="8" name="user_info" id="user_info" disabled="disabled">'.$job->job_post_info.'</textarea>
                      </div>
                    </div>



         

         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
         </div>
         </div>
         </div>
         </div>';
       }

public function doOrgUpdatePass(Request $request){
        $existing_pass=$request->post('x');
        $new_pass=$request->post('y');

        $id= $request->post('id');
       $info= DB::table('Add_organizations')->where('company_id','=',$id)->select("company_password")->first();
       $pass=$info->company_password;

        if($existing_pass == $pass){
        $for_up=array(
          "company_password" =>$new_pass
        );
        if(DB::table('Add_organizations')->where('company_id','=',$id)->update($for_up)){
            $data="successfully updated";

        return $data;
        }

       }else{
        $error="**invalid password";

        return $error;
       }
}

public function doOrgUpdateEmail(Request $request){
        $existing_pass=$request->post('x');
        $new_email=$request->post('y');

        $id= $request->post('id');
       $info= DB::table('Add_organizations')->where('company_id','=',$id)->select("company_password")->first();
       $pass=$info->company_password;

        if($existing_pass == $pass){
        $for_up=array(
          "company_email"=>$new_email
        );
        if(DB::table('Add_organizations')->where('company_id','=',$id)->update($for_up)){
            $data="successfully updated";

        return $data;
        }

       }else{
        $error="**invalid password";

        return $error;
    }
}

function doFetchMajors(Request $request){
 $area=$request->post('area');
 $info =DB::table('Add_major')->where(['area_title'=>$area])->get();
  return $info;
}

function changePostStatus(Request $request){
 echo $id=$request->post('id');
  $status=$request->post('x');
  $post=array(
    'post_status'=>$status
  );
if(DB::table('Organization_posts')->where(['post_id'=>$id])->update($post)){
echo "yes";
}


}




     }
