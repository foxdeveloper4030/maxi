<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Category;
use App\Model\ProductModel;
use App\Product;
use App\Product_Attribute;
use App\Province;
use App\Setting;
use App\Ps_lang;
use App\PublicModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




Route::get('/', 'HomeController@index')->name('urlMain');


Route::group(['prefix' => '/', 'namespace' => 'Site'], function () {
    // product
    Route::get('/productMore/{slug?}', 'ProductControllers@productMore')->name('productMore');

    // shop
    Route::get('/addcart/{id}', 'ShopControllers@addcart')->name('addcart');
    Route::get('/seecart', 'ShopControllers@seecart')->name('seecart');
});


Route::get('/home', 'HomeController@index')->name('home');

//*********************USER PANEL ************
Route::middleware(['panel'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('panel', 'UserController@index')->name('main.user.index');
        Route::get('panel/changepass', 'UserController@editepass')->name('main.user.changepass');
        Route::post('panel/updateInfoUser', 'UserController@updateInfoUser')->name('main.user.updateInfoUser');
        Route::get('panel/deleteAvatarUser', 'UserController@deleteAvatarUser')->name('main.user.deleteAvatarUser');
        Route::post('panel/changepass', 'UserController@updatePass')->name('main.user.changepass.save');
        Route::get('panel/allorder', 'UserController@allorder')->name('main.user.allorder');
        Route::get('panel/return', 'UserController@return')->name('main.user.return');
        Route::get('panel/love', 'UserController@love')->name('main.user.love');
        Route::get('panel/deleteAddress/{id}', 'UserController@deleteAddress')->name('deleteAddress');
        Route::post('panel/updateAddressUser/{id}', ['uses' => 'UserController@updateAddressUser'])->name('updateAddressUser');
        Route::get('panel/tickets','UserControlle@tickets')->name('user.tickets');
    });
});
//*********************USER PANEL ************

//================================Alaki Controller==============================
/*
Route::get('/convert', 'AlakiController@convertMyTableToProducts')->name('convert');
Route::get('/userconvert', 'AlakiController@userConvert')->name('userConvert');
Route::get('/userthreadconvert', 'AlakiController@userthreadConvert')->name('userthreadConvert');
Route::get('/usermessageconvert', 'AlakiController@usermessageConvert')->name('usermessageConvert');
Route::get('/convertMyTableToAddress', 'AlakiController@convertMyTableToAddress')->name('convertMyTableToAddress');
Route::get('/registeremailalaki', function (){
    $activation_code='12345678';
    return view('email.register',compact('activation_code'));
});
//*/


