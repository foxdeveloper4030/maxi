<?php

namespace App\Http\Controllers\admin;

use App\Attribute_Group;
use App\Count;
use App\Model\ProductModel;
use App\Product;
use App\Product_category;
use App\Product_Image;
use App\PublicModel;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{


    public function __construct()
    {
      //  session()->remove('product_store_id');
  // session(['product_store_id'=>10]);
    }

    public function index()
    {
        $products = Product::query()->orderByDesc('id')->paginate(20);
        $exhibition = Setting::where('name', 'exhibition')->first();
        return view('admin.product.index', ['products' => $products, 'exhibition' => $exhibition]);
    }

    public function exhibit(Request $request)
    {
        $exhibition = Setting::where('name', 'exhibition')->first();
        $val = 0;

        if ($request->chk == "true"){
            $val = 1;
        }
        $exhibition->update([
            'isActive' => $val ,
        ]);

        return response()->json([
            'data' => [
                'success' => true,
                'status' => $val
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /*  if (session()->has('product_store_id'))
         return view('admin.product.StepValidation');
        else*/
        return view('admin.product.create');
    }


    public function store(Request $request)
    {
        $keys = ['category_id', 'name', 'details','quantity', 'price_main', 'wholesale_price', 'number', 'meta_title', 'meta_keyword', 'meta_description', 'type', 'active', 'active_special', 'totalSelling', 'totalVisited'];
        $validatedData = $request->validate([
            'name' => 'required|unique:products',
            'wholesale_price' => 'nullable',
            'price_main' => 'required',
            'image' => 'required|image',
            'quantity'=>'required',
        ], ['name.required' => 'نام محصول الزامی می باشد!', 'name.unique' => 'این نام قبلا ثبت شد!', 'image.required' => 'فایل  تصویر الزامی است!!', 'image.image' => 'فایل  تصویر نمی باشد!', 'image.mimes' => 'فرمت تصویر باید jpg باشد']);

        $product = new Product();

        foreach ($keys as $key) {
            $this->setp($product, $key, $request);
        }

        $product->slug = str_replace(' ', '_', $request->name);
        $save = $product->save();


        if ($save) {
            $image = new Product_Image();
            $image->id_product = $product->id;
            $image->cover = 1;
            $model = new PublicModel();
            $file = $request->file('image');
            $filename = time().rand(0,100000). '.' . $file->getClientOriginalExtension();
            $image->url=$filename;
            $image->save();
            $file->move((new PublicModel())->public_image_folder, $filename);

            session()->flash('alert', '<div class="alert alert-success">محصول جدید با موفقیت ثبت شد!</div>');
            session(['product_store_id'=>$product->id]);
            return back();
        } else {
            session()->flash('alert', '<div class="alert alert-danger">خطای صورت گرفت!!</div>');
            return back();
        }

    }
    public function show($id)
    {
        $product = Product::query()->find($id);
        if ((new PublicModel())->isImpty($product))
            return redirect('404');


        return view('admin.product.show', ['product' => $product]);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {

        $keys = ['category_id', 'name','quantity', 'details', 'price_main', 'wholesale_price', 'number', 'meta_title', 'meta_keyword', 'meta_description', 'type', 'active', 'active_special', 'totalSelling', 'totalVisited'];
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity'=>'required',
            'wholesale_price' => 'required',
            'price_main' => 'required',

        ], ['name.required' => 'نام محصول الزامی می باشد!']);

        $product = Product::query()->find($id);

        foreach ($keys as $key) {
            $this->setp($product, $key, $request);
        }

        $product->slug = str_replace(' ', '_', $request->name);
        //  return json_decode($request->cats);
        $save = $product->save();


        if ($save) {

            session()->flash('alert', '<div class="alert alert-success">محصول  با موفقیت ویرایش شد!</div>');
            return back();
        } else {
            session()->flash('alert', '<div class="alert alert-danger">خطای صورت گرفت!!</div>');
            return back();
        }
    }
    public function destroy($id)
    {
        //
    }
    public function setp($product, $value, $requst)
    {
        if (isset($requst[$value]))
            $product[$value] = $requst[$value];
    }
    public function special_add()
    {
        return view('admin.product.special');
    }
    public function all_comment($id){
        $product=Product::query()->find($id);
        $comments=$product->comments->where('deleted','=',0);
        return view('admin.product.comments',['comments'=>$comments,'product'=>$product]);
    }
    public function step_add(){
        if (session()->has('product_store_id'))
        return view('admin.product.multi-selection');
        return redirect(route('products.create'));
    }
    public function delete_session_product(){

        if (session()->has('product_store_id'))
            session()->remove('product_store_id');
        return redirect(route('products.create'));
    }
}
