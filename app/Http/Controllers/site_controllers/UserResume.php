<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteModel\Resumes\User_Resume_Model;
use App\SiteModel\User\UserRegisteration;

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
		$info = $obj->add_eduction($user_response);

		
		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}


	public function addUserExperience(Request $request){


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
		$info = $obj->add_experience($user_response);

		// print_r($info);

		if($info){

			echo "yes";

		}

		else{

			echo "no";
		}
	}


	public function addUserProject(Request $request){


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
		$info = $obj->add_hobbies($user_response);

		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}

	public function addUserResumeInfo(Request $request){


		$current_date = date("Y.m.d h:i:s");
		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'candidate_name' => $request->candidate_name,
			'candidate_profession' => $request->candidate_profession,
			'candidate_number' => $request->candidate_number,
			'candidate_city' => $request->candidate_city,
			'candidate_location' => $request->candidate_location,
			'candidate_dob' => $request->candidate_dob,
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
		$info = $obj->add_user_general($user_response);
		$info1 = $obj->add_user_social_media($user_response_2);

		if($info){

			$obj1 =  new UserRegisteration();
			$resume_response = $obj1->update_candidate_name($request->candidate_name,$request->session()->get('id'));
			$request->session()->forget('candidate_name');
			session(['candidate_name' => $request->candidate_name]);
			$request->session()->put('candidate_profession',$request->candidate_profession);
			$request->session()->forget('cv_status');
			$user_obj =  new UserRegisteration();
			$info = $user_obj->update_user_resumeStatus($request->session()->get('id'));
			session(['cv_status' => '1']);
			$request->session()->flash('user_cv_status_flash', true);

			return redirect('user-profile');
		}

		else{

			return redirect('make-user-resume');
		}

	}

	public function deleteUserEduction(Request $request){


		$obj =  new User_Resume_Model();
		$info = $obj->delete_education($request->id,$request->session()->get('id'));

		if($info){

			echo "yes";
		}

		else{

			echo "no";
		}

	}

}
