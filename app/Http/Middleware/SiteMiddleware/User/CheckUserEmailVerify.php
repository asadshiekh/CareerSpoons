<?php

namespace App\Http\Middleware\SiteMiddleware\User;

use Closure;
use DB;
class CheckUserEmailVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        $allKeys = array_keys($request->route()->parameters('email'));
        $allValues = array_values($request->route()->parameters());
        $email = $allValues[0];
        $UserCheckEmailStatus = DB::table('register_users')->where('user_email', $email)->first();
     if($request->session()->has('user_email') && $UserCheckEmailStatus->verify_by_email=='1'){

        $request->session()->flash('email_status_response', true);
            return redirect('/');
     }
         

     else if($request->session()->has('user_email')==false && $UserCheckEmailStatus->verify_by_email=='1'){
            $request->session()->flash('email_status_response', true);
            return redirect('user-login');   
     }
         
        // $allKeys = array_keys($request->route()->parameters('email'));
        // $allValues = array_values($request->route()->parameters());
        //  $email = $allValues[0];
        //  $UserCheckEmailStatus = DB::table('register_users')->where('user_email', $email)->first();

        //  dd($UserCheckEmailStatus);


     // in the Case of logout to check karay ga DB Say user verify by email 
     // else if($request->session()->has('user_email')){ 

     //    //print_r($request->route()->parameters());
     //    //echo $value= array_keys($request->route()->parameters('email'));
     //    $allKeys = array_keys($request->route()->parameters('email'));
     //    $allValues = array_values($request->route()->parameters());
     //     $email = $allValues[0];
     //     $UserCheckEmailStatus = DB::table('register_users')->where('user_email', $email)->first();

     //     if($UserCheckEmailStatus->verify_by_email=='1'){

     //        $request->session()->flash('email_status_response', true);
     //        return redirect('user-login');
     //     }

     
    
    // or agr user really may verify nahi hova to ya request controlller kay else may excute ho ge
    else{

        return $next($request);
    }
}


}
