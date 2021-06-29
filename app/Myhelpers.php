<?php

use App\User;
use Illuminate\Support\Facades\Auth;


if (!function_exists('random_number_of_6')) {
    /**
     *این متد، یک عدد ده رقمی تصادفی را ایجاد می کند.
     */
    function random_number_of_6()
    {
        return random_int(10, 99) . random_int(10, 99) . random_int(10, 99);
    }
}

if (!function_exists('checkEmailOrMobile')) {
    /**
     * این متد مشخص میکند ک مقدار مورد نظر، ایمیل هست یا موبایل!
     * @param $identity
     * @return string
     */
    function checkEmailOrMobile($identity)
    {

        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'undefined';

        if ($fieldName == 'undefined') {
            $fieldName = filter_var($identity, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^((\+98)|(0)|(0098))9[0-9]{9}$/"))) ? 'mobile' : 'undefined';
        }

        return $fieldName;
    }
}

if (!function_exists('myB64encode')) {

    function myB64encode($str)
    {
        $salt = '@*^AqkJ2!';
        $result = base64_encode($str);
        $result = $result . $salt;
        $result = base64_encode($result);

        return $result;
    }
}

if (!function_exists('myB64decode')) {
    function myB64decode($str)
    {
        $result = base64_decode($str);
        $salt = '@*^AqkJ2!';
        $pos = strpos($result, $salt);
        $result = substr($result, $pos);
        $result = base64_decode($result);

        return $result;
    }
}

if (!function_exists('detectField')) {
    /*
     * این متد مشخص می کند ک کاربر، با ایمیل ثبت نام کرده است یا با موبایل، که برحسب اینها، واژه موبایل یا ایمیل را می آورد.
     * @return string
     * $param User $user
     */
    function detectField(User $user)
    {
        $strResult = '';

        if ($user->mobile != null) {
            $strResult = 'mobile';
        } else if ($user->email != null) {
            $strResult = 'email';
        } else {      //  هنوز کاربر، کد تایید را، وارد نکرده
            $strResult = checkEmailOrMobile($user->user_temp);
        }

        return $strResult;
    }
}

