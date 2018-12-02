<?php

namespace App\Http\Middleware\SiteMiddleware\Company;

use Closure;

class CompanyProfileCheck
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
        if($request->session()->get('company_status')=='Active'){

            return $next($request);

        }
        else{

            return redirect('page-not-found');

        }
    }
}
