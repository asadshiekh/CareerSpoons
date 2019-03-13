<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Resumes\User_Resume_Model;
use App\SiteModel\User\UserProfileImages;
use App\SiteModel\User\UserProfileModel;
use App\SiteModel\ClientSite\ClientSiteModel;
use App\Http\Controllers\Controller;
use App\Mail\Site_Mail\User_Mail\User_Change_Email;
use Mail;
use Image;
use DB;


class UserProfile extends Controller
{
	public function viewUserProfile(Request $request){

		$obj =  new User_Resume_Model();
		$candidate_education = $obj->get_candidate_eduction($request->session()->get('id'));
		$candidate_experience = $obj->get_candidate_experience($request->session()->get('id'));
		$candidate_project = $obj->get_candidate_project($request->session()->get('id'));
		$candidate_skill = $obj->get_candidate_skill($request->session()->get('id'));
		$candidate_languages = $obj->get_candidate_languages($request->session()->get('id'));
		$candidate_hobbies = $obj->get_candidate_hobbies($request->session()->get('id'));
		$general_info = $obj->get_candidate_info($request->session()->get('id'));
		$social_link = $obj->get_candidate_social_link($request->session()->get('id'));
		$temp_in = $obj->get_temp_id($request->session()->get('id'));
		$applied_jobs = $obj->get_jobs_posts($request->session()->get('id'));
		//dd($applied_jobs);
		$templates = DB::table('resume_templates')->get();

		//fetch admin site data 
		$obj1 =  new ClientSiteModel();
		$get_area=$obj1->get_all_area();
		$get_cities=$obj1->get_all_cities();
		$get_cities1=$obj1->get_all_cities();
		$get_degree=$obj1->get_all_degree_level();
		$get_degree1=$obj1->get_all_degree_level();
		$get_majors=$obj1->get_all_majors();
		$get_qualification=$obj1->get_all_qualification();
		$get_industries=$obj1->get_all_indutries();



		// Fetch Eduction of User Number
		return view('client_views.user_related_pages.user_profile',['candidate_education' => $candidate_education,'candidate_experience' => $candidate_experience,'candidate_project' => $candidate_project,'candidate_skill' => $candidate_skill,'candidate_languages' => $candidate_languages,'candidate_hobbies' => $candidate_hobbies,'general_info' => $general_info,'social_link' => $social_link,'get_area'=>$get_area,'get_cities'=>$get_cities,'get_cities1'=>$get_cities1,'get_degree'=>$get_degree,'get_degree1'=>$get_degree1,'get_majors'=>$get_majors,'templates'=>$templates,'temp_in'=>$temp_in,'get_qualification'=>$get_qualification,'get_industries'=>$get_industries,'applied_jobs'=>$applied_jobs]);
	}


	public function viewUserPublicProfile(Request $request){

		$obj =  new User_Resume_Model();
		$general_info = $obj->get_candidate_general_info($request->session()->get('id'));
		$candidate_education = $obj->fetch_candidate_eduction_resume_details($request->session()->get('id'));
		$candidate_experience = $obj->fetch_candidate_experience_resume_details($request->session()->get('id'));
		$get_candidate_skill_just_six = $obj->get_candidate_skill_just_six($request->session()->get('id'));

		$candidate_project = $obj->fetch_candidate_project_resume_details($request->session()->get('id'));

		$candidate_languages = $obj->fetch_candidate_languages_resume_details($request->session()->get('id'));
		$candidate_hobbies = $obj->fetch_candidate_hobby_resume_details($request->session()->get('id'));
		$candidate_skill = $obj->fetch_candidate_skill_resume_details($request->session()->get('id'));

		return view('client_views.user_related_pages.user_public_profile',['general_info' => $general_info,'candidate_education' => $candidate_education,'candidate_experience' => $candidate_experience,'get_candidate_skill_just_six' => $get_candidate_skill_just_six,'candidate_project' => $candidate_project,'candidate_languages' => $candidate_languages,'candidate_hobbies' => $candidate_hobbies,'candidate_skill' => $candidate_skill]);

	}


	public function updateUserProfilePic(Request $request){

		// $this->validate($request, [
		// 	'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		// ]);


		$data = $request->image;
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);


		$data = base64_decode($data);
		$imageName = time().'.png';
		$destinationPath = 'uploads/client_site/profile_pic/';
		$image = file_put_contents($destinationPath.$imageName,$data);

		//move_uploaded_file($image,$destinationPath);	 
		//echo $imageName;  image name

		$user_response = array(
			'profile_image' => $imageName,
		);

		$obj =  new UserProfileImages();
		$info = $obj->update_user_profile_image($request->session()->get('id'),$user_response);
		$request->session()->forget('profile_image');
		$request->session()->put('profile_image',$imageName);
		
		if($info){
			echo $imageName;
			// return redirect('user-profile')->with('success','Your Profile Picture is Successfully Updated!');
		}

