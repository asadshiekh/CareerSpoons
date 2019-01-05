<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\SiteModel\Resumes\User_Resume_Model;
use App\SiteModel\User\UserProfileImages;
use App\SiteModel\User\UserProfileModel;
use App\Http\Controllers\Controller;
use Image;

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


		// Fetch Eduction of User Number

		return view('client_views.user_related_pages.user_profile',['candidate_education' => $candidate_education,'candidate_experience' => $candidate_experience,'candidate_project' => $candidate_project,'candidate_skill' => $candidate_skill,'candidate_languages' => $candidate_languages,'candidate_hobbies' => $candidate_hobbies,'general_info' => $general_info,'social_link' => $social_link]);
	}


	public function viewUserPublicProfile(Request $request){

		$obj =  new User_Resume_Model();
		$general_info = $obj->get_candidate_general_info($request->session()->get('id'));
		$candidate_education = $obj->get_candidate_eduction($request->session()->get('id'));
		$candidate_experience = $obj->get_candidate_experience($request->session()->get('id'));
		$get_candidate_skill_just_six = $obj->get_candidate_skill_just_six($request->session()->get('id'));

		$candidate_project = $obj->get_candidate_project($request->session()->get('id'));

		$candidate_languages = $obj->get_candidate_languages($request->session()->get('id'));
		$candidate_hobbies = $obj->get_candidate_hobbies($request->session()->get('id'));
		$candidate_skill = $obj->get_candidate_skill($request->session()->get('id'));

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
		
		if($info){

			$request->session()->put('profile_image',$imageName);
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



}
