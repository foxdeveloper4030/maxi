<?php

namespace App\Http\Middleware;

use App\CustomClasses\SA_Encryption;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Unverified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $secure_key = SA_Encryption::decrypt_from_url_param($request->route()->secure_key);

        if ($secure_key == null){
            $secure_key=$request->secure_key;
        }

        $user = User::where('secure_key', $secure_key)->first();
        if ($user) {
            if ($user->verified_at == null) {
                return $next($request);
            } else {
                return redirect()->route('urlMain')->with('status', 'حساب کاربری، تایید شده است.');
            }
        } else
            return redirect()->route('login');
    }
}
