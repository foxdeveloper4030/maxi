<?php

namespace App\Http\Controllers\admin;

use App\Copen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CopenController extends Controller
{
    public function create(){
        return view('admin.copen.create');
    }
    public function add(Request $request){
        $copen=new Copen();
        $copen->price=$request->price;
        $copen->off=$request->off;
        $copen->expired=$request->time;
        $copen->code=$request->code;
        $copen->save();
        return back();
    }

    public function edite($id){
        return view('admin.copen.edite',['copen'=>Copen::query()->find($id)]);
    }
    public function update(Request $request,$id){
        $copen=Copen::query()->find($id);
        $copen->price=$request->price;
        $copen->off=$request->off;
        $copen->expired=$request->time;
        $copen->code=$request->code;
        $copen->save();
        return back();
    }

    public function delete($id){
$copen=Copen::query()->find($id);
$copen->delete();
return redirect(route('admin.copen.show'));
    }
    public function show(){
        return view('admin.copen.show');
    }
}