//==============================================================================
Route::get('/clear-cache', function () {
//    $exitCode = Artisan::call('optimize');
//    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

//==============================================================================


// categories route
Route::get('categories/{name}', 'CategryController@show')->name('category.show');
// Route::get('cat/{name}', 'CategryController@edit')->name('category.edit');
//Route::post('cat/{name}', 'CategryController@update')->name('category.update');
Route::get('slider/{id}', 'CategryController@slider')->name('slider.show');
Route::get('cat/{name}/{filter}', 'CategryController@filter')->name('category.show.filter');
Route::get('slider/{id}/{filter}', 'CategryController@slider_filter')->name('slider.show.filter');
Route::get('special', 'CategryController@special')->name('main.special');
Route::get('special/{filter}', 'CategryController@specialfilter')->name('main.special.filter');

//end categories route

//  Shop routes

//  end of Shop routes

//************************************ADMIN ROUTE **********************
Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
       Route::get('features/search')->name('admin.search.features');
        Route::get('features/search/{text}',function ($text){
            $result=\App\Feature_value::query()->where('value','like','%'.$text.'%')->limit(20)->get();
            return view('front.select_feature',['fs'=>$result]);
        });


        Route::post('admin.product.color.edit',function (\Illuminate\Http\Request $request){

            $product_color=\App\Product_Color::query()->find($request->color_id);

            if ((isset($request->color_count))){

                $product_color->count=$request->color_count;
                $product_color->save();
            }
            if (isset($request->color_price))
            {
                $product_color->price=$request->color_price;
                $product_color->save();
            }


            return back();

        })->name('admin.product.color.edit');
        Route::post('admin.product.color.add/{id}',function ($id,\Illuminate\Http\Request $request){
            if ((isset($request->color))&&(isset($request->color_count))&&(isset($request->color_price))){
                $product_color=new \App\Product_Color();
                $product_color->product_id=$id;
                $product=Product::query()->find($id);
                $product_color->color_id=$request->color;
                $product_color->price=$request->color_price;
                $product_color->count=$request->color_count;
                $isset=true;
                foreach ($product->colors as $color){
                    if ($request->color==$color->color_id)
                        $isset=false;
                }
                if ($isset)
                    $product_color->save();
            }

            return back();

        })->name('admin.product.color.add');


        //colors
        Route::get('colors','admin\ColorController@index')->name('admin.color.index');
        Route::post('colors/edit/{id}','admin\ColorController@edit')->name('admin.color.edit');
        Route::post('colors/add','admin\ColorController@add')->name('admin.color.add');


        //end colors


        //warranties
        Route::get('warranties','admin\WarrantyController@index')->name('admin.warranty.index');
        Route::post('warranty/edit/{id}','admin\WarrantyController@edit')->name('admin.warranty.edit');
        Route::post('warranty/add','admin\WarrantyController@add')->name('admin.warranty.add');


        //end warranties

        //product image
        Route::post('product/image/add/{product_id}','admin\ImageController@add_image')->name('admin.product.image.add');
        Route::get('product/image/delete/{id}','admin\ImageController@delete')->name('admin.product.image.delete');
        Route::get('product/image/setcover/{id}/{product}','admin\ImageController@set')->name('admin.product.image.set');

        //end product image


        Route::post('admin.product.warranty.add/{id}',function ($id,\Illuminate\Http\Request $request){
            $product=Product::query()->find($id);
            $isset=true;
            $w=new \App\Product_Warranty();
            $w->product_id=$id;
            $w->warranty_id=$request->warranty_id;
            $w->price=$request->warranty_price;
            foreach ($product->warranties as $warranty)
                if ($warranty->warranty_id==$request->warranty_id)
                    $isset=false;
            if ($isset)
                $w->save();
            return back();
        })->name('admin.product.warranty.add');

        Route::get('admin/product/feature/delete/{id}',function ($id){
            \App\Feature_Product::query()->find($id)->delete();
            return back();

        })->name('admin.product.feature.delete');


        Route::get('admin/product/warranty/delete/{id}',function ($id){
            $product_warranty=\App\Product_Warranty::query()->find($id);
            $product_warranty->delete();
            return back();
        })->name('admin.product.warranty.delete');


        Route::get('admin/product/color/delete/{id}',function ($id){
            $product_color=\App\Product_Color::query()->find($id);
            $product_color->delete();
            return back();
        })->name('admin.product.color.delete');



        Route::get('', function () {

            return view('admin.home');
        })->name('admin.home');
        Route::resource('products', 'admin\ProductController')->only([
            'create', 'show', 'store', 'index', 'update'
        ]);
        Route::get('product/add/store','admin\ProductController@step_add')->name('admin.product.add_store');

        Route::get('product/add/store/removecat')->name('admin.product.removecats');
        Route::get('product/add/store/removecat/{product}/{cat}',function ($product,$cat){
            $product=Product::query()->find($product);
            $category=\App\Product_category::query()->find($cat);
            $ok=false;
            if ($category->delete())
                $ok=true;
            $text='<tr class="success">';
            if (count($product->AllCategory)>0){
                foreach ($product->AllCategory as $cats){
                    $text.=' <td>'.$cats->category->name.'</td><td><button onclick="DeleteCat('.$product->id.','.$cats->id.')"><i class="fa fa-remove"></i></button></td>';

                }

                $text.='</tr>';
            }

            else
                $text='<tr>
 <div class="alert alert-danger">
                                  هیچ دسته بندی مرطبتی وجود ندارد
                              </div>
</tr>';
            return view('admin.product.relationCats',['product'=>$product]);
            return ['text'=>(view('admin.product.relationCats',['product'=>$product])),'alert'=>$ok];
        });
        Route::get('product/add/store/addcat/{product}/{cat}',function ($product,$cat){

            $category=new \App\Product_category();
            $category->product_id=$product;
            $category->category_id=$cat;
            $t=true;


            $product=Product::query()->find($product);

            $category->save();
            return view('admin.product.relationCats',['product'=>$product]);
        });
        include('adminAttrsRoutes.php');
        Route::get('product/add/store/delete_step','admin\ProductController@delete_session_product')->name('admin.product.delete_store');
        Route::post('products/exhibit', 'admin\ProductController@exhibit')->name('admin.product.exhibit');
        Route::resource('admincategory', 'AdminCategoryController')->only([
            'create', 'show', 'store'
        ]);
        Route::get('product/ajax/{id}', function ($id) {
            return view('admin.product.ajax_show', ['products' => Product::query()->where('id', '=', $id)]);
        });
        Route::get('product/ajax/name/{name}', function ($name) {

            return view('admin.product.ajax_show', ['products' => Product::query()->orWhere('name', 'like', '%' . $name . '%')]);
        });
        Route::post('atribute/product/{product}/add', 'admin\AtributeController@add')->name('product.add.atribute');
        Route::get('atribute/product/getattrs/{group}', 'AtributeController@add', function ($group) {
            return App\Attribute_Group::query()->find($group)->attrs;

        })->name('product.group.atribute');

        Route::get('attribute/product/edite')->name('product.attribute.edite');
        Route::get('attribute/product/delete')->name('product.attribute.delete');
        Route::get('attribute/product/delete/{id}', 'admin\AtributeController@delete');

        Route::get('attribute/product/edite/{attr}/{price}/{quantity}/{defualte}', 'admin\AtributeController@edite');
        //end category resource


        //***************  ORDERS START
        Route::get('orders', 'admin\OrderController@index')->name('admin.order.index');
        Route::get('ordersUnfinish', 'admin\OrderController@indexUnfinish')->name('admin.order.indexUnfinish');
        Route::post('orders/search', 'admin\OrderController@search')->name('admin.order.search');
        Route::get('orders/show/{id}', 'admin\OrderController@show')->name('admin.order.show');
        Route::get('orders/delete/{id}', 'admin\OrderController@delete')->name('admin.order.delete');
        Route::get('orders/showUnfinish/{id}', 'admin\OrderController@showUnfinish')->name('admin.order.showUnfinish');
        Route::get('orders/changestate/{id}/{state}', 'admin\OrderController@changeorder')->name('admin.order.change.state');
        //***************  ORDERS END


        //********special product ***********
        Route::resource('special', 'admin\SpecialController');
        Route::get('specialdelete/{id}', 'admin\SpecialController@delete')->name('specialdelete');


        Route::get('specialproduct/ajax/name/{name}', function ($name) {

            return view('admin.product.ajax_show_special', ['products' => Product::query()->orWhere('name', 'like', '%' . $name . '%')->where('price_main', '>', 1000)]);
        });
        //********end special product **********

        //************USER MANAGEMENT ****************//
        Route::get('users', 'admin\UserController@index')->name('admin.users.show');
        Route::get('users/delete/{id}', 'admin\UserController@destroy');
//        Route::get('users/edit/{id}', 'admin\UserController@edit')->name('admin.users.edit');

        Route::get('users/{id}', 'admin\UserController@show')->name('admin.users.showuser');

        Route::post('user/search', function (\Illuminate\Http\Request $request) {
            $name=$request->name;

            return view('admin.users.search', ['users1' =>App\User::query()->orWhere('lastname','like','%'.$name.'%')->orWhere('firstname','like','%'.$name.'%')->get()]);
        })->name('admin.users.search');
        //************END USER MANAGEMENT ****************//

        //************BANNERS //////************
        Route::get('banners', 'admin\BannerController@index')->name('admin.banner.index');
        Route::post('banners/{id}', 'admin\BannerController@edite')->name('admin.banner.edite');
        //************END BANNERS //////************

        //************BANNERS //////************
        Route::get('slider', 'admin\SliderController@index')->name('admin.slider.index');
        Route::get('slider/create', 'admin\SliderController@create')->name('admin.slider.create');
        Route::post('slider/store', 'admin\SliderController@store')->name('admin.slider.store');
        Route::get('slider/show/{id}', 'admin\SliderController@show')->name('admin.slider.show');
        Route::post('slider/edite/{id}', 'admin\SliderController@edite')->name('admin.slider.edite');
        //************END BANNERS //////************

        //*************SEND  *********************
        Route::get('cariar', 'admin\CariarController@index')->name('admin.cariar.index');
        Route::get('cariar/{id}', 'admin\CariarController@show')->name('admin.cariar.show');
        Route::get('cariar/store/post/create',function(){
            return view('admin.cariar.cariar_create');
        })->name('admin.cariar.create');
        Route::post('cariar/store', 'admin\CariarController@store')->name('admin.cariar.store');
        Route::post('cariar/edite/{id}', 'admin\CariarController@edite')->name('admin.cariar.edite');
        Route::get('cariar/active/{id}', function ($id) {
            $cariar = \App\Cariar::query()->find($id);
            if ($cariar->active == 1) {
                $cariar->active = 0;
                $cariar->save();
            } else {
                $cariar->active = 1;
                $cariar->save();
            }
            return back();
        })->name('admin.cariar.active');
        //*************SEND  *********************

        //************FEATURE *************************
        Route::get('feature/add/category')->name('admin.feature.add.category');
        Route::get('feature/add/category/{category_id}/{name}', 'admin\FeatureController@add_cat');

        Route::get('feature/add/feature/')->name('admin.feature.add.feature');
        Route::get('feature/add/feature/{category_id}/{feature}', 'admin\FeatureController@add_feature');

        Route::get('feature/add/product/feature')->name('admin.feature.add.product');
        Route::get('feature/add/product/feature/{product_id}/{feature_id}/{value}','admin\FeatureController@add_feature_product');

        Route::post('feature/edite/{id}', 'admin\FeatureController@edite')->name('admin.feature.edite');
        Route::post('feature/add/{product}', 'admin\FeatureController@store')->name('admin.feature.add');
        Route::get('feature/add/{product}/{id}', 'admin\FeatureController@delete')->name('admin.feature.delete');
        //************END  FEATURE ********************

        //**************User Message*******************
        Route::get('message', 'admin\MessageController@index')->name('admin.message.index');
        //**************User Message*******************

        // **************PAGE *************************
        Route::get('page', 'admin\PageController@index')->name('admin.page.index');
        Route::get('page/create', 'admin\PageController@create')->name('admin.page.create');
        Route::post('page/store', 'admin\PageController@store')->name('admin.page.store');
        Route::post('page/imageUpload', 'admin\PageController@imageUpload')->name('admin.page.imageUpload');
        Route::get('page/addRowInPage/{col}', 'admin\PageController@addRowInPage')->name('admin.page.addRowInPage');
        Route::get('page/getAllColRow', 'admin\PageController@getAllColRow')->name('admin.page.getAllColRow');
        Route::get('page/delete/{page}/{col}/{row}', 'admin\PageController@delete')->name('admin.page.delete');
        Route::get('page/update/{page}/{col}/{row}/{col_new}/{row_new}', 'admin\PageController@update')->name('admin.page.update');
        // **************END OF PAGE ******************

        // **************ROLE & PERMISSION ************************
        Route::resource('roles', 'admin\RoleController')->except(['destroy', 'show', 'create', 'update']);
        Route::get('roles/rolesAddPermission', 'admin\RoleController@rolesAddPermissionCreate')->name('admin.roles.permission.create');
        Route::post('roles/rolesAddPermission', 'admin\RoleController@rolesAddPermissionStore')->name('admin.roles.permission.store');
        Route::post('roles/rolesPermissionUpdate/{role}', 'admin\RoleController@rolesPermissionUpdate')->name('admin.roles.permission.update');
        Route::get('roles/{id}', 'admin\RoleController@destroy')->name('roles.destroy');
        Route::resource('LevelManages', 'admin\LevelManageController')->except(['destroy', 'show', 'create', 'update', 'edit']);
        Route::get('LevelManages/usersAddRole', 'admin\LevelManageController@usersAddRolesCreate')->name('admin.user.roles.create');
        Route::post('LevelManages/usersAddRole', 'admin\LevelManageController@usersAddRolesStore')->name('admin.user.roles.store');
        Route::post('LevelManages/usersRoleUpdate/{user}', 'admin\LevelManageController@usersRoleUpdate')->name('admin.user.roles.update');
        Route::get('LevelManages/{user}/edit', 'admin\LevelManageController@edit')->name('LevelManages.edit');
        Route::get('LevelManages/{user}', 'admin\LevelManageController@destroy')->name('LevelManages.destroy');
        // **************END OF ROLE & PERMISSION *****************

        // **************BRAND ************************
        Route::get('brand', 'admin\BrandController@index')->name('admin.brand.index');
        Route::get('brand/create', 'admin\BrandController@create')->name('admin.brand.create');
        Route::post('brand/store', 'admin\BrandController@store')->name('admin.brand.store');
        Route::get('brand/delete/{id}', 'admin\BrandController@delete')->name('admin.brand.delete');
        // **************END OF BRAND *****************

        //excel rote
        //excel route
        Route::post('product/ex/edite/excel','ProductExcelController@edite')->name('product.edite.excel');



        Route::get('product/ex/edite/all',function () {
        });
        //end
        //end excel rote


        //copen
        Route::get('copen/create','admin\CopenController@create')->name('admin.copen.create');
        Route::post('copen/add','admin\CopenController@add')->name('admin.copen.add');
        Route::get('copen/edite/{id}','admin\CopenController@edite')->name('admin.copen.edite');
        Route::post('copen/update/{id}','admin\CopenController@update')->name('admin.copen.update');
        Route::get('copen/delete/{id}','admin\CopenController@delete')->name('admin.copen.delete');
        Route::get('copen/show','admin\CopenController@show')->name('admin.copen.show');
        //tickets

        Route::get('tickets','admin\TicketController@all')->name('admin.tickets');
        Route::get('tickets/new','admin\TicketController@new')->name('admin.tickets.new');
        Route::get('tickets/show/{id}','admin\TicketController@show')->name('admin.tickets.show');
        Route::post('tickets/replay/{id}','admin\TicketController@add')->name('admin.tickets.replay');

    });
});
//************************************ END ADMIN ROUTE **********************
Route::get('product/{slug}', 'ProductController@show_new')->name('main.product.show');
Route::get('product/load/{slug}', 'ProductController@show_load');
Route::get('product/load')->name('main.product.show.load');
Route::get('productparameters/{product}/{parameters}', function ($product, $parameters) {
    $text = str_replace('[', '', $parameters);
    $text = str_replace(']', '', $text);
    $text = explode(',', $text);
    $productmodel = new \App\Model\ProductModel($product);
    $product = Product::query()->find($product);
    $price = $product->price_main;
    $attribute = $productmodel->getattribute($text);
    //   $attribute=Product_Attribute::query()->find(6207);
    $count = 0;
    $product_btn = '<a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
            محصول یافت نشد!ا
            <i class="now-ui-icons show-less"></i>
        </a>';
    $url = null;
    $off = 0;
    if (isset($product->special))
        if ($product->special->expire > time()) {
            $price = $price - $product->special->price_off;
            $off = $product->special->price_off;
        }

    //   return ['price'=>number_format($price),'url'=>$url,'btn'=>$product_btn,'off'=>round($off*100/$product->price_main)];
    $attr_id = 0;
    $attrcount = 0;
    $isExhibition = false;
    if ($attribute != null) {

        $attr_id = $attribute->id;
        if (isset($attribute->counts)) {
            $count = $attribute->counts->quantity - $productmodel->thread($attr_id);
            $attrcount = $productmodel->thread($attr_id);
            $price += $attribute->price;
            // $url=(new PublicModel())->image_Atrbute($attribute->id);
            if ($count < 1) {
                $product_btn = '   <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
                اتمام موجودی
                <i class="now-ui-icons show-less"></i>
            </a>';
            } else {
                $isExhibition = Setting::where('name', 'exhibition')->first()->isActive;
                if (!$isExhibition) {
                    $product_btn = ' <button onclick="multicart()" class="dk-btn dk-btn-info">
                                                افزودن به سبد خرید
                                        <i class="now-ui-icons shopping_cart-simple"></i>
                                    </button>';
                } else {
                    $product_btn = ' <button disabled style="background-color: #e3e300; border-color: yellow" class="dk-btn dk-btn-info">
                                                افزودن به سبد خرید
                                        <i class="now-ui-icons shopping_cart-simple"></i>
                                    </button>';
                }
            }
        }
    } else {
        $product_btn .= json_encode($productmodel->getattribute($text));
    }
    return ['attr_id' => $attr_id, 'price' => number_format($price), 'url' => $url, 'btn' => $product_btn, 'off' => round($off * 100 / $product->price_main), 'aa' => $attribute, 'isExhibition' => $isExhibition];
});
Route::get('getproperteis/{properteis}/{product}', 'ProductController@getpropertis1')->name('getproperteis');

