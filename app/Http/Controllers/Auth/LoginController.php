<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        
        $username = $this->username();
        if ($username == 'email') {
            $this->validate(
                $request,
                [
                    'username' => 'required|string|max:191|email',
                    'password' => 'required|string',
                ],
                [
                    "username.required" => 'ایمیل را، وارد نمایید.',
                    'password.required' => 'پسورد را، وارد نمایید.',
                    "username.email" => 'ایمیل وارد شده، دارای فرمت نامناسب می باشد!',
                    "username.max" => 'کاراکترهای وارد شده، بیش از حد مجاز، می باشد!',
                ]
            );
        } elseif ($username == 'mobile') {
            $this->validate(
                $request,
                [
                    'username' => 'required|string|max:12|regex:/^09[0-9]{9}$/',
                    'password' => 'required|string',
                ],
                [
                    "username.required" => 'شماره موبایل را، وارد نمایید.',
                    'password.required' => 'پسورد را، وارد نمایید.',
                    'username.regex' => 'شماره موبایل وارد شده، دارای فرمت نامناسب می باشد!',
                    "username.max" => 'کاراکترهای وارد شده، بیش از حد مجاز، می باشد!',
                ]
            );
        } else {
            $this->validate(
                $request,
                [
                    'username' => 'required|string',
                    'password' => 'required|string',
                ],
                [
                    'username.required' => 'ایمیل یا شماره موبایل را، وارد نمایید.',
                    'password.required' => 'پسورد را وارد نمایید.',
                ]
            );
        }
    }

    /*
     * Check either mobile or email.
     */
    public function username()
    {
        $identity = request()->get('username');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'undefined';
        if ($fieldName == 'undefined') {
            $fieldName = filter_var($identity, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^09[0-9]{9}$/"))) ? 'mobile' : 'undefined';
        }

        if ($fieldName == 'undefined') {
            if (is_numeric($identity)) {
                $fieldName = 'mobile';
            } else {
                $fieldName = 'email';
            }
        }

        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }
}
