<?php

namespace App\Http\Controllers\admin;

use App\Count;
use App\Product_Attribute;
use App\Product_Attribute_Combination;
use App\Ticket;
use App\PublicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function all(){
        $tickets=Ticket::all();
        return view('admin.tickets.tickets',['tickets'=>$tickets]);
    }
    public function new(){

        $tickets=Ticket::all();
        return view('admin.tickets.tickets_new',['tickets'=>$tickets]);
    }
    public function show($id){
        $tickets=Ticket::query()->find($id);
        return view('admin.tickets.show',['ticket'=>$tickets]);
    }
    public function add($id,Request $request){
        $t=new Ticket();
        $tic=Ticket::query()->find($id);
        $t->text=$request->text;
        $public=new PublicModel();
        $t->user_id=Auth::user()->id;
        $t->parent=$id;
        $t->seen=1;
        $t->to_user=$tic->user->id;
        $move=$public->image($request,'public/tickets','file');
        if ($move)
            $t->file=''.$move;
        $t->save();
        return back();

    }

}
