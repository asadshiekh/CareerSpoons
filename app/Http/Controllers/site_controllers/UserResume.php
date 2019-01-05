<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Resumes\User_Resume_Model;
use App\SiteModel\User\UserRegisteration;
use DB;
class UserResume extends Controller
{
	public function manageUserResume(){


		return view('client_views.resume_related_pages.make_resume');
	}

	public function uploadResume(Request $request){

      //  $file = $request->file('resume');
      // // Display File Name
      // echo 'File Name: '.$file->getClientOriginalName();
      // echo '<br>';

      // //Display File Extension
      // echo 'File Extension: '.$file->getClientOriginalExtension();
      // echo '<br>';

      // //Display File Real Path
      // echo 'File Real Path: '.$file->getRealPath();
      // echo '<br>';

      // //Display File Size
      // echo 'File Size: '.$file->getSize();
      // echo '<br>';

      // //Display File Mime Type
      // echo 'File Mime Type: '.$file->getMimeType();

      // // Move Uploaded File
      // $destinationPath = 'uploads';
      // $file->move($destinationPath,$file->getClientOriginalName());

		$file = $request->file('resume');
		$new_name = rand().'.'.$file->getClientOriginalName();
		$destination='uploads/client_site/user_upload_resume';
		$file->move($destination,$new_name);

		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'user_id' => $request->session()->get('id'),
			'user_email' => $request->session()->get('user_email'),
			'destination' => $destination,
			'uploaded_resume' => $new_name,
			'created_at' => $current_date
		);


		$obj =  new User_Resume_Model();
		$resume_response = $obj->uploaded_user_resume($user_response);


		if($resume_response){

			$user_obj =  new UserRegisteration();
			$info = $user_obj->update_user_resumeStatus($request->session()->get('id'));
			$request->session()->forget('cv_status');
			session(['cv_status' => '1']);
			$request->session()->flash('user_cv_status_flash', true);
			return redirect('user-profile');	

		}

