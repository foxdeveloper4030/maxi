<?php

namespace App\Http\Controllers\admin;

use App\Events\EventOrderSentPost;
use App\Events\EventPurchase;
use App\Order;
use App\PublicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $state = 0;
        if (isset($_GET['state']))
            $state = $_GET['state'];
        $orders = collect();
        if ($state == 0 || $state == '') {
            $orders = Order::query()->where('state_id', '!=', 1)->orderByDesc('created_at')->paginate(15);
        } else if ($state >= 1) {

            $orders = Order::query()->where('state_id', '=', $state)->orderByDesc('created_at')->paginate(15);
        }

        return view('admin.order.allorder', compact(['orders', 'state']));
    }

    public function indexUnfinish()
    {
        $orders = Order::query()->where('state_id', 1)->orderByDesc('created_at')->paginate(15);
        return view('admin.order.allorderindexUnfinish', compact(['orders']));
    }

    public function search(Request $request)
    {
        $state = 0;
        $searchW = $request->search;
        $orders = Order::orWhere('name', 'LIKE', "%{$searchW}%")
            ->orWhere('lastname', 'LIKE', "%{$searchW}%")
            ->orWhere('refrens', 'LIKE', '%' . $searchW . '%')
            ->orderByDesc('created_at')->paginate(25);
        return view('admin.order.allorder', compact(['orders', 'state']));
    }

    public function show($id)
    {
        $order = Order::query()->find($id);
        $stateAllOrders = DB::table('order_states')->where('id', '!=', '1')->get();
        return view('admin.order.show', ['order' => $order, 'stateAllOrders' => $stateAllOrders,]);
    }

    public function showUnfinish($id)
    {
        $order = Order::query()->find($id);
//        $stateAllOrders = DB::table('order_states')->where('id', '!=', '1')->get();
        return view('admin.order.showUnfinish', ['order' => $order]);
    }

    public function changeorder($id, $state)
    {
        $trackPost = null;
        $order = Order::find($id);

        if ($state == 4) {
//            dd("پیامک برای اینکه خرید شما بررسی شد و تایید شد");
            $msg = "مشتری گرامی سفارش شما به شماره ".$order->refrens."، با موفقیت، در سایت ماکزی مورس مورد تایید قرار گرفت. با تشکر از خرید شما  maximorse.com";
           // event(new EventPurchase(auth()->user(), $order->price, $order->refrens, $order->tel, $msg));
            PublicModel::SendSms1($order->tel,urlencode($msg));
        } else if ($state == 5) {
            if (isset($_GET['trackPost']))
                $trackPost = $_GET['trackPost'];
            $msg = "مشتری گرامی سفارش شما به شماره ".$order->refrens." به آدرس گیرنده ارسال شده است. کد پیگیری مرسوله ارسالی  ".$trackPost."  می باشد. با تشکر از انتخاب شما maximorse.com ";
//            dd("خرید شما ارسال گردید کد ارسال مرسوله");
            PublicModel::SendSms1($order->tel,urlencode($msg));
        }

        $order->state_id = $state;
        if ($trackPost != null && $state == 5) {
            $order->postUUID = $trackPost;
        }
        $order->save();
        return back();
    }

    public function delete($id)
    {
        Order::find($id)->delete();
        return redirect()->route('admin.order.indexUnfinish');
    }
}
