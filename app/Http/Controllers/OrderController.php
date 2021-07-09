<?php

namespace App\Http\Controllers;

use App\Card;
use App\City;
use App\Classes\MyOrder;
use App\Order;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use App\Cariar;
use App\Model\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $user;
    public $price;

    public function __construct()
    {
        if (!Auth::check()) {
            session(['redirect' => url('') . '/order/register']);
            return redirect('login');
        }

        $this->user = Auth::user();

        //   Auth::login($user->id);
        $this->price = 0;
        if (!\session()->has('cart'))
            return redirect('');
        if (\session()->has('cart') && !\session()->has('order'))
            foreach (session('cart') as $cart) {
                $this->price += $cart['price'];
            }

    }

    public function register()
    {
        //return $this->user;
        if (!Auth::check()) {
            session(['myredirect' => url('') . '/order/register']);
            return redirect('login');
        }
        $this->user = Auth::user();
        $ad = Order::query()->where('id_user', '=', $this->user->id)->first();
        $provinces = Province::all();
        $addresses = DB::table('ps_address')->where('user_id', $this->user->id)->get();
        return view('front.orderregister',
            ['user' => Auth::user(), 'ad' => $ad, 'provinces' => $provinces, 'addresses' => $addresses]);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {

            return redirect('login');
        }

        if (!session('cart')) {
            return redirect()->route('urlMain');
        }

        $this->user = Auth::user();
        $this->price = 0;
        foreach (session('cart') as $cart) {
            $this->price += $cart['price'];
        }

        $validatedData = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required',
            'phone_mobile' => 'required',
            'postcode' => 'required',
            'address1' => 'required',
            'provinceId' => 'required',
            'cityId' => 'required',
        ], [
            'firstname.required' => 'نام الزامی است',
            'lastname.required' => 'نام خانوادگی الزامی است',
            'phone_mobile.required' => 'شماره موبایل الزامی است',
            'postcode.required' => 'کدپستی الزامی است',
            'address1.required' => 'آدرس الزامی است',
            'provinceId.required' => 'استان الزامی است',
            'cityId.required' => 'شهر الزامی است'
        ]);

        if ($request->city == null) {
            $request->city = City::find($request->cityId)->name;
        }

        if ($request->newAddress) {
            DB::table('ps_address')->insert([
                "user_id" => $this->user->id,
                "title" => $request->title,
                "firstname" => $request->firstname,
                "title" => $request->title,
                "lastname" => $request->lastname,
                "phone_mobile" => $request->phone_mobile,
                "province_id" => $request->provinceId,
                "city_id" => $request->cityId,
                "city" => $request->city,
                "postcode" => $request->postcode,
                "address1" => $request->address1,
            ]);
        }

        $order = new Order();
        $order->name = $request->firstname;
        $order->lastname = $request->lastname;
        $order->id_user = $this->user->id;
        $order->price = $this->price;
        $order->tel = $request->phone_mobile;
        $order->addres = $request->address1;
        $order->postal_code = $request->postcode;
        $order->province_id = $request->provinceId;
        $order->city_id = $request->cityId;
        $order->refrens = substr(md5(time() . rand(0, 100000)), 0, 10);
        if ($order->save()) {

            $count = 0;
            foreach (session('cart') as $c) {
                $card = new Card();
                $card->user_id = $this->user->id;
                $card->price = $c['price'];
                $card->count = $c['count'];
                $card->product_id = $c['product_id'];
                $card->color_id = 0;
                $card->warranty_id =0;
                $card->price_one_off=$c['price_one_off'];
                $card->price_one=$c['price_one'];
                $card->price_off=$c['price_off'];
                if (isset($c['product_color']))
                    $card->color_id = $c['product_color'];
                if (isset($c['warranty'])){
                    $card->warranty_id = $c['warranty'];

                }

                $card->order_id = $order->id;


                $card->save();

                $count++;
            }

            if (1) {
                \session(['order' => $order->id]);
                // \session()->remove('cart');
                return redirect(route('order.step1'));
            } else {
                return back();
            }
        }
    }

    public function add($id)
    {
        if (!Auth::check()) {

            return redirect('login');
        }
        $this->user = Auth::user();
        $order = Order::query()->find(\session('order'));
        $cariar = Cariar::query()->find($id);
        $price = $order->price;
        $cariar_price = 0;
        if ($cariar->free != 0) {
            if ($cariar->free > $order->price) {
                $price += $cariar->price;
                $cariar_price = $cariar->price;
            }

        }
        else
            $cariar_price = $cariar->price;

        $text = '
بازه تحویل سفارش: زمان تقریبی تحویل از ';
        $text .= (new Date())->jdate('j', time() + 3600 * $cariar->time_low);
        $text .= '' . (new Date())->jdate('F', time() + 3600 * $cariar->time_low);
        $text .= ' ' . 'الی';
        $text .= (new Date())->jdate('j', time() + 3600 * $cariar->time_hi);
        $text .= '' . (new Date())->jdate('F', time() + 3600 * $cariar->time_hi);
        $text .= ' می باشد.';
        return ['text' => $text, 'price' => number_format($price), 'cariar_price' => number_format($cariar_price)];
    }

    public function payment(Request $request)
    {
        $this->validate($request,
            [
                'carrierId' => 'required|numeric',
                'orderId' => 'required|numeric',
            ], [
                'carrierId.required' => 'لطفا :attribute را انتخاب نمایید.',
                'orderId.required' => 'لطفا :attribute را انتخاب نمایید.',
            ], [
                'carrierId' => 'نوع ارسال مرسولات',
                'orderId' => 'سفارشات',
            ]);

        $purchaseFactor = 0;
        if (isset($request->purchaseFactor))
            $purchaseFactor = 1;
//return Cariar::query()->find($request->carrierId);
        $order = Order::find($request->orderId);
        $post_price=Cariar::query()->find($request->carrierId)->price;
        if (Cariar::query()->find($request->carrierId)->free<=$order->price)
            $post_price=0;
        if ($order) {
            $order->update([
                'post_id' => $request->carrierId,
                'post_price'=>$post_price,
                'purchaseFactor' => $purchaseFactor,
            ]);
            $order->post_price=$post_price;
            $order->save();
            $price = ($order->price+$post_price) * 10;
            try {



                $key="8v8AEee8YfZX+wwc1TzfShRgH3O9WOho";
                $MerchantId="000000140336964";
                $TerminalId="24095674";
                //  $Amount=$price; //Rials
                $Amount=1000000;
                $OrderId=$order->id;
                $LocalDateTime=date("m/d/Y g:i:s a");
                $ReturnUrl=url('order/pay/result/out');
                $SignData=$this->encrypt_pkcs7("$TerminalId;$OrderId;$Amount","$key");
                $data = array('TerminalId'=>$TerminalId,
                    'MerchantId'=>$MerchantId,
                    'Amount'=>$Amount,
                    'SignData'=> $SignData,
                    'ReturnUrl'=>$ReturnUrl,
                    'LocalDateTime'=>$LocalDateTime,
                    'OrderId'=>$OrderId);
                $str_data = json_encode($data);
                $res=$this->CallAPI('https://sadad.shaparak.ir/vpg/api/v0/Request/PaymentRequest',$str_data);
                $arrres=json_decode($res);
                if($arrres->ResCode==0)
                {
                    $Token= $arrres->Token;
                    $url="https://sadad.shaparak.ir/VPG/Purchase?Token=$Token";
                    header("Location:$url");
                }
                else
                    die($arrres->Description);






            } catch (Exception $e) {
                dd($e);
                echo $e->getMessage();
            }
        } else {

        }
    }

    public function resultPurchase($orderId)
    {
        return 444;
        try{
            $order = Order::findORFail($orderId);
            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
        }

        catch (Exception $e) {

            echo $e->getMessage();
        }

    }
    //Create sign data(Tripledes(ECB,PKCS7))
    public function encrypt_pkcs7($str, $key)
    {
        $key = base64_decode($key);
        $ciphertext = OpenSSL_encrypt($str,"DES-EDE3", $key, OPENSSL_RAW_DATA);
        return base64_encode($ciphertext);
    }
