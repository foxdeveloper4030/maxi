<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LoveList;
use App\User;
class LoveListController extends Controller
{
    public $user;
    public function __construct()
    {

       if (!Auth::check())
           return redirect(route('login'));
       $this->user=Auth::user();
    }

    public function add($id){

        if (Auth::check()==false)
            return redirect('login');
         
        $this->user=Auth::user();
        if (LoveList::query()->where('user_id','=',$this->user->id)->where('product_id','=',$id)->first()!=null){
          
        }else{
            $love=new LoveList();
            $love->user_id=$this->user->id;
            $love->product_id=$id;
            $love->save();
          

        }
        return back();
    }
      public function delete($id){

        if (!Auth::check())
            return redirect(route('login'));
        $this->user=Auth::user();
        if (LoveList::query()->where('user_id','=',$this->user->id)->where('product_id','=',$id)->first()!=null) {
            LoveList::query()->where('user_id','=',$this->user->id)->where('product_id','=',$id)->first()->delete();

        }
        return back();
    }
}
