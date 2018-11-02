<?php

namespace App\SiteModel\User;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserEmailVerificationModel extends Model
{
    public function check_user_email_verification($email){

    	  $info = DB::table('register_users')->where('user_email', $email)->update(['verify_by_email' => '1']);
         return $info;
    }
}
