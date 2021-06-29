<?php

namespace App\Http\Controllers\admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product_category;
use App\PublicModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::query()->orderBy('created_at')->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $nameBrand = $brand->title;
        $brand->delete();
        return response([
            'messageDelete' => 'برند ' . $nameBrand . ' حذف گردید',
            'idDelete' => $id,
        ], 200);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        // از این نوع ولیدیشن وقتی استفاده میکنیم ک از ایجکس استفاده کرده باشیم.
        $valid = Validator::make($request->except('_token'), [
            'title' => 'required',

            'imgUrl' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb,
        ], [

        ], [
            'title' => 'نام برند',
            'siteUrl' => 'وب‌سایت',
            'imgUrl' => 'عکس',
        ]);

        if ($valid->passes()) {
            if ($request->hasFile('imgUrl')) {
                $dash = DIRECTORY_SEPARATOR;
                $img = $request->file('imgUrl');
                $fileName = date('H-i-s') . '-' . $img->getClientOriginalName();
                $destDirectory = 'public' . $dash . 'assets' . $dash . 'img' . $dash . 'brand';
                $img->move($destDirectory, $fileName);

                $imgPath = $destDirectory . $dash . $fileName;
                $imgPathUrl = asset($imgPath);

                Brand::insert([
                    'title' => $request->title,
                    'imgUrl' => $imgPathUrl,
                    'alt' => $request->title,
                    'siteUrl' => $request->siteUrl,
                ]);
            }

            return response([
                'status' => 'بنر با موفقیت، افزوده شد.'
            ], 200);
        } else {  //  data dose not validation
            return response([
                'errors' => $valid->errors()->all(),
            ], 200); //  422 نمیزارم، چون میخام وارد قسمت success ایجکس بشه.
        }
        dd($request->all());
    }
}