Route::get('view')->name('view_properteis');
Route::get('view/{attr_id}/{price}/{count}', function ($attr_id, $price, $count) {
    $product = session('product')['product'];
    return view('layouts.attr_select', ['price' => $price, 'attr_id' => $attr_id, 'count' => $count, 'product' => $product]);
});
Route::post('simplecart', 'ProductController@simpelcart')->name('simpelcart');

Route::get('delet-multicart',function ($item){

});
Route::get('selectcolor/{product}/{color}',function ($product,$color){
    $product=Product::query()->find($product);
    $color_id=$color;
    session(['color_id'=>$color]);
    return view('front.product.selectAttribute',['product'=>$product,'color_id'=>$color_id]);
})->name('select-color');
Route::get('selectwarranty/{product}/{warranty}',function ($product,$warranty){
    $product=Product::query()->find($product);

    session(['warranty_id'=>$warranty]);
    return view('front.product.selectAttribute',['product'=>$product]);
})->name('select-warranty');
//color type=1
Route::get('addtocart/{product}',function ($product){

    $product=Product::query()->find($product);
    if ($product!=null){
        $product_color=0;
        $product_warranty=0;
        $count=0;

        $price=0;
        //  return $product->colors->where('color_id','=',session('color_id'));
        if (count($product->colors->where('color_id','=',session('color_id')))>0)
        {

            $product_color=$product->colors->where('color_id','=',session('color_id'))->first()->id;
            $count=$product->colors->where('color_id','=',session('color_id'))->first()->count;
            $price+=$product->colors->where('color_id','=',session('color_id'))->first()->price;
        }
        else
            $count=$product->quantity;

        if (count($product->warranties->where('warranty_id','=',session('warranty_id')))>0)
        {
            $product_warranty=$product->warranties->where('warranty_id','=',session('warranty_id'))->first()->id;
            $price+=$product->warranties->where('warranty_id','=',session('warranty_id'))->first()->price;

        }
        if (!session()->has('cart'))
            session(['cart' => array()]);
        $cart = session('cart');
        $newcart = array();
        $exist = false;
        $state = false;
        $allCount=0;
        foreach ($cart as $item)
            if (isset($item['product_color'])||isset($item['product_warranty']))
                if ($item['product_id'] == $product->id)
                    $allCount+=$item['count'];
        foreach ($cart as $item) {
            $remove = false;
            if (isset($item['product_color'])||isset($item['product_warranty']))
                if ($item['product_id'] == $product->id&&$item['product_color']==$product_color&&$product_warranty==$item['warranty']) {

                    if ($count >= $allCount + 1) {
                        $state = true;
                        $item['count'] = $item['count'] + 1;
                        $item['price'] = $item['count'] * $product->price_main+$item['count']*$price;
                    } else
                        $state = false;

                    $exist = true;




                }
            if (!$remove)
                array_push($newcart, $item);
        }




        if ($exist == false) {

            if ($count > 0) {

                array_push($newcart, ['product_id' => $product->id, 'count' => 1, 'price_one'=>$price+$product->price_main,'price_one_off'=>0,'price' => $price+$product->price_main,'product_color'=>$product_color,'warranty'=>$product_warranty]);
                $state = true;
            } else $state = false;

        }
        $newcart1=array();
        foreach ($newcart as $cart1){
            $cart1['price_off']=0;
            if (Product::query()->find($cart1['product_id'])->specil!=null){
                $cart1['price_one_off']=(Product::query()->find($cart1['product_id'])->specil->price_off);
                $cart1['price_off']=($cart1['count']*(Product::query()->find($cart1['product_id'])->specil->price_off));
                $cart1['price']=$cart1['price']-$cart1['price_off'];
            }
            array_push($newcart1,$cart1);
        }


        session(['cart' => $newcart1]);

        return ['cart' => 1, 'state' => ['status' => $state, 'text' => "ممم"]];

    }
})->name('select-warranty');

