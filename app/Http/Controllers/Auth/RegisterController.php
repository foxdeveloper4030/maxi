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
            return redirect()->route('urlMain')->with('status', '???????? ?????????? ???????? ?????????? ?????? ??????!');
        }
        return back()->with('status', '???????? ???????????? ???????????? ??????!');    }

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
                "typeregister.regex" => '??????: ???????? ???????? ???? ?????????????? ???????? ??????!',
                "secure_key.required" => '??????: ???????? ???????? ???? ?????????????? ???????? ??????!',
            ], [
                'activation_code' => '???? ????????????????',
            ]
        );
//TODO: bayad user ra peyda konam
        $userV = User::where('secure_key', $request->secure_key)->first();
        $field = $request->typeregister;
        if ($userV && $userV->activation_code === $request->activation_code) {
            $messageStatus = '';
            if ($userV->user_temp == 'verified' . $userV->id) {
                $messageStatus = '???????? ???????????? ???????? ???????? ?????????? ?????? ??????.';
            }

            $this->guard()->login($userV);

            $userV->operationVerified($field);

//            return redirect()->route('urlMain')->with('status', $messageStatus);
            return redirect($this->redirectPath())->with('status', $messageStatus);
        }
        return back()->with('status', '???? ???????????? ???????????? ??????.');
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
            'firstname.required' => '?????? ???????????? ??????',
            'lastname.required' => '?????? ???????????????? ???????????? ??????',
            'firstname.email' => '?????????? ???????????? ??????',
            'email.unique'=>'?????? ?????????? ???????? ???? ???????? ?????? ?????? ??????.',
            'mobile.unique'=>'?????? ?????????? ???????? ???????? ???? ???????? ?????? ?????? ??????.',
            'mobile.required'=>'?????????? ???????????? ???????????? ??????',
            'mobile.regex'=>'?????????? ???????????? ???????????? ??????',

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
        //  return ' ?????? ???????? ?????? ???? ?????????? ???????? :'.$pass;
        $user->save();
        //   PublicModel::SendSms1($request->mobile,$pass);
        $text='?????????? ?????????? '.$request->firstname.' ???? maximorse.com ?????? ??????????. ?????? ???????? ?????? :'.$pass;

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
                "field.regex" => '??????: ???????? ???????? ???? ?????????????? ???????? ??????!',
            ],
            [
                'field' => '????????',
                'value' => '??????????',
            ]
        );

        $valueIsValid = $this->checkEmailOrMobileIsValid($request);
        if ($valueIsValid) {
            //  all parameters are valid!
            $user = User::where('user_temp', $request->value)->first();
            if ($user) {
                if (!$user->verified_at) {

                    $dateDiff = now()->diffInMinutes($user->updated_at);
                    $user->update(['updated_at' => Carbon::now()]);     //  ?????? ?????????? ?????????????? ???? ???? ?????????? ???????? ?????????? ?????????????? ??????!

                    if ($dateDiff > 1) {  //  one minute
                        if ($dateDiff > 120) {
                            $code = random_number_of_6();
                            $user->update(['activation_code' => $code]);
                        }
                        event(new Registered($user, $request->field, "???? ???????? ?????????? ?????? ?????? ???? ???????? "));
                        if ($request->field == 'email') {
                            return response(
                                ['status' => '???? ???????????? ?????????? ???? ...', 'backgroundColor' => '#d4edda', 'borderColor' => '#c3e6cb', 'textColor' => '#155724',]
                                , 200);
                        } else {
                            return response(
                                ['status' => '???? ???????????? ?????????? ???? ...', 'backgroundColor' => '#d4edda', 'borderColor' => '#c3e6cb', 'textColor' => '#155724',]
                                , 200);
                        }
                    } else {
                        return response(
                            ['status' => '???????? ?????? ???? 1 ???????????? ?????????? ???? ???????????? ???? ???????????? ???????????? ...', 'backgroundColor' => '#cce5ff', 'borderColor' => '#b8daff', 'textColor' => '#004085',]
                            , 200);
                    }

                } else {
                    return redirect()->route('urlMain')->with('status', '???????? ?????????????? ?????????? ?????? ??????.');
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
     * ???????? ???????? ???????????? ???????????? ???? ???????????? ???????? ?????????? ?????????? ????????.
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
                    "value.regex" => '??????: ???????? ???????? ???? ?????????????? ???????? ??????!',
                ],
                [
                    'value' => '??????????',
                ]
            );
        } else {  //  mobile
            $this->validate(
                $request,
                [
                    'value' => ['regex:/^(((\+?98)|(0)|(0098))9[0-9]{9}$)/'],
                ],
                [
                    "value.regex" => '??????: ???????? ???????? ???? ?????????????? ???????? ??????!',
                ],
                [
                    'value' => '??????????',
                ]
            );
        }
        return true;
    }
}
