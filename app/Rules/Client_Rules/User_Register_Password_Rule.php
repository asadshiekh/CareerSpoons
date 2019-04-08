<?php

namespace App\Rules\Client_Rules;

use Illuminate\Contracts\Validation\Rule;

class User_Register_Password_Rule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if(preg_match("*^(?=.{7,20})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*\W).*$#",$value)){

        return true;
    }

    else{

        return false;
    }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password Format Is Invalid';
    }
}
