<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Product_category;
use App\Product_Slider;
use App\PublicModel;
use App\Slider;
use App\Special;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use UsermessageTableSeeder;
use UsersTableSeeder;
use UserthreadTableSeeder;

class CategryController extends Controller
{
    public function show($name)
    {

        $namecat = (new PublicModel)->name_format($name);
        $cat = Category::query()->where('name', '=', $namecat)->first();
        if ((new PublicModel())->isImpty($cat))
            return redirect('404');


        $products1 = array();
        $products = Product::query()->orWhere('category_id', '=', $cat->id)->Where('price_main', '>', 1000);

        foreach (Product_category::query()->where('category_id', '=', $cat->id)->orderByDesc('product_id')->paginate(15) as $product_id) {

            $product1 = Product::query()->find($product_id->id_product);
            if ($product1 != null)
                if ($product1->price_main > 1000)
                    //array_push($products1,$product1);
                    $products->addBinding($product1);
        }

        return view('front.category_show', ['filter' => 'no', 'category' => $cat, 'products' => $products->paginate(20), 'count' => count($products->get())]);


    }

    public function filter($name, $filter)
    {
        $namecat = (new PublicModel)->name_format($name);
        $cat = Category::query()->where('name', '=', $namecat)->first();
        if ((new PublicModel())->isImpty($cat))
            return redirect('404');


        $products1 = array();
        $products = Product::query()->orWhere('category_id', '=', $cat->id)->Where('price_main', '>', 1000);
        foreach (Product_category::query()->where('category_id', '=', $cat->id)->orderByDesc('product_id')->paginate(15) as $product_id) {
            $product1 = Product::query()->find($product_id->id_product);
            if ($product1 != null)
                if ($product1->price_main > 1000)
                    //array_push($products1,$product1);
                    $products->addBinding($product1);
        }

        if (isset($filter)) {
            switch ($filter) {
                case 'ex':
                    $products = $products->orderBy('price_main');
                    break;
                case 'ch':
                    $products = $products->orderByDesc('price_main');
                case 'view':
                    $products = $products->orderByDesc('view');
                    break;
                case 'new':
                    $products = $products->orderByDesc('created_at');
            }
        }
        return view('front.category_show', ['filter' => $filter, 'category' => $cat, 'products' => $products->paginate(20), 'count' => count($products->get())]);


    }

    public function special()
    {
        $filter = '';
        $products = DB::table('products')->select('*')->join('specials', 'product_id', '=', 'products.id');
        $ids = array();
        //return $products->get();
        foreach ($products->get() as $product) {
            if (!empty($product))
                array_push($ids, $product->slug);
        }

        return view('front.special_show', ['filter' => $filter, 'products' => $ids, 'count' => count($ids)]);

    }

    public function specialfilter($filter)
    {

        $products = DB::table('products')->select('*')->join('specials', 'product_id', '=', 'products.id');
        $ids = array();
        if (isset($filter)) {
            switch ($filter) {
                case 'ex':
                    $products = $products->orderBy('price_main');
                    break;
                case 'ch':
                    $products = $products->orderByDesc('price_main');
                case 'view':
                    $products = $products->orderByDesc('view');
                    break;

            }
        }
        //return $products->get();
        foreach ($products->get() as $product) {
            if (!empty($product))
                array_push($ids, $product->slug);
        }

        return view('front.special_show', ['filter' => $filter, 'products' => $ids, 'count' => count($ids)]);

    }

    public function slider($id)
    {
        $slider = Slider::query()->find($id);
        if ($slider == null)
            return redirect('404');

        $filter = '';
        $products = array();
        foreach (Product_Slider::query()->where('slider_id', '=', $id)->get() as $product) {
            $p = Product::query()->find($product->product_id);
            if ($p->price_main > 1000)
                array_push($products, $p);
        }


        return view('front.slider_show', ['filter' => $filter, 'slider' => $slider, 'products' => $products, 'count' => count($products)]);


    }


}