		else{

			// return redirect('user-profile')->with('error','Your Profile image is Not Properly Uploaded!');
		}


	}



	public function updateUserCoverPic(Request $request){


		$this->validate($request, [
			'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);


		$image = $request->file('input_img');
		$data = rand().$image->getClientOriginalName();     
		$destinationPath = './uploads/client_site/cover_photo/cropped';
		$img = Image::make($image->getRealPath());
		$img->resize(1200,500, function ($constraint) {
			$constraint->aspectRatio();
		})->save($destinationPath.'/'.$data);

		$destinationPath = './uploads/client_site/cover_photo/real_image';
		$image->move($destinationPath, $data);

		$user_response = array(
			'cover_image' => $data,
			'cropped_cover_image' => $data
		);

		$obj =  new UserProfileImages();
		$info = $obj->update_user_profile_image($request->session()->get('id'),$user_response);
		$request->session()->forget('cover_image');
		$request->session()->forget('cropped_cover_image');
		
		if($info){

			$request->session()->put('cover_image',$data);
			$request->session()->put('cropped_cover_image',$data);
			return redirect('user-profile')->with('success','Your Cover Picture is Successfully Updated!');
		}

		else{

			return redirect('user-profile')->with('error','Your Cover Info is not Updated!');
		}

	}




	public function updateSocialLinks(Request $request){

		$current_date = date("Y.m.d h:i:s");

		$user_response = array(
			'candidate_id' => $request->session()->get('id'),
			'candidate_fackbook' => $request->candidate_facebook_link,
			'candidate_google' => $request->candidate_google_link,
			'candidate_twitter' => $request->candidate_twitter_link,
			'candidate_linkedin' => $request->candidate_linkedin,
			'updated_at' => $current_date
		);


		// echo "<pre>";	
		// print_r($user_response);	

		$obj =  new User_Resume_Model();
		$info = $obj->update_social_links($request->session()->get('id'),$user_response);

		if($info){

			return redirect('user-profile')->with('success','Your Social Media Link are Updated!');
		}

		else{

			return redirect('user-profile')->with('error','Your Social Media Links are Not Valid!');
		}	

	}


	
	public function skill_tester(){

		return view('client_views.user_related_pages.skill_tester');
	}


	public function rateproduct(Request $request){

		$current_date = date("Y.m.d h:i:s");
		$request->rating_description=str_ireplace('<p>','',$request->rating_description);
		$request->rating_description=str_ireplace('</p>','',$request->rating_description);

		$user_response = array(
			'rating_points' => $request->rating,
			'review_description' => $request->rating_description,
			'updated_at' => $current_date
		);
		
		$obj =  new UserProfileModel();
		$info = $obj->update_reviews($request->session()->get('id'),$user_response);

			//print_r($user_response);

		if($info){
			$request->session()->forget('candidate_rating');
			$request->session()->put('candidate_rating',$request->rating);
			echo "yes";
		}

		else{

			echo "no";
		}

	}


	public function doChangePhoneStatus(Request $request){

		$user_response = array(
			'current_number_status' => $request->x,
		);

		$obj =  new UserProfileModel();
		$info = $obj->update_phone_status($request->session()->get('id'),$user_response); 

		if($info){
			$request->session()->forget('phone_status');
			$request->session()->put('phone_status',$request->x);
			echo "yes";
		}

		else{

			
		}

	}


	public function doChangeCandidatePassword(Request $request){
		$current_date = date("Y.m.d h:i:s");
		$obj =  new UserProfileModel();
		$info = $obj->get_details_of_user($request->session()->get('id'));

		//print_r($info);

		if($info->password==$request->current_password){
			
			$user_response = array(
				'password' => $request->new_password,
				'updated_at' => $current_date
			);

			$info1 = $obj->update_candidate_password($request->session()->get('id'),$user_response);

			if($info1){

				echo "yes";
			}

			else{


			}

		}


		else{

			

		}

	}



	public function dodDeleteCandidateAccount(Request $request){
		$current_date = date("Y.m.d h:i:s");
		$obj =  new UserProfileModel();
		$info = $obj->get_details_of_user($request->session()->get('id'));

		$user_response = array(
			'user_activation_status' => '0',
			'updated_at' => $current_date
		);

		$info1 = $obj->update_candidate_activition_status($request->session()->get('id'),$user_response);

		if($info1){	

			$request->session()->flush();
			echo "yes";
		}

		else{


		}


	}


	public function dodChangeCandidateEmail(Request $request){

		$new_email  = $request->new_email;
		$password  = $request->password;

		$obj =  new UserProfileModel();
		$info = $obj->check_user_password($request->session()->get('id'),$request->session()->get('user_email'),$password);

		if($info){

			//print_r($info);

			if($info->user_email==$new_email){

				echo "2";
			}

			$user_response = array(
				'user_email' => $new_email,
				'verify_by_email' => '0'
			);

			$obj->update_candidate_details($request->session()->get('id'),$user_response);

			$request->session()->forget('email_status');
			$request->session()->put('email_status','0');
			$request->session()->forget('user_email');
			$request->session()->put('user_email',$new_email);
			echo "yes";

		}	

		else{

			echo "3";
		}

	}



	public function doResendCandidateEmail(Request $request){

		Mail::send(new User_Change_Email());
	}


	public function doFetchFunctionalArea_Major(Request $request){

		$area=$request->post('f_area');
		$info =DB::table('Add_major')->where(['area_title'=>$area])->get();
		//return $info;
		// foreach ($info as $key => $node) {
 	// 	 	str_replace('_', '',$key->$node);
		// }

		return $info;

	}






}
