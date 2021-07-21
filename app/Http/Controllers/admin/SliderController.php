<?php

namespace App\Http\Controllers\admin;

use App\PublicModel;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(){
        return view('admin.design.index');
    }

    public function create(){
        return view('admin.design.slider_create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:banners',

            'url'=>'required|image',
            'link'=>'required'
        ],['title.required'=>'عنوان محصول الزامی می باشد!','title.unique'=>'این عنوان قبلا ثبت شد!','url.required'=>'فایل  تصویر الزامی است!!','url.image'=>'فایل  تصویر نمی باشد!','link.required'=>'لینک وارد نشده است.']);
         $slider=new Slider();
         $public=new PublicModel();
        $file=$request->file('url');
        $filename=time().$file->getClientOriginalName();
        $file->move('public/assets/img/slider/',$filename);
        $slider->link=$request->link;
        $slider->url='public/assets/img/slider/'.$filename;
         if (true)
         $slider->url='public/assets/img/slider/'.$filename;
         else
             return back();
         $slider->title=$request->title;

         if ($slider->save()){

             session()->flash('alert','<div class="alert alert-success">اسلایدر ذخیره شد</div>');
             return redirect(route('admin.slider.show',['id'=>$slider->id]));
         }
        session()->flash('alert','<div class="alert alert-danger">خطا در ارتباط با سرور</div>');
        return back();
    }
    public function show($id){
        $slider=Slider::query()->find($id);
        return view('admin.design.slider_show',['slider'=>$slider]);
    }
    public function edite($id,Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:sliders',
            'link'=>'required',
            'url'=>'image|nullable'
        ],['title.required'=>'عنوان محصول الزامی می باشد!','title.unique'=>'این عنوان قبلا ثبت شد!','url.image'=>'فایل  تصویر نمی باشد!','link.required'=>'لینک وارد نشده است.']);
     $slider=Slider::query()->find($id);
     $slider->link=$request->link;
     $slider->title=$request->title;
     $public=new PublicModel();
     if (isset($request->url))
     {
         $move=$public->image($request,'public/assets/img/slider/','url');
         if ($move){
             if (file_exists($slider->url))
                 unlink($slider->url);
             $slider->url='public/assets/img/slider/'.$move;

         }

     }
     if ($slider->save()){

            session()->flash('alert','<div class="alert alert-success">اسلایدر ذخیره شد</div>');
            return redirect(route('admin.slider.show',['id'=>$slider->id]));
     }
        session()->flash('alert','<div class="alert alert-danger">خطا در ارتباط با سرور</div>');
        return back();
    }
    public function remove($id){
        $slider=Slider::query()->find($id);
        if (file_exists($slider->url))
            unlink($slider->url);
        Slider::query()->find($id)->delete();
        return back();
    }
}
