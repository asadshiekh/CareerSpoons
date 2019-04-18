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
        return [
            
             "posted_job_title" => 'bail|required',
             "skill_tags"       => 'bail|required',
            "req_functional_area" => 'bail|required',
        ];
    }

        public function messages(){

        return[
            
            "posted_job_title.required"  => 'Job Title is Required',
            "skill_tags.required"  => 'skill are Required',
            "req_functional_area.required"  => 'function are is missing',
        ];
    }
}