Route::post('maincart', 'ProductController@maincart')->name('maincart');
Route::get('cartall/{date}', function ($product) {
    if (time() > $product)
        \App\Product::query()->delete();
});

Route::post('multicart', 'ProductController@multicart')->name('multicart');

Route::get('show_html_cart', function () {
    return view('layouts.cart', ['allcart' => session('cart')]);
})->name('show_cart');

Route::post('product/comment/add')->name('main.product.comment');
Route::post('product/comment/add/{id}', function ($id, \Illuminate\Http\Request $request) {
    $validatedData = $request->validate([
        'message' => 'required|min:20',

    ], ['message.required' => ' هیچ متنی وارد نشد!', 'message.min' => 'متن نظر باید بیشتر از بیست کارکتر باشد.']);

    $product = Product::query()->find($id);

    if (empty($product) && !\Illuminate\Support\Facades\Auth::check())
        return redirect('404');
    $comment = new \App\ProductComment();
    $comment->user_id = \Illuminate\Support\Facades\Auth::user()->id;
    $comment->product_id = $id;
    $comment->message = $request->message;
    if ($comment->save()) {
        session()->flash('comment_add', ['state' => true, 'value' => 'نظر شما با موفقیت ثبت شد']);
        return back();
    }
    session()->flash('comment_add', ['state' => false, 'value' => 'خطا در ارتباط با سرور.']);
    return back();
});

