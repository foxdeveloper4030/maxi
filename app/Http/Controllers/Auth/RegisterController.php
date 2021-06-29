<?php

namespace App\Http\Controllers\Auth;

use App\CustomClasses\SA_Encryption;
use App\Http\Controllers\Controller;
use App\PublicModel;
use App\Rules\DetectUniqueUsersRule;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function addUser(Request $request){

    }






    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['resendVerifyCode']);
    }

    /**
     * @param $fieldEncrypt
     * @param $secureKeyEncrypt
     * @return Factory|RedirectResponse|View
     */
    public function registerVerifying($fieldEncrypt, $secureKeyEncrypt)
    {

        $field = SA_Encryption::decrypt_from_url_param($fieldEncrypt);
        $secure_key = SA_Encryption::decrypt_from_url_param($secureKeyEncrypt);
        $user = User::where('secure_key', $secure_key)->first();

        if ($user) {
            if ($user->verified_at === null) {
                return view('auth.myregister', compact('field', 'user'));
            }
            //  usr is login
            $this->guard()->login($user);
            return redirect()->route('urlMain')->with('status', 'قبلا عضویت شما، تایید شده است!');
        }
        return back()->with('status', 'چنین کاربری مشاهده نشد!');    }

    public function registerVerify(Request $request)
    {
        $this->validate(
            $request,
            [
                'activation_code' => 'required|digits:6',
                'typeregister' => ['required', 'regex:/\b((email)|(mobile))\b/'],
                'secure_key' => ['required'],
            ],
            [
                "typeregister.regex" => 'خطر: شما، سایت را دستکاری کرده اید!',
                "secure_key.required" => 'خطر: شما، سایت را دستکاری کرده اید!',
            ], [
                'activation_code' => 'کد فعالسازی',
            ]
        );
//TODO: bayad user ra peyda konam
        $userV = User::where('secure_key', $request->secure_key)->first();
        $field = $request->typeregister;
        if ($userV && $userV->activation_code === $request->activation_code) {
            $messageStatus = '';
            if ($userV->user_temp == 'verified' . $userV->id) {
                $messageStatus = 'حساب کاربری شما، قبلا تایید شده است.';
            }

            $this->guard()->login($userV);

            $userV->operationVerified($field);

//            return redirect()->route('urlMain')->with('status', $messageStatus);
            return redirect($this->redirectPath())->with('status', $messageStatus);
        }
        return back()->with('status', 'کد تایید، اشتباه است.');
    }

    public function register(Request $request)
    {
        $rules = [

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email|unique:users',
            'mobile' => 'unique:users|required|regex:/(09)[0-9]{9}/'

        ];

        $customMessages = [
            'firstname.required' => 'نام الزامی است',
            'lastname.required' => 'نام خانوادگی الزامی است',
            'firstname.email' => 'ایمیل الزامی است',
            'email.unique'=>'این ایمیل قبلا در سایت ثبت شده است.',
            'mobile.unique'=>'این شماره تلفن قبلا در سایت ثبت شده است.',
            'mobile.required'=>'شماره موبایل الزامی است',
            'mobile.regex'=>'شماره موبایل اشتباه است',

        ];

        $request->validate( $rules, $customMessages);

        $user=new User();
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->mobile=$request->mobile;
        if (isset($request->email))
            $user->email=$request->email;
        if (isset($request->website))
            $user->email=$request->website;
        $pass=substr(random_number_of_6(),0,6);
        $user->password=Hash::make($pass);
        //  return ' رمز حساب شما در ماکزی مورس :'.$pass;
        $user->save();
        //   PublicModel::SendSms1($request->mobile,$pass);
        $text='کاربر گرامی '.$request->firstname.' به maximorse.com خوش آمدید. رمز عبور شما :'.$pass;

        PublicModel::SendSms1($request->mobile,urlencode($text));
        return \view('auth.myregister');
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
                "field.regex" => 'خطر: شما، سایت را دستکاری کرده اید!',
            ],
            [
                'field' => 'فیلد',
                'value' => 'مقدار',
            ]
        );

        $valueIsValid = $this->checkEmailOrMobileIsValid($request);
        if ($valueIsValid) {
            //  all parameters are valid!
            $user = User::where('user_temp', $request->value)->first();
            if ($user) {
                if (!$user->verified_at) {

                    $dateDiff = now()->diffInMinutes($user->updated_at);
                    $user->update(['updated_at' => Carbon::now()]);     //  برا اینکه کاربرا، تو یک دقیقه بعد، بتونن درخواست بدن!

                    if ($dateDiff > 1) {  //  one minute
                        if ($dateDiff > 120) {
                            $code = random_number_of_6();
                            $user->update(['activation_code' => $code]);
                        }
                        event(new Registered($user, $request->field, "کد مجدد تایید ثبت نام در سایت "));
                        if ($request->field == 'email') {
                            return response(
                                ['status' => 'کد تایید، ایمیل شد ...', 'backgroundColor' => '#d4edda', 'borderColor' => '#c3e6cb', 'textColor' => '#155724',]
                                , 200);
                        } else {
                            return response(
                                ['status' => 'کد تایید، پیامک شد ...', 'backgroundColor' => '#d4edda', 'borderColor' => '#c3e6cb', 'textColor' => '#155724',]
                                , 200);
                        }
                    } else {
                        return response(
                            ['status' => 'لطفا بعد از 1 دقیقه، اقدام به دریافت کد تایید، نمایید ...', 'backgroundColor' => '#cce5ff', 'borderColor' => '#b8daff', 'textColor' => '#004085',]
                            , 200);
                    }

                } else {
                    return redirect()->route('urlMain')->with('status', 'حساب کاربری، تایید شده است.');
                }
            } else {
                return redirect()->route('login');
            }
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($this->username() == 'email') {
            $validate = Validator::make($data, [
                'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                $this->username() => [new DetectUniqueUsersRule],
//                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        } elseif ($this->username() == 'mobile') {
            $validate = Validator::make($data, [
                'username' => ['required', 'string', 'max:15', 'regex:/^((\+?98)|(0)|(0098))9[0-9]{9}$/'],
                'mobile' => [new DetectUniqueUsersRule],
                $this->username() => 'unique:users',
                'password' => ['required', 'string', 'min:8'],
            ]);
        }

        $validate = Validator::make($data, [
            'firstname' => ['string', 'nullable'],
            'lastname' => ['string', 'nullable'],
            'sex_id' => ['string', 'regex:/\b((man)|(woman))\b/', 'nullable'],
            'avatar' => 'max:2048|nullable',
            'website' => ['string', 'nullable'],
        ]);

        return $validate;
    }

    /*
     * Check either mobile or email.
     */
    public function username()
    {
        $identity = request()->get('username');
        $fieldName = checkEmailOrMobile($identity);

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
     * @throws ValidationException
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
