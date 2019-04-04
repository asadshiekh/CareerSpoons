<?php

namespace App\Http\Middleware\AdminMiddleware\Roles;

use Closure;

class Analyst
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
        if($request->session()->get('account_right') == 'analytics'){
           return redirect('404');
        }else{
            
             return $next($request);
        }
        
    }
}
