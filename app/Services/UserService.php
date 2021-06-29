<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\PublicModel;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showFormForgetPass0()
    {
        return view('auth.passwords.step0Reset');
    }

    public function smsVerifyingForgetPass1(Request $request)
    {
        
        if (User::query()->where('mobile','=',$request->mobile)!=null)
        {
           $user=User::query()->where('mobile','=',$request->mobile)->first();
            $pass=substr(random_number_of_6(),0,6);
            $user->password=Hash::make($pass);
            //  return ' رمز حساب شما در ماکزی مورس :'.$pass;
            $user->save();
            //   PublicModel::SendSms1($request->mobile,$pass);
            $text='کاربر گرامی '.$user->firstname.' به maximorse.com  . رمز عبور شما :'.$pass;

            PublicModel::SendSms1($request->mobile,urlencode($text));
            return view('auth.passwords.step1Reset',['message'=>'رمز عبور جدید برای شما ارسال شده است. ']);
        }
        else
            return view('auth.passwords.step1Reset',['message'=>'رمز عبور جدید برای شما ارسال شده است. ']);
    }


    public function smsVerifiedForgetPass2(Request $request)
    {
        $this->validate(
            $request,
            [
                'activation_code' => 'required|digits:6',
                'typeregister' => ['required', 'regex:/\b((email)|(mobile))\b/'],
                'secure_key' => ['required'],
            ],
            [
                "typeregister.regex" => 'لطفا، دوباره از ابتدا، اقدام بفرمایید!',
                "secure_key.required" => 'لطفا، دوباره از ابتدا، اقدام بفرمایید!',
//                "secure_key.required" => 'خطر: شما، سایت را دستکاری کرده اید!',
            ], [
                'activation_code' => 'کد فعالسازی',
            ]
        );

        return UserService::smsVerifiedForgetPass2($request);
    }


    public function changePassedForgetPass3(Request $request)
    {
        $validatedData = $request->validate([
            'secure_key' => 'required',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',],
            [
                "secure_key.required" => 'لطفا، دوباره از ابتدا، اقدام بفرمایید!',
            ]);

        return UserService::changePassedForgetPass3($request);

    }

    public function resendVerifyCode(Request $request)
    {
        $this->validate(
            $request,
            [
                'field' => ['required', 'regex:/\b((email)|(mobile))\b/'],
                'value' => ['required'],
            ],
            [
                "field.regex" => 'لطفا، مجدد اقدام بفرمایید',
//                "field.regex" => 'خطر: شما، سایت را دستکاری کرده اید!',
            ],
            [
                'field' => 'فیلد',
                'value' => 'مقدار',
            ]
        );

        $valueIsValid = $this->checkEmailOrMobileIsValid($request);
        if ($valueIsValid) {
            $user = User::where($request->field, $request->value)->first();

            if ($user) {
                $dateDiff = now()->diffInMinutes($user->updated_at);
                $user->update(['updated_at' => Carbon::now()]);     //  برا اینکه کاربرا، تو یک دقیقه بعد، بتونن درخواست بدن!

                if ($dateDiff > 1) {
                    if ($dateDiff > 120) {
                        $code = random_number_of_6();
                        $user->update(['activation_code' => $code]);
                    }

                    event(new Registered($user, $request->field, "کد مجدد فراموشی رمز عبور در سایت maximorse"));
                    if ($request->field == 'email') {
                        return response([
                            'status' => 'کد تایید، ایمیل شد ...', 'backgroundColor' => '#d4edda', 'borderColor' => '#c3e6cb', 'textColor' => '#155724',
                        ], 200);
                    } else {
                        return response([
                            'status' => 'کد تایید، پیامک شد ...', 'backgroundColor' => '#d4edda', 'borderColor' => '#c3e6cb', 'textColor' => '#155724',
                        ], 200);
                    }

                } else {
                    return response([
                        'status' => 'لطفا بعد از 1 دقیقه، اقدام به دریافت کد تایید، نمایید ...', 'backgroundColor' => '#cce5ff', 'borderColor' => '#b8daff', 'textColor' => '#004085',
                    ], 200);
                }
            } else {
                return redirect()->route('login');
            }
        }
    }

//    =================================================================================
    protected function validateEmailOrMobile(Request $request)
    {
        $this->validate(
            $request,
            ['username' => 'required',],
            ["username.required" => 'نام کاربری را، وارد نمایید.',]
        );

        $username = $this->username();
        if ($username == 'email') {
            $this->validate(
                $request,
                [
                    'username' => 'string|max:191|email',
                ],
                [
                    "username.email" => 'ایمیل وارد شده، دارای فرمت نامناسب می باشد!',
                    "username.max" => 'کاراکترهای وارد شده، بیش از حد مجاز، می باشد!',
                ]
            );
        } elseif ($username == 'mobile') {
            $this->validate(
                $request,
                [
                    'username' => 'string|max:12|regex:/^09[0-9]{9}$/',
                ],
                [
                    'username.regex' => 'شماره موبایل وارد شده، دارای فرمت نامناسب می باشد!',
                    "username.max" => 'کاراکترهای وارد شده، بیش از حد مجاز، می باشد!',
                ]
            );
        } else {
            $this->validate(
                $request,
                [
                    'username' => 'required|string',
                ],
                [
                    'username.required' => 'ایمیل یا شماره موبایل را، وارد نمایید.',
                ]
            );
        }
    }


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

    /**
     * مشخص کردن اینکه، موبایل یا ایمیل، حاوی مقدار صحیحی باشد.
     * @param Request $request
     * @return true
     * @throws \Illuminate\Validation\ValidationException
     */
    private function checkEmailOrMobileIsValid(Request $request)
    {
        if ($request->field == 'email') {
            $this->validate(
                $request,
                [
                    'value' => ['email'],
                ],
                [
                    "value.regex" => 'خطر: شما، سایت را دستکاری کرده اید!',
                ],
                [
                    'value' => 'مقدار',
                ]
            );
        } else {  //  mobile
            $this->validate(
                $request,
                [
                    'value' => ['regex:/^(((\+?98)|(0)|(0098))9[0-9]{9}$)/'],
                ],
                [
                    "value.regex" => 'خطر: شما، سایت را دستکاری کرده اید!',
                ],
                [
                    'value' => 'مقدار',
                ]
            );
        }
        return true;
    }
}
