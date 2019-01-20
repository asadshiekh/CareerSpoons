<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CompanyProfile extends Controller
{
    public function viewCompanyProfile(Request $request){
        $fetch_city=DB::table('Add_cities')->get();
        $id=$request->session()->get('company_id');
        $fetch_org=DB::table('Add_organizations')->where(['company_id'=>$id])->first();
        $fetch_pic=DB::table('upload_org_img')->where(['company_id'=>$id])->first();
    	return view('client_views.company_related_pages.company_profile',['fetch_city'=>$fetch_city,'fetch_org'=>$fetch_org,'fetch_pic'=>$fetch_pic]);
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
}
