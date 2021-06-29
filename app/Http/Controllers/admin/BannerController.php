<?php

namespace App\Http\Controllers\admin;

use App\Banner;
use App\PublicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index(){
        return view('admin.design.banner_index',['banners'=>Banner::query()->orderBy('position')->get()]);
    }
    public function edite($id,Request $request){

        $public=new PublicModel();
        $banner=Banner::query()->find($id);
        if (isset($request->url))
        {
            $file=$request->file('url');
            $filename=time().$file->getClientOriginalName();
            $file->move('public/assets/img/banner/',$filename);


                if (file_exists($banner->url))
                    unlink($banner->url);
                $banner->url='public/assets/img/banner/'.$filename;
        }
        $banner->title=$request->title;
        $banner->link=$request->link;

        if ($banner->save()){
            session()->flash('alert','<div class="alert alert-success">تغییرات ذخیره شد</div>');
            return back();
        }
        session()->flash('alert','<div class="alert alert-danger">خطا در ارتباط با سرور</div>');
        return back();

    }
}
