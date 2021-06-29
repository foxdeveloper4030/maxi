<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
        // Auth::login($this->user);
    }

    public function index()
    {
        $user = Auth::user();
        $addresses = DB::table('ps_address')->where('user_id', $user->id)->get();

        $provinces = Province::all();
        return view('auth.panel', compact('addresses', 'provinces'));
    }

    public function deleteAddress($id)
    {
        $addressUser = DB::table('ps_address')->where('id', $id)->delete();
        return response([
            'status' => 'ok',
            'idDelete' => $id
        ], 200);
    }

    public function updateAddressUser(Request $request, $id)
    {
        $cityName = City::where('id', $request->city)->first()->name;
        DB::table('ps_address')->where('id', $id)->update([
            "firstname" => $request->firstname,
            "title" => $request->title,
            "lastname" => $request->lastname,
            "phone_mobile" => $request->phone_mobile,
            "province_id" => $request->province,
            "city_id" => $request->city,
            "city" => $cityName,
            "postcode" => $request->postcode,
            "address1" => $request->address1,
        ]);

        return response([
            'status' => 'ok',
            'idUpdate' => $id
        ], 200);
    }

    public function editepass()
    {
        return view('auth.change_pass');
    }

    public function updatePass(Request $request)
    {
        $validatedData = $request->validate([
            'oldpass' => 'required',
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
        ], [], [
            'oldpass' => 'پسورد قبلی',
            'password' => 'پسورد جدید',
        ]);

        $user = Auth::user();
        if (Auth::Check()) {
            if (Hash::check($request->oldpass, $user->password)) {
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
                return redirect(route('main.user.index'))->with('status', 'با موفقیت، انجام شد!');
            } else {
                return back()->with('status', 'رمز عبور قبلی شما');
            }
        } else {
//            TODO: چنین کاربری وجود ندارد!
        }
        if ($request->newpass == $request->rnewpass) {
            $this->user->password = Hash::make($request->newpass);
            $this->user->save();
            return redirect(route('main.user.index'));
        } else {
            return back();
        }
    }

    public function allorder()
    {
        $user = Auth::user();
        $addresses = DB::table('ps_address')->where('user_id', $user->id)->get();
        $provinces = Province::all();

        return view('auth.allorder', compact('addresses', 'provinces'));
    }

    public function return()
    {
        $user = Auth::user();
        $addresses = DB::table('ps_address')->where('user_id', $user->id)->get();
        $provinces = Province::all();

        return view('auth.return', compact('addresses', 'provinces'));
    }

    public function love()
    {
        $user = Auth::user();
        $addresses = DB::table('ps_address')->where('user_id', $user->id)->get();
        $provinces = Province::all();

        return view('auth.love', compact('addresses', 'provinces'));
    }

    public function updateInfoUser(Request $request)
    {
        $user = Auth::user();
        $avaPathUrl = '';
        if ($request->hasFile('myavatar')) {
            $dash = DIRECTORY_SEPARATOR;
            $avatar = $request->file('myavatar');
            $fileName = date('y-m-d_H-i-s') . '-' . $avatar->getClientOriginalName();
            $destDirectory = 'public' . $dash . 'assets' . $dash . 'img' . $dash . 'avatar';
            $avatar->move($destDirectory, $fileName);
            $avaPath = $destDirectory . $dash . $fileName;
            $avaPathUrl = asset($avaPath);

        }

        if ($avaPathUrl) {
            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'website' => $request->website,
                'website' => $request->website,
                'birthday' => $request->birthday,
                'avatar' => $avaPathUrl,
            ]);
        } else {
            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'website' => $request->website,
                'website' => $request->website,
                'birthday' => $request->birthday,
            ]);
        }

        return response(['status', true]);
    }

    public function deleteAvatarUser()
    {
        $user = Auth::user();
        if ($user) {
            $user->update([
                'avatar' => '',
            ]);
        }
        $defaultUrlImg = asset('public/assets/img/svg/myavatar.png');
        return response(['defaultUrlImg' => $defaultUrlImg]);
    }
}