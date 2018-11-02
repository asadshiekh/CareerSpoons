<?php

namespace App\Http\Middleware\SiteMiddleware\User;

use Closure;
use Alert;
use Illuminate\Support\Facades\Redirect;
class UserLoginCheck
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
        if($request->session()->get('status')=='Active'){

            
            $request->session()->flash('Access', true);
            return redirect::back();
        
        }
        else{

            return $next($request);
        }
    }
}