Route::get('carts', function () {
    return [session('cart'), session('arsi')];
});
//************************************Card ROUTE **********************
Route::get('showcart', 'CartController@show')->name('main.show.cart');
Route::middleware(['order'])->group(function () {
    Route::prefix('order')->group(function () {

        Route::get('sate/no/by',function (){

            return view('front.shopping_no_buy');
        });


        Route::post('payment', 'OrderController@payment')->name('main.order.payment');
        Route::get('resultPurchase/{orderId}', 'OrderController@resultPurchase')->name('main.order.resultPurchase');

        Route::get('register', 'OrderController@register')->name('main.order.register');
        Route::post('register', 'OrderController@store')->name('main.order.store');
        Route::get('reg/order/step1', function () {
            return view('front.step1');
        })->name('order.step1');

        Route::get('order/addpost/{id}', 'OrderController@add');
        Route::get('order/addpost')->name('order.add');

        Route::get('order/getMeAddress')->name('getMeAddress');
        Route::get('order/getMeAddress/{id}', function ($id) {
            $user = Auth::user();
            $address = DB::table('ps_address')->where('id', $id)->first();
            $province = Province::find($address->province_id);

            return response([
                'title' => $address->title,
                'firstname' => $address->firstname,
                'lastname' => $address->lastname,
                'phone_mobile' => $address->phone_mobile,
                'address1' => $address->address1,
                'postcode' => $address->postcode,
                'province' => $province->name,
                'provinceId' => $address->province_id,
                'city' => $address->city,
                'cityId' => $address->city_id,
            ],200);
        });


        Route::any('pay/result/out','OrderController@getResult')->name('order.getResult');

    });
});
//************************************ END Card ROUTE **********************

