<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Order;
use Illuminate\Http\Request;

class RefrenseController extends Controller
{
    public function index(){
        return view('front.refrense');
    }
    public function show($refrense){
        $order=\App\Order::query()->where('refrens','=',$refrense);
        if ($order->first()!=null)
            return view('front.refrense_show',['order'=>$order->first()]);
        else
            return view('front.refrense',['alert'=>'سفارش '.$refrense.' یافت نشد!!!']);
    }
}
