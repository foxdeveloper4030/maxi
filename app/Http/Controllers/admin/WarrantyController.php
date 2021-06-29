<?php

namespace App\Http\Controllers\admin;

use App\Color;
use App\Warranty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarrantyController extends Controller
{
    public function index(){
        return view('admin.warranty.allwarranties',['warranties'=>Warranty::all()]);
    }
    public function edit($id,Request $request){
        $warranty=Warranty::query()->find($id);
        if (isset($request->name))
            $warranty->name=$request->name;

        $warranty->save();
        return back();

    }
    public function add(Request $request){

        if (isset($request->name)){
            $warranty=new Warranty();
            $warranty->name=$request->name;

            $warranty->save();
        }


        return back();

    }
}