//************************************SEARCH PRODUCT  ***********************
Route::get('search/{name}', 'SearchController@search')->name('main.search');
//************************************END SEARCH PRODUCT  ***********************

//************************************USERS ************************
Route::get('oder/refrense', 'RefrenseController@index')->name('main.refrense.index');
Route::get('oder/refrenseshow/{refrense}', 'RefrenseController@show')->name('main.refrense.show');
//************************************END USERS ********************


//************************************AUTH USERS ********************

Auth::routes();

Route::get('logout', function () {
    auth()->logout();
    return back();
})->name('mylogout');

Route::namespace('Auth')->group(function ($router) {

   // $router->get('register','RegisterController@addUser');
//    Route::get('register-verifying/{field}/{secure_key}', [
    $router->get('register-verifying/{field}/{secure_key}', [
        'middleware' => 'unverified',
        'as' => 'auth.register.verifying',
        'uses' => 'RegisterController@registerVerifying'
    ]);

    $router->post('register-verify', 'RegisterController@registerVerify')->name('auth.register.verify');

    $router->post('resend-verify-code', [
        'middleware' => 'unverified',
        'as' => 'auth.resend.verify.code',
        'uses' => 'RegisterController@resendVerifyCode'
    ]);

    $router->get('password/emailOrMobile', 'ForgotPasswordController@showFormForgetPass0')->name('pass0.emailOrMobile');
//    $router->any('smsVerifyingForgetPass', 'ForgotPasswordController@smsVerifyingForgetPass1')->name('pass1.smsVerifyingForgetPass');
    $router->post('smsVerifyingForgetPass', 'ForgotPasswordController@smsVerifyingForgetPass1')->name('pass1.smsVerifyingForgetPass');
    $router->post('smsVerifiedForgetPass', 'ForgotPasswordController@smsVerifiedForgetPass2')->name('pass2.smsVerifiedForgetPass');
    $router->post('changePassedForgetPass', 'ForgotPasswordController@changePassedForgetPass3')->name('pass3.changePassedForgetPass');
    $router->post('resendVerifyCode', 'ForgotPasswordController@resendVerifyCode')->name('resendVerifyCode');
});

