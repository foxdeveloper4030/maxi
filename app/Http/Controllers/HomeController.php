<?php

namespace App\Http\Controllers;

use App\Page;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $isExhibition = false;
        $isExhibition = Setting::where('name','exhibition')->first()->isActive;
        return view('front.main', compact('isExhibition'));
    }

    public function pageCreate(Page $page)
    {
        return view('front.page', compact('page'));
    }

    public function newsletter(Request $request)
    {
        $user = Auth::user();

        $otherUser = User::where('email', $request->email)->orWhere('user_temp', $request->email)->first();

        if (\auth()->check()) {

            if ($otherUser && $otherUser->id != $user->id) {
                return response(['statusNewsletterOtherUser' => 'از این ایمیل، نمی توانید استفاده نمایید!'], 200);
            }

            if ($user->newsletter) {
                return response(['statusNewsletterHasOK' => 'قبلا، در خبرنامه عضو شده اید!'], 200);
            }
            if ($request->email == 'chkboxEmail') {  //  checkbox
                $user->update([
                    'newsletter' => true,
                    'ip_registration_newsletter' => $request->ip(),
                    'newsletter_date_add' => Carbon::now(),
                ]);
            } else {                                  //  input
                $user->update([
                    'email' => $request->email,
                    'newsletter' => true,
                    'ip_registration_newsletter' => $request->ip(),
                    'newsletter_date_add' => Carbon::now(),
                ]);
            }

            return response(['statusNewsletterYes' => 'ایمیل شما در خبرنامه، ثبت گردید.'], 200);
        } else {
            return response(['statusNewsletterNo' => 'ابتدا ثبت نام کنید، یا وارد سایت شوید.'], 200);
        }
    }
}
