<?php

namespace App\Http\Requests\Client_Request;

use App\Rules\Client_Rules\User_Register_Password_Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class User_Registeration_Validation extends FormRequest
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
             
            "candidate_name" => 'bail|required|min:5|regex:/^[\pL\s]+$/u',
            "user_email"     => 'bail|required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',
            "user_password"  => ['required' ,new User_Register_Password_Rule],
            "username"       => 'bail|required|min:5|regex:/^[a-zA-Z\(\) ].[a-zA-Z0-9\(\) ]+$/',
            "phone_number"   => 'required|min:13',
        ];

        //"email" => ['required',new ValidEmail,new Email_Exist]
    }

    public function messages(){

        return[
            "candidate_name.required"  => 'Name Should Not be Empty',
            "candidate_name.min"  => 'Please Enter Atleast 5 Atleast',
            "candidate_name.regex"  => 'Contain Only Alphabets',
            "user_email.required"  => 'Email Required',
            "user_email.regex"  => 'Email Wrong Format',
            "user_password.required"  => 'Password Not be Empty',
            "username.required"  => 'User Name Required',
            "username.min"  => 'Enter Atleast 5 Character',
            "username.regex"  => 'Invalid Format',
            "phone_number.required"  => 'Phone Number Required',
            "phone_number.min"  => 'Invalid Phone Number',
        ];
    }
}
