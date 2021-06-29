<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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
       return $next($request);
        session(['myredirect'=>route('admin.home')]);
        if (Auth::check()){
            if (Auth::user()->type == 'admin')
                return $next($request);

        }
        return redirect('login');

    }
}
