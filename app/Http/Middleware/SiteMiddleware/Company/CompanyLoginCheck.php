<?php

namespace App\Http\Middleware\SiteMiddleware\Company;

use Closure;
use Alert;
use Illuminate\Support\Facades\Redirect;

class CompanyLoginCheck
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
      if($request->session()->get('login_status')=='Active'){

            
            $request->session()->flash('Access', true);
            return redirect::back();
        
        }
        else{

            return $next($request);
        }
    }
}