//Send Data
    public function CallAPI($url, $data = false)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }



    public function getResult(Request $request){
        $key="lSpziaoJgjwlqFyeem8YtejNfCO9EWEL";
        if (isset($request->token)&&isset($request->OrderId)&&isset($request->OrderId)){
            $order=Order::query()->find($request->OrderId);
            $startTime = \Carbon\Carbon::parse($order->created_at);
            $finishTime = \Carbon\Carbon::parse(\Carbon\Carbon::now());

            $totalDuration = ($finishTime->timestamp-$startTime->timestamp)/60;
            if ($totalDuration>30)
                return redirect('404');
            $OrderId=$order->id;
            $Token=$request->token;
            $ResCode=$request->ResCode;
            if($ResCode==0)
            {
                $verifyData = array('Token'=>$Token,'SignData'=>$this->encrypt_pkcs7($Token,$key));
                $str_data = json_encode($verifyData);
                $res=$this->CallAPI('https://sadad.shaparak.ir/vpg/api/v0/Advice/Verify',$str_data);
                $arrres=json_decode($res);
                $order->state_id=2;
                $order->save();

                return view('front.shopping_ok_buy',['order'=>$order]);
            }
            else
                return view('front.shopping_no_buy');
        }
        else{
            return redirect('404');
        }
    }
}
