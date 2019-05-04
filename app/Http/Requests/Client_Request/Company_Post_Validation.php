<?php

namespace App\Http\Requests\Client_Request;

use Illuminate\Foundation\Http\FormRequest;

class Company_Post_Validation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [

            "posted_job_title" => 'bail|required',
            "skill_tags"       => 'bail|required',
            "req_functional_area" => 'bail|required',
            "selected_majors" => 'bail|required',
            "req_industry" => 'bail|required',
            "req_career_level" => 'bail|required',
            "job_exp_req" => 'bail|required',
            "total_positions" => 'bail|required',
            "working_hour" => 'bail|required',
            "min_salary" => 'bail|required',
            "max_salary" => 'bail|required',
            "last_apply_date" => 'bail|required',
            "post_visibility_date" => 'bail|required',
            "selected_gender" => 'bail|required',
            "prefered_age" => 'bail|required',
            "post_information" => 'bail|required',
            
        ];


     return $rules;

    }

        public function messages(){
        
        $messages = [
            
            "posted_job_title.required"  => 'Job Title is Required',
            "skill_tags.required"  => 'Skills are Required',
            "req_functional_area.required"  => 'Functional Area Required',
            "selected_majors.required"  => 'Majors is Missing',
            "req_industry.required"  => 'Industry Required',
            "req_career_level.required"  => 'Career Level Required',
            "job_exp_req.required"  => 'Exerience is Missing',
            "total_positions.required"  => 'Postions are Required',
            "working_hour.required"  => 'Working Hours are Required',
            "min_salary.required"  => 'Minimum Salary Required',
            "max_salary.required"  => 'Maximum Salary Required',
            "last_apply_date.required"  => 'Last Apply Date Required',
            "post_visibility_date.required"  => 'Post Visibility Required',
            "selected_gender.required"  => 'Gender is Missing',
            "prefered_age.required"  => 'Prefered Age Required',
            "post_information.required"  => 'Job Description is Required',

        ];

          return $messages;
    }
}
