<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\Special;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.product.specials');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.special_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'time' => 'required',
            'id' => 'required',
            'off' => 'required',
        ]);
        $product=Product::query()->find($request->id);

        if ($request->time<time()){
            session()->flash('alert','<div class="alert alert-danger">  تاریخ پایان انقضا شده است!!</div>');
return back();
        }
         else
             if ($request->off>$product->price_main){
                 session()->flash('alert','<div class="alert alert-danger">  قیمت تخفیفی از قیمت محصول بیشتر است!!</div>');
                 return back();
             }
             else{
               $special=new Special();
               $special->product_id=$product->id;
               $special->expire=$request->time;
               $special->price_off=$request->off;
               if ($special->save())
                   session()->flash('alert','<div class="alert alert-success">  طرح اضاف شد!!</div>');
                 return back();
             }
        session()->flash('alert','<div class="alert alert-danger"> خطایی صورت گرفت !!</div>');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function delete($id){
       Special::query()->find($id)->delete();
       session()->flash('alert','<div class="alert alert-success">  طرح حذف شد!!</div>');
       return back();
   }

    public function show($id)
    {
         return view('admin.product.show_speasial');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp=Special::query()->find($id);
        $sp->delete();
        return back();
    }
}
