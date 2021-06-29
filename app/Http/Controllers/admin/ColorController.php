<?php

namespace App\Http\Controllers\admin;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index(){
        return view('admin.color.allcolors',['colors'=>Color::all()]);
    }
    public function edit($id,Request $request){

        $color=Color::query()->find($id);
        if (isset($request->color))
            $color->color=$request->color;
        if (isset($request->name))
            $color->name=$request->name;
        $color->save();
        return back();

    }
    public function add(Request $request){

        if (isset($request->color)&&isset($request->name)){
            $color=new Color();
            $color->color=$request->color;
            $color->name=$request->name;
            $color->save();
        }


        return back();

    }
}
