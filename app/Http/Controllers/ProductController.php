<?php

namespace App\Http\Controllers;

use App\Attribute_Group;
use App\Attribute_Image;
use App\Category;
use App\Model\ProductModel;
use App\Product;
use App\Product_Warranty;
use App\Attribute;
use App\Product_Attribute;
use App\Product_Attribute_Combination;
use App\PublicModel;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class ProductController extends Controller
{
    public function show($slug)
    {

        $product = Product::query()->where('slug', '=', $slug)->first();
        if ((new PublicModel())->isImpty($product))
            return redirect('404');
        $product->view = $product->view + 1;
        $product->save();
        $groups = array();
        $atrributes = array();
        $coms = array();
        foreach ($product->attrs as $attr) {
            $group = new Attribute_Group();
            foreach ($attr->combines as $combine) {
                $group = $combine->atrr->group;
                $insert = true;
                foreach ($groups as $gr) {
                    if ($gr->id == $group->id)
                        $insert = false;
                }
                if ($insert)
                    array_push($groups, $group);
            }
        }
        foreach ($product->attrs as $attr) {
            foreach ($attr->combines as $combine) {


                $insert = true;
                foreach ($coms as $item) {
                    if ($item == $combine)
                        $insert = false;
                }
                if ($insert)
                    array_push($coms, $combine);
            }
        }

        foreach ($coms as $combine) {

            $atrribute = $combine->atrr;
            $insert = true;
            foreach ($atrributes as $item) {
                if ($item == $atrribute)
                    $insert = false;
            }
            if ($insert)
                array_push($atrributes, $atrribute);
        }
        $type = 0;
        if (count($product->attrs) >= 1)
            $type = 1;
        $count = 0;
        if ($type == 0)
            $count = $product->count->quantity;
        $price = 0;
        if ($type == 0)
            $price = $product->price_main;
        $attr_id = 0;
        if ($type == 1) {
            $atr = $product->attrs->where('default_on', '=', 1)->first();
            $attr_id = $atr->id;
            $price += $atr->price;
            $count = $atr->counts->quantity;
        }
        session(['product' => ['product' => $product, 'groups' => $groups, 'combines' => $coms, 'attrs' => $atrributes]]);
        //return session('product');

        $categories = [];
        $myCategory = $product->category()->first();
        while (true) {
            array_push($categories, $myCategory->name);
            if ($myCategory->parent_id == 0) {
                break;
            }
            $myCategory = Category::where('id', $myCategory->parent_id)->first();
        }

        $isExhibition = false;
        $isExhibition = Setting::where('name','exhibition')->first()->isActive;

        return view('front.show_product2', ['attr_id' => $attr_id, 'price' => $price, 'count' => $count, 'type' => $type, 'product' => $product, 'groups' => $groups, 'combines' => $coms, 'attrs' => $atrributes, 'categories' => $categories,'isExhibition' => $isExhibition]);

    }

    public function show_load($slug)
    {

        $product = Product::query()->where('slug', '=', $slug)->first();
        if ((new PublicModel())->isImpty($product))
            return redirect('404');
        $product->view = $product->view + 1;
        $product->save();
        $groups = array();
        $atrributes = array();
        $coms = array();
        foreach ($product->attrs as $attr) {
            $group = new Attribute_Group();
            foreach ($attr->combines as $combine) {
                $group = $combine->atrr->group;
                $insert = true;
                foreach ($groups as $gr) {
                    if ($gr->id == $group->id)
                        $insert = false;
                }
                if ($insert)
                    array_push($groups, $group);
            }
        }
        foreach ($product->attrs as $attr) {
            foreach ($attr->combines as $combine) {


                $insert = true;
                foreach ($coms as $item) {
                    if ($item == $combine)
                        $insert = false;
                }
                if ($insert)
                    array_push($coms, $combine);
            }
        }

        foreach ($coms as $combine) {

            $atrribute = $combine->atrr;
            $insert = true;
            foreach ($atrributes as $item) {
                if ($item == $atrribute)
                    $insert = false;
            }
            if ($insert)
                array_push($atrributes, $atrribute);
        }
        $type = 0;
        if (count($product->attrs) >= 1)
            $type = 1;
        $count = 0;
        if ($type == 0)
            $count = $product->count->quantity;
        $price = 0;
        if ($type == 0)
            $price = $product->price_main;
        $attr_id = 0;
        if ($type == 1) {
            $atr = $product->attrs->where('default_on', '=', 1)->first();
            $attr_id = $atr->id;
            $price += $atr->price;
            $count = $atr->counts->quantity;

        }
        session(['product' => ['product' => $product, 'groups' => $groups, 'combines' => $coms, 'attrs' => $atrributes]]);
        //return session('product');
        return view('front.load-product', ['attr_id' => $attr_id, 'price' => $price, 'count' => $count, 'type' => $type, 'product' => $product, 'groups' => $groups, 'combines' => $coms, 'attrs' => $atrributes]);
    }

    public function getdata(Request $request)
    {
        $filds = array();
        $data = array();

        foreach (session('product')["groups"] as $group) {
            array_push($filds, ['key' => 'group' . $group->id, 'value' => $request["group" . $group->id]]);
            array_push($data, $request["group" . $group->id]);
        }

        $attrs = session('product')['product']->attrs;
        $attr_id = 0;
        $text = "[";
        $index = 0;
        foreach ($filds as $fild) {
            $index++;
            if ($index == count($data))
                $text .= $fild["value"];
            else
                $text .= $fild["value"] . ',';

        }
        $text .= ']';

        foreach ($attrs as $at) {
            if ($at->attrs == $text)
                $attr_id = $at->id;
        }
        //   session(['pr'=>[$combines,session('product')['attrs']]]);
        $attribute = Product_Attribute::query()->find($attr_id);
        $image = null;
        $url = null;
        $count = 0;
        $price = session('product')['product']->price_main;

        if ($attribute != null) {
            $count = $attribute->counts->quantity;
            $price += $attribute->price;
        }

        $data = ["attr_id" => $attr_id, 'url' => (new PublicModel())->image_Atrbute($attr_id), 'count' => $count, 'price' => $price];
        return $data;
    }

    public function simpelcart(Request $request)
    {
        $id = $request->id;
        $product=Product::query()->find($id);
        if ($product!=null){
            $type = 0;

            $number = $product->quantity;

            if (!session()->has('cart'))
                session(['cart' => array()]);
            $cart = session('cart');
            //   session()->remove('cart');
            //  return 1;
            $newcart = array();
            $exist = false;
            //   return count($cart);
            $state = false;
            $count = $product->quantity - (new ProductModel($product->id))->thread();
            foreach ($cart as $item) {
                $remove = false;
                if ($item['product_id'] == $product->id) {
                    if ($count >= $item['count'] + 1) {
                        $state = true;
                        $item['count'] = $item['count'] + 1;
                    } else
                        $state = false;

                    $exist = true;

                    if (isset($request->count))
                        if ($request->count < 0)
                            $remove = true;

                    $item['price'] = $item['count'] * $product->price_main;
                }
                if (!$remove)
                    array_push($newcart, $item);
            }
            if ($exist == false) {
                if ($count > 0) {
                    array_push($newcart, ['product_id' => $product->id, 'count' => 1, 'price' => $product->price_main,'price_one'=>$product->price_main]);
                    $state = true;
                } else $state = false;

            }

            session(['cart' => $newcart]);
            return ['cart' => 1, 'state' => ['status' => $state, 'text' => "ممم"]];

        }


    }



    public function maincart(Request $request)
    {
        $id = $request->id;

        if ($product = Product::query()->where('id', '=', $id)->first())
            if ((new PublicModel())->isImpty($product))
                return redirect('404');
        $type = 0;
        $product = Product::query()->where('id', '=', $id)->first();

        if (count($product->attrs) >= 1)
            $type = 1;
        if ($type == 1) {
            $id = $request->id;
            if ($product = Product::query()->where('id', '=', $id)->first())
                if ((new PublicModel())->isImpty($product))
                    return redirect('404');
            $type = 0;
            $product = Product::query()->where('id', '=', $id)->first();
            $attr_id = $request->attr_id;
            if (count($product->attrs) >= 1)
                $type = 1;
            if ($type == 0)
                return redirect('404');


            if (!session()->has('cart'))
                session(['cart' => array()]);
            $cart = session('cart');
            //   session()->remove('cart');
            //  return 1;
            $newcart = array();
            $exist = false;
            //   return count($cart);
            $state = false;
            $text = "not eq";
            $count = Product_Attribute::query()->find($attr_id)->counts->quantity - (new ProductModel($product->id))->thread($attr_id);
            foreach ($cart as $item) {
                $remove = false;
                if ($item['product_id'] == $product->id && isset($item['attr_id']))
                    if ($attr_id == $item['attr_id']) {
                        $text = "eq=" . $attr_id;

                        // $item['count']=$item['count']+1;
                        if ($count >= $item['count'] + 1) {
                            $state = true;
                            $item['count'] = $item['count'] + 1;
                        } else {
                            $state = false;
                        }
                        $exist = true;

                        if (isset($request->count))
                            if ($request->count < 0)
                                $remove = true;

                        $item['price'] = $item['count'] * ($product->price_main + Product_Attribute::query()->find($attr_id)->price);
                    }
                if (!$remove)

                    array_push($newcart, $item);
            }
            if ($exist == false) {
                $text = "nnnn";
                if ($count > 0) {
                    array_push($newcart, ['product_id' => $product->id, 'count' => 1, 'price' => $product->price_main + Product_Attribute::query()->find($attr_id)->price, 'attr_id' => $attr_id]);
                    $state = true;
                } else
                    $state = false;

            }

            session(['cart' => $newcart]);
            return ['cart' => 1, 'state' => ['status' => $state, 'text' => $text]];
        } else {

            $number = $product->count->quantity;

            if (!session()->has('cart'))
                session(['cart' => array()]);
            $cart = session('cart');
            //   session()->remove('cart');
            //  return 1;
            $newcart = array();
            $exist = false;
            //   return count($cart);
            $state = false;
            $count = $product->count->quantity - (new ProductModel($product->id))->thread();
            foreach ($cart as $item) {
                $remove = false;
                if ($item['product_id'] == $product->id) {
                    if ($count >= $item['count'] + 1) {
                        $state = true;
                        $item['count'] = $item['count'] + 1;
                    } else
                        $state = false;

                    $exist = true;

                    if (isset($request->count))
                        if ($request->count < 0)
                            $remove = true;

                    $item['price'] = $item['count'] * $product->price_main;
                }
                if (!$remove)
                    array_push($newcart, $item);
            }
            if ($exist == false) {
                if ($count > 0) {
                    array_push($newcart, ['product_id' => $product->id, 'count' => 1, 'price' => $product->price_main]);
                    $state = true;

                } else $state = false;

            }

            session(['cart' => $newcart]);

            return ['cart' => 1, 'state' => ['status' => $state, 'text' => "ممم"]];

        }

    }

    public function getpropertis(Request $request)
    {
        $data = $this->getdata($request);

        $product = session('product')['product'];

        $groups = session('product')['groups'];
        $combines = session('product')['combines'];
        $attrs = session('product')['attrs'];

        $price = $data['price'];

        $attr_id = $data['attr_id'];
        $url = $data['url'];
        $count = $data['count'];
        $arr = ['product' => $product, 'groups' => $groups, 'combines' => $combines, 'attrs' => $attrs, 'price' => $price, 'attr_id' => $attr_id, 'url' => $url, 'count' => $count];

        return ["attr_id" => $attr_id, 'url' => (new PublicModel())->image_Atrbute($attr_id), 'count' => $count, 'price' => $price];


    }

    public function multicart(Request $request)
    {
        $id = $request->id;
        if ($product = Product::query()->where('id', '=', $id)->first())
            if ((new PublicModel())->isImpty($product))
                return redirect('404');
        $type = 0;
        $product = Product::query()->where('id', '=', $id)->first();
        $attr_id = $request->attr_id;
        if (count($product->attrs) >= 1)
            $type = 1;
        if ($type == 0)
            return redirect('404');


        if (!session()->has('cart'))
            session(['cart' => array()]);
        $cart = session('cart');
        //   session()->remove('cart');
        //  return 1;
        $newcart = array();
        $exist = false;
        //   return count($cart);
        $state = false;
        $text = "not eq";
        $count = Product_Attribute::query()->find($attr_id)->counts->quantity - (new ProductModel($product->id))->thread($attr_id);
        foreach ($cart as $item) {
            $remove = false;
            if ($item['product_id'] == $product->id && isset($item['attr_id']))
                if ($attr_id == $item['attr_id']) {
                    $text = "eq=" . $attr_id;

                    // $item['count']=$item['count']+1;
                    if ($count >= $item['count'] + 1) {
                        $state = true;
                        $item['count'] = $item['count'] + 1;
                    } else {
                        $state = false;
                    }
                    $exist = true;

                    if (isset($request->count))
                        if ($request->count < 0)
                            $remove = true;

                    $item['price'] = $item['count'] * ($product->price_main + Product_Attribute::query()->find($attr_id)->price);
                }
            if (!$remove)

                array_push($newcart, $item);
        }
        if ($exist == false) {
            $text = "nnnn";
            if ($count > 0) {
                array_push($newcart, ['product_id' => $product->id, 'count' => 1, 'price' => $product->price_main + Product_Attribute::query()->find($attr_id)->price, 'attr_id' => $attr_id]);
                $state = true;
            } else
                $state = false;

        }

        session(['cart' => $newcart]);
        return ['cart' => 1, 'state' => ['status' => $state, 'text' => $text]];

    }

    public function getpropertis1($properteis, $product)
    {
        $model = new PublicModel();
        $attribute_products = Product_Attribute::query()->where('id_product', '=', $product);
        if ($attribute_products != null) {
            $attribute_products = $attribute_products->get();
            $end = array();

            foreach ($attribute_products as $attribute_product) {
                $a = explode(',', $properteis);
                $b = explode(',', $attribute_product->attrs);
                sort($a);
                sort($b);

                if (json_encode($a) == json_encode($b)) {
                    return ["attr_id" => $attribute_product->id, 'url' => (new PublicModel())->image_Atrbute($attribute_product->id), 'count' => $attribute_product->counts->quantity, 'price' => $attribute_product->price, 'send' => $properteis];

                }
            }
            return $end;


        }
        return (new PublicModel())->sort_attribute(['80', '51']);

    }
    public function show_new($slug)
    {

        $product = Product::query()->where('slug', '=', $slug)->first();
        if ((new PublicModel())->isImpty($product)||$product==null)
            return redirect('404');
        $product->view = $product->view + 1;
        $product->save();
        $type =PublicModel::hasColor($product)|PublicModel::hasWarranty($product);
        $color_id=0;
        $count = 0;
        if ($type == 0)
            $count = $product->quantity;
        $price = 0;
        if ($type == 0)
            $price = $product->price_main;
        $attr_id = 0;
        $warranty_id=0;
        if (PublicModel::hasColor($product))
            $color_id=$product->colors->first()->color->id;
         if (PublicModel::hasWarranty($product))
             $warranty_id=$product->warranties->first()->warranty->id;


//return $attrs;
        $categories = [];
        $myCategory = $product->category()->first();
        while (true) {
            array_push($categories, $myCategory->name);
            if ($myCategory->parent_id == 0) {
                break;
            }
            $myCategory = Category::where('id', $myCategory->parent_id)->first();
        }
        session(['warranty_id'=>$warranty_id]);
        session(['color_id'=>$color_id]);
       return view('product.show_product_main',['warranty_id'=>$warranty_id,'color_id'=>$color_id,'categories'=>$categories,'type'=>$type,'product'=>$product,'attrs'=>$product->attrs,'price'=>$price,'count'=>$count]);
    }
}