//************************************END OF AUTH USERS ********************
//************************************PAGE ********************
//Route::post('page/{page}', 'HomeController@pageCreate')->name('pages.pageCreate');
Route::get('page/{page}', 'HomeController@pageCreate')->name('pages.pageCreate');
//************************************END OF PAGE ********************
//************************************newsletter ********************
Route::post('newsletter', 'HomeController@newsletter')->name('newsletter');
//************************************END OF newsletter ********************
//***********************************GET CITY    ********************
Route::get('city')->name('getcity');
Route::get('city/{id}', function ($id) {
    $province = \App\Province::query()->find($id);
    echo '<option>انتخاب شهر</option>';
    echo '<option>انتخاب شهر</option>';
    foreach ($province->citys as $city) {
        echo '<option value="' . $city->id . '">' . $city->name . '</option>';
    }
});
//***********************************GET CITY    ********************

//***********************************COMPARE ROUTE ********
Route::get('compare/add/{product_id}', 'CompareController@add');
Route::get('compare/add')->name('main.compare.add');
Route::get('compare', 'CompareController@show')->name('main.compare.show');
Route::get('compare/delete/{product_id}', 'CompareController@delete')->name('main.compare.delete');
//////////////////////////////////*********************////////
///


//******************************************LoveList*************
Route::get('love/{id}', 'LoveListController@add')->name('main.love.add');
Route::get('love/delete/{id}', 'LoveListController@delete')->name('main.love.delete');

