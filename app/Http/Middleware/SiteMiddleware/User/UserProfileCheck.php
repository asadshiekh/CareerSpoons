<?php

namespace App\Http\Middleware\SiteMiddleware\User;

use Closure;

class UserProfileCheck
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

            return $next($request);

        }
        else{

            return redirect('page-not-found');

        }
    }
}
