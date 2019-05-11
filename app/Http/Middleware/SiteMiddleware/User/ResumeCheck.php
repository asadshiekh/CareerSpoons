<?php

namespace App\Http\Middleware\SiteMiddleware\User;

use Closure;
use Illuminate\Support\Facades\Redirect;
class ResumeCheck
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
        if($request->session()->get('cv_status')=='1'){

            
            return redirect::back()->with('warning','You Already Create Your Resume');
        }
        else{

            return $next($request);
        }
    }
}