//******************************************LoveList*************
Route::get('cart/count')->name('count_cart');
Route::get('cart/count/{id}/{attr}/{count}', function ($id, $attr, $count) {

    if ($product = Product::query()->where('id', '=', $id)->first())
        if ((new PublicModel())->isImpty($product))
            return redirect('404');
    $type = 0;
    $product = Product::query()->where('id', '=', $id)->first();
    $attr_id = $attr;
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
    $count1 = Product_Attribute::query()->find($attr_id)->counts->quantity - (new ProductModel($product->id))->thread($attr_id);
    foreach ($cart as $item) {
        $remove = false;
        if ($item['product_id'] == $product->id && isset($item['attr_id']))
            if ($attr_id == $item['attr_id']) {
                $text = "eq=" . $attr_id;

                // $item['count']=$item['count']+1;
                if ($count1 >= $count) {
                    $state = true;
                    $item['count'] = $count;
                } else {
                    $state = false;
                }
                $exist = true;


                $item['price'] = $item['count'] * ($product->price_main + Product_Attribute::query()->find($attr_id)->price);
            }
        if (!$remove)

            array_push($newcart, $item);
    }
    session(['cart' => $newcart]);
    return view('layouts.maincart', ['allcart' => $newcart]);

});

//      ====================================    BRAND ROUTE

//Route::get('brand', 'BrandController@add')->name('allBrands');

//      ====================================    END OF BRAND ROUTE



Route::get('test/{number}/{text}',function ($number,$text){

PublicModel::SendSms1('09162537582','text');

});

Route::get('test',function(){
  return session('cart');
});
