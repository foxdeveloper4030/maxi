<?php

namespace App\Exceptions;

use Exception;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;


class MySMSKavenegarException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render($request,Exception $exception)
    {

        $myMessage = $request->getMessage();
        if ($exception instanceof ApiException) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            $code = 801;
            return view('errors.customErrors.smsSend', compact(['code', 'myMessage']));
        } else if ($exception instanceof HttpException) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            $code = 802;
            return view('errors.customErrors.smsSend', compact(['code', 'myMessage']));
        }
    }
}
