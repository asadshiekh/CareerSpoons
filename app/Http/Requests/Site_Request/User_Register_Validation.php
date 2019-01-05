<?php

namespace App\Http\Requests\Site_Request;

use Illuminate\Foundation\Http\FormRequest;

class User_Register_Validation extends FormRequest
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
            "candidate_name" => 'required|alpha|min:5|max:20',
        ];
    }

        public function messages(){

        return[
            "candidate_name.required"  => 'Student Name is Empty',
            "candidate_name.alpha"  => ' must be entirely alphabetic characters.',
        ];
    }
}
