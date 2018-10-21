<?php

namespace App\SiteModel\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserLoginModel extends Model
{
    public function do_login_user($email,$password){

        $info=DB::table('register_users')->select('*')->where([
            ['user_email','=',[$email]],
            ['password','=',[$password]],
         ])->first();
         return $info;
    }
}