		else{


			return redirect('user-profile');
		}

	}

	public function index(){

		return view('client_views.index');
	}

	public function addUserEduction(Request $request){

		$current_date = date("Y.m.d h:i:s");
		$request->edu_description=str_ireplace('<p>','',$request->edu_description);
		$request->edu_description=str_ireplace('</p>','',$request->edu_description);
		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'degree_title' => $request->degree_title,
			'degree_level' => $request->degree_level,
			'Institute_name' => $request->institute_name,
			'institute_location' => $request->institute_location,
			'edu_start' => $request->edu_start,
			'edu_end' =>$request->edu_end,
			'majors' => $request->majors,
			'selected_result' => $request->selected_result,
			'cgpa' => $request->CGPA,
			'percentage' => $request->Percentage,
			'edu_description' => $request->edu_description,
			'created_at' => $current_date
		);

		$obj =  new User_Resume_Model();




		// Check User Profile Strenght Value

		$edu_status  = $obj->check_profile_strength($request->session()->get('id'));

		if($edu_status->education_category=="0"){

			$user_response2 = array(
				'education_category' =>"1",
				'education_value' => "20",
				'updated_at' => $current_date
			);		

			$obj->update_profile_strength($user_response2,$request->session()->get('id'));

		}


		// Add Eduction Process

		$info = $obj->add_eduction($user_response);

		if($info){

			$id=DB::getPdo()->lastinsertId();
			echo $id;
		}

		else{

			
		}

	}


	public function addUserExperience(Request $request){

		$request->exp_description=str_ireplace('<p>','',$request->exp_description);
		$request->exp_description=str_ireplace('</p>','',$request->exp_description);
		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'job_title' => $request->job_title,
			'company_name' => $request->company_name,
			'ref_email' => $request->ref_email,
			'ref_phone' => $request->ref_phone,
			'your_position' => $request->your_position,
			'exp_start' =>$request->exp_start,
			'exp_end' => $request->exp_end,
			'exp_description' => $request->exp_description,
			'created_at' => $current_date
		);

		$obj =  new User_Resume_Model();



		// Check User Profile Strenght Value

		$edu_status  = $obj->check_profile_strength($request->session()->get('id'));

		if($edu_status->experience_category=="0"){

			$user_response2 = array(
				'experience_category' =>"1",
				'experience_value' => "20",
				'updated_at' => $current_date
			);		

			$obj->update_profile_strength($user_response2,$request->session()->get('id'));

		}


		// Add Experience

		$info = $obj->add_experience($user_response);

		// print_r($info);

		if($info){

			$id=DB::getPdo()->lastinsertId();
			echo $id;

		}

		else{

			
		}
	}


	public function addUserProject(Request $request){

		$request->project_description=str_ireplace('<p>','',$request->project_description);
		$request->project_description=str_ireplace('</p>','',$request->project_description);
		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'project_title' => $request->project_title,
			'project_company_name' => $request->project_company_name,
			'project_ref_email' => $request->project_ref_email,
			'project_ref_phone' => $request->project_ref_phone,
			'your_porject_position' => $request->your_porject_position,
			'pro_start' =>$request->pro_start,
			'pro_end' => $request->pro_end,
			'project_description' => $request->project_description,
			'created_at' => $current_date
		);


		$obj =  new User_Resume_Model();



		// Check User Profile Strenght Value

		$edu_status  = $obj->check_profile_strength($request->session()->get('id'));

		if($edu_status->project_category=="0"){

			$user_response2 = array(
				'project_category' =>"1",
				'project_value' => "20",
				'updated_at' => $current_date
			);		

			$obj->update_profile_strength($user_response2,$request->session()->get('id'));

		}



		//  Add Project 

		$info = $obj->add_project($user_response);


		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}


	public function addUserSkill(Request $request){


		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'skill_name' => $request->skill_name,
			'skill_percentage' => $request->skill_percentage,
			'created_at' => $current_date
		);


		// print_r($user_response);

		$obj =  new User_Resume_Model();


		// Check User Profile Strenght Value

		$edu_status  = $obj->check_profile_strength($request->session()->get('id'));

		if($edu_status->skill_category=="0"){

			$user_response2 = array(
				'skill_category' =>"1",
				'skill_value' => "20",
				'updated_at' => $current_date
			);		

			$obj->update_profile_strength($user_response2,$request->session()->get('id'));

		}



		// Add Skill
		$info = $obj->add_skill($user_response);

		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}


	public function addUserLanguage(Request $request){


		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'user_language' => $request->user_language,
			'created_at' => $current_date
		);

		$obj =  new User_Resume_Model();
		$info = $obj->add_language($user_response);

		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}

	public function addUserHobbies(Request $request){


		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'user_hobbies' => $request->user_hobbies,
			'created_at' => $current_date
		);


		$obj =  new User_Resume_Model();



		// Check User Profile Strenght Value

		$edu_status  = $obj->check_profile_strength($request->session()->get('id'));

		if($edu_status->hobbies_category=="0"){

			$user_response2 = array(
				'hobbies_category' =>"1",
				'hobbies_value' => "20",
				'updated_at' => $current_date
			);		

			$obj->update_profile_strength($user_response2,$request->session()->get('id'));

		}

		// Add Hobbies
		$info = $obj->add_hobbies($user_response);

		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}

	public function addUserResumeInfo(Request $request){

		$request->editor1=str_ireplace('<p>','',$request->editor1);
		$request->editor1=str_ireplace('</p>','',$request->editor1);

		$dateOfBirth = $request->candidate_dob;
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');
		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_name' => $request->candidate_name,
			'candidate_profession' => $request->candidate_profession,
			'candidate_number' => $request->candidate_number,
			'candidate_city' => $request->candidate_city,
			'candidate_location' => $request->candidate_location,
			'candidate_dob' => $request->candidate_dob,
			'candidate_age' => $age,
			'candidate_website' => $request->candidate_website,
			'candidate_gender' => $request->candidate_gender,
			'candidate_career_level' => $request->candidate_career_level,
			'candidate_degree_level' => $request->candidate_degree_level,
			'candidate_resume_details' => $request->editor1,
			'created_at' => $current_date
		);


		$user_response_2 = array(
			'candidate_id' => $request->session()->get('id'),
			'candidate_fackbook' => $request->candidate_facebook_link,
			'candidate_google' => $request->candidate_google_link,
			'candidate_twitter' => $request->candidate_twitter_link,
			'candidate_linkedin' => $request->candidate_linkedin,
			'created_at' => $current_date
		);

		// echo "<pre>";
		// print_r($user_response);
		// echo "<pre>";
		// print_r($user_response_2);


		$obj =  new User_Resume_Model();
		$info = $obj->add_user_general($user_response,$request->session()->get('id'));
		$info1 = $obj->add_user_social_media($user_response_2);

		if($info){

			$obj1 =  new UserRegisteration();
			$resume_response = $obj1->update_candidate_name($request->candidate_name,$request->session()->get('id'));
			$request->session()->forget('candidate_name');
			session(['candidate_name' => $request->candidate_name]);
			$request->session()->forget('cv_status');
			$user_obj =  new UserRegisteration();
			$info = $user_obj->update_user_resumeStatus($request->session()->get('id'));
			session(['cv_status' => '1']);


			return redirect('user-profile')->with('success','Your Resume is Created Now You Can Manage Your Resume in Your Profile!');
		}

		else{

			return redirect('make-user-resume');
		}

	}

	public function deleteUserEduction(Request $request){


		$obj =  new User_Resume_Model();
		$info = $obj->delete_education($request->id,$request->session()->get('id'));


		$edu = DB::table('add_user_eductions')->where('candidate_id', $request->session()->get('id'))->get();

		if($edu->count()==0){

			$user_response = array(
				'education_category' => '0',
				'education_value' => '0',
			);	

			DB::table('user_profile_strength')->where('candidate_id', $request->session()->get('id'))->update($user_response);
		}

		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}



	public function updateUserEduction(Request $request){

		
		$id =  $request->id;

		$obj =  new User_Resume_Model();
		$info = $obj->get_selected_eduction($id);
		$edu_id ="'$info->id'";
		$edu_level ="'$info->degree_level'";
		$edu_majors ="'$info->majors'";
		$edu_selected_result ="'$info->selected_result'";	
		echo '
		<div id="UpdateEductionModelWindow" class="modal fade"> 
		<div class="modal-dialog modal-lg">
		<div class="modal-content">

		<div class="modal-header"> 
		<button type="button" class="close"
		data-dismiss="modal" aria-hidden="true">×</button>
		<h4 class="modal-title">Update Eduction</h4>
		</div>
		
		<div class="modal-body">
		<div class="row no-mrg">
		<div class="edit-pro">
		
		<div class="col-md-4 col-sm-6">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<label>Degree Title</label>
		<input type="text"  value="'.$info->degree_title.'" name="update_edu_degree_title" id="update_edu_degree_title" class="form-control" placeholder="Degree Title, e.g. Degree Name">
		</div>

		<div class="col-md-4 col-sm-6">
		<label>Degree Level</label>
		<select class="form-control input-lg" name="update_edu_degree_level" id="update_edu_degree_level">
		<option disabled="disabled" selected="selected" value="'.$info->degree_level.'">'.$info->degree_level.'</option>
		<option>Non-Matriculation</option>
		<option>Matriculation/O-Level</option>
		<option>Intermediate/A-Level</option>
		<option>Bachelors</option>
		<option>Masters</option>
		<option>MPhil/MS</option>
		<option>PHD/Doctorate</option>
		<option>Certification</option>
		<option>Diploma</option>
		<option>Short Course</option>
		</select>
		</div>

		<div class="col-md-4 col-sm-6">
		<label>Institute Name</label>
		<input type="text" value="'.$info->Institute_name.'" name="update_edu_institue_name" id="update_edu_institue_name" class="form-control" placeholder="Institute Name">
		</div>

		<div class="col-md-4 col-sm-6">
		<label>Institute Location</label>
		<input type="text" value="'.$info->institute_location.'" name="update_edu_institute_location" id="update_edu_institute_location" class="form-control" placeholder="Institute Location: Address Details ">
		</div>

		<div class="col-md-4 col-sm-6">
		<label>Date From</label>
		<input type="date" value="'.$info->edu_start.'" name="update_edu_start" id="update-edu-start"  class="form-control" placeholder="+91 258 475 6859">
		</div>

		<div class="col-md-4 col-sm-6">
		<label>Date To</label>
		<input type="date" value="'.$info->edu_end.'" name="update_edu_end" id="update-edu-end"  class="form-control" placeholder="258 457 528">
		</div>

		<div class="col-md-4 col-sm-4">
		<label>Majors</label>
		<select class="form-control input-lg" name="update_edu_majors" id="update_edu_majors">
		<option disabled="disabled" selected="selected" value="'.$info->majors.'" >'.$info->majors.'</option>
		<option>Accounting</option>
		<option>Actuarial Sciences</option>
		<option>Aerospace Engineering</option>
		</select>
		</div>

		<div class="col-md-4 col-sm-4">
		<label>CGP/Percentage</label>
		<select class="form-control input-lg" name="update_edu_result" id="update_edu_result"  onchange="update_change_fields()" >
		<option disabled="disabled" selected="selected" value="'.$info->selected_result.'">'.$info->selected_result.'</option>
		<option>CGPA</option>
		<option>Percentage</option>
		</select>
		</div>

		<div class="col-md-4 col-sm-6" id="update_CGPA_fields">
		<label>CGPA</label>
		<input type="text" value="'.$info->cgpa.'" name="update_edu_candidate_CGPA" id="update_edu_candidate_CGPA" class="form-control" placeholder="Enter CGPA e.g 2.0 , 3.5 etc">
		</div>

		<div class="col-md-4 col-sm-6" id="update_Percentage_fields">
		<label>Percentage</label>
		<input type="text" value="'.$info->percentage.'" name="update_edu_candidate_percentage" id="update_edu_candidate_percentage" class="form-control"  placeholder="Enter Percentage e.g 60% , 70%">
		</div>
		

		<div class="col-sm-12">
		<label>Description</label>
		<textarea class="form-control" name="update_description" id="update_eduction_descriptions">'.$info->edu_description.'</textarea>
		</div>


		</div>
		</div>
		</div>

		<div class="modal-footer">
		<button type="button" onclick="update_edu_data('.$edu_id.','.$edu_level.','.$edu_majors.','.$edu_selected_result.');" class="btn btn-success">Save</button>
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
		</div>


		</div> 
		</div>
		</div>';


		// $obj =  new User_Resume_Model();
		// $info = $obj->update_eduction($user_response,$education_id_number,$request->session()->get('id'));

	}


	public function updateUserFormEduction(Request $request){

		$updated_date = date("Y.m.d h:i:s");
		$user_response = array(
			'degree_title' => $request->degree_title,
			'degree_level' => $request->degree_level,
			'Institute_name' => $request->institute_name,
			'institute_location' => $request->institute_location,
			'edu_start' => $request->edu_start,
			'edu_end' =>$request->edu_end,
			'majors' => $request->majors,
			'selected_result' => $request->selected_result,
			'cgpa' => $request->CGPA,
			'percentage' => $request->Percentage,
			'edu_description' => $request->edu_description,
			'updated_at' => $updated_date
		);

		$education_id_number = $request->id;

		$obj =  new User_Resume_Model();
		$info = $obj->update_eduction($user_response,$education_id_number,$request->session()->get('id'));
		$request->session()->forget('candidate_name');
		session(['candidate_name' => $request->candidate_name]);

		if($info){

			echo "yes";
		}

		else{


		}

	}


	public function updateUserResumeBio(Request $request){


		$request->profile_bio=str_ireplace('<p>','',$request->profile_bio);
		$request->profile_bio=str_ireplace('</p>','',$request->profile_bio);

		$updated_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_resume_details' => $request->profile_bio,
			'updated_at' => $updated_date,
		);



		$obj =  new User_Resume_Model();
		$info = $obj->update_candidate_resume_bio($user_response,$request->session()->get('id'));

		if($info){

			return redirect('user-profile')->with('success','Your Bio is Successfully Updated!');
		}

		else{

			return redirect('user-profile');
		}

	}


	public function updateUserPersonalInfo(Request $request){

		$response = DB::table('add_user_generals_info')->where('candidate_id', $request->session()->get('id'))->first();

		if($request->candidate_city==null){

			$request->candidate_city = $response->candidate_city;
		}


		if($request->candidate_gender==null){

			$request->candidate_gender = $response->candidate_gender;
		}

		if($request->candidate_career_level==null){

			$request->candidate_career_level = $response->candidate_career_level;
		}


		if($request->candidate_degree_level==null){

			$request->candidate_degree_level = $response->candidate_degree_level;
		}

		$request->profile_Address=str_ireplace('<p>','',$request->profile_Address);
		$request->profile_Address=str_ireplace('</p>','',$request->profile_Address);    

		$updated_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_name' => $request->candidate_name,
			'candidate_profession' => $request->candidate_profession,
			'candidate_number' => $request->candidate_number,
			'candidate_city' => $request->candidate_city,
			'candidate_dob' => $request->candidate_dob,
			'candidate_gender' =>$request->candidate_gender,
			'candidate_website' => $request->website_link,
			'candidate_career_level' => $request->candidate_career_level,
			'candidate_degree_level' => $request->candidate_degree_level,
			'candidate_location' => $request->profile_Address,
			'updated_at' => $updated_date
		);


		$user_response1 = array(
			'candidate_name' => $request->candidate_name,
		);

		$data = DB::table('add_user_generals_info')->where('candidate_id', $request->session()->get('id'))->update($user_response);

		DB::table('register_users')->where('id', $request->session()->get('id'))->update($user_response1);

		if($data){

			return redirect('user-profile')->with('success','Your General Info is Successfully Updated!');
		}


		else{


			return redirect('user-profile')->with('success','Your General Info is Successfully Updated!');
		}


	}


	public function candidateJobMatchCriteria(Request $request){

		echo "<pre>";
		print_r($request->candidate_skill);
	   // The Data is in Array PHP

	}



	public function deleteUserExperience(Request $request){


		$obj =  new User_Resume_Model();
		$info = $obj->delete_experience($request->id,$request->session()->get('id'));

		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}
	}



	public function updateUserExperience(Request $request){

		$id =  $request->id;

		$obj =  new User_Resume_Model();
		$info = $obj->get_selected_experience($id);

		echo '
<div id="UpdateExperienceModelWindow" class="modal fade "> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Update Experience</h4>
			</div>

			<div class="modal-body"> 
				<div class="row no-mrg">
					<div class="edit-pro">
						
						<div class="col-md-4 col-sm-6">
							<label>Job Title</label>
							<input type="text" id="update_exp_job_title" class="form-control" placeholder="Job Title" value="'.$info->job_title.'" > 
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Company Name</label>
							<input type="text" id="update_exp_company_name" class="form-control" placeholder="Company Name" value="'.$info->company_name.'">
						</div>
						
						<div class="col-md-4 col-sm-6">
							<label>Referance Email</label>
							<input type="email" id="update_exp_referance_email" class="form-control" placeholder="dana.mathew@gmail.com" value="'.$info->ref_email.'">
						</div>
						
						
						<div class="col-md-6 col-sm-6">
							<label>Reference Number</label>
							<input type="text" id="update_exp_referance_number"  class="form-control" placeholder="258 457 528" value="'.$info->ref_phone.'">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Your Position</label>
							<input type="text" id="update_exp_your_position" class="form-control" placeholder="Position, e.g. Web Designer" value="'.$info->your_position.'">
						</div>

						<div class="col-md-6 col-sm-6">
							<label>Date From</label>
								<input type="date" value="'.$info->exp_start.'" name="update_exp_start" id="update-exp-start"  class="form-control" placeholder="+91 258 475 6859">
						</div>
						
						<div class="col-md-6 col-sm-6">
							<label>Date To</label>
								<input type="date" value="'.$info->exp_start.'" name="update_exp_start" id="update-exp-end"  class="form-control" placeholder="+91 258 475 6859">
						</div>
						
						<div class="col-sm-12">
							<label>Description</label>
							<textarea class="form-control" name="update_exp_description" id="update_exp_description" placeholder="Write Something">'.$info->exp_description.' </textarea>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="do_update_experience('.$info->id.')" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
			</div>
		</div>
	</div>
</div>';
		
	}



	public function doUpdateUserExperience(Request $request){

		$updated_date = date("Y.m.d h:i:s");
		$user_response = array(
			'job_title' => $request->job_title,
			'company_name' => $request->company_name,
			'ref_email' => $request->ref_email,
			'ref_phone' => $request->ref_phone,
			'your_position' =>$request->your_position,
			'exp_start' => $request->exp_start,
			'exp_end' => $request->exp_end,
			'exp_description' => $request->exp_description,
			'updated_at' => $updated_date
		);

		//print_r($user_response);

		$experience_id_number = $request->id;
		$obj =  new User_Resume_Model();
		$info = $obj->update_experience($user_response,$experience_id_number,$request->session()->get('id'));


		if($info){

			echo "yes";
		}

		else{


		}


	}



}
