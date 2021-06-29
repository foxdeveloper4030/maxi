<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;

class CheckVerifyUser
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
        dd($request->all(),Self_::class);
        if (Auth::check()) {
            $user = Auth::user();
            if (is_null($user->verified_at)) {
                $diffHoures = now()->diffInHours($user->updated_at);
                //TODO: انجام این تنظیمات در فولدر کانفبیگ
                if ($diffHoures < 2) {
                    $user_temp = $user->user_temp;
                    $field = checkEmailOrMobile($user_temp);
                    return redirect()->route('auth.register.verifying', $field);
                } else {
                    return redirect()->route('register');
                }
            }
        }
        return $next($request);
    }
}
