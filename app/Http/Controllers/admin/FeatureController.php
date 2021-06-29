<?php
namespace App\Http\Controllers\admin;
use App\Category;
use App\Feachers_product;
use App\Feature;
use App\Feature_category;
use App\Feature_Lang;
use App\Feature_Product;
use App\Feature_value;
use App\Product;
use App\PublicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function edite($id,Request $request){
        $feature=Feature_Lang::query()->find($id);
        $feature->name=$request->name;
        $feature->save();

        $value=Feature_value::query()->find($request->value_id);

        $value->value=$request->value;
        $value->save();
        session()->flash('alert','<div class="alert alert-success">محصول  با موفقیت ویرایش شد!</div>');
        return back();

    }

    public function store($product,Request $request){

        $feature=new Feature_Product();
        $feature->feature_id=$request->feature_id;
        $feature->id_product=$product;
        $feature->id_feature_value=$request->id_feature_value;
        $feature->save();

        session()->flash('alert','<div class="alert alert-success">محصول  با موفقیت ویرایش شد!</div>');
        return back();
    }
    public function delete($id){

       $fr=Feature_Product::query()->find($id);
     $fr->delete();
        session()->flash('alert','<div class="alert alert-success">محصول  با موفقیت ویرایش شد!</div>');
        return back();
    }

    public function add_cat($category_id,$name){
        $cat=new Feature_category();
        $cat->name=$name;
        $cat->category_id=$category_id;
        $cat->save();
        $category=Category::query()->find($category_id);
        return view('admin.category.feature_content',['category'=>$category]);
    }

    public function add_feature($catefory_id,$feature){
        $cat=Feature_category::query()->find($catefory_id);
        $category=Category::query()->find($cat->category_id);
        $f=new Feature();
        $f->feature=$feature;
        $f->cat_id=$category->id;
        $f->feature_category_id=$cat->id;
        $f->save();
        return view('admin.category.feature_content',['category'=>$category]);
    }


    public function add_feature_product($product_id,$feature_id,$value){
        if (PublicModel::feature_value($product_id,$feature_id)!=" "){
            $ff=Feachers_product::query()->where('product_id','=',$product_id)->where('feature_id','=',$feature_id)->first();
           $ff->value=$value;
           $ff->save();
        }
        else{
            $ff=new Feachers_product();
            $ff->product_id=$product_id;
            $ff->value=$value;
            $ff->feature_id=$feature_id;
            $ff->save();
        }

    }
}



