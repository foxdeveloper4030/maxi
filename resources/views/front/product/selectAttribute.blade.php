

<?php

$warranty_id=session('warranty_id');
$color_id=session('color_id');
$count=(new \App\PublicModel())->AllCount($product);
?>
<div id="product-page">
    @if(\App\PublicModel::hasColor($product))

        <div class="product-variants default">
            <span>انتخاب رنگ: </span>

            @foreach($product->colors as $color)


                <div @if($color_id!=$color->color_id)onclick="changeColor({{$color->color_id}},{{$product->id}})" @endif class="radio" style="cursor: pointer;width: 80px;border-radius: 5px;background-color: #e6eede;@if($color_id==$color->color_id) border: dashed 2px #14d3ff; @endif padding: 3px;">

                    <span class="badge" style="background-color: {{$color->color->color}}">&ensp;</span>

                    {{$color->color->name}}


                </div>
            @endforeach
        </div>
    @endif

    <?php

    $off = 0;
    $price=$product->price_main;
    if (isset($product->special))
        if ($product->special->expire > time()) {
            $price -=$product->special->price_off;
            $off = $product->special->price_off;
        }
    if (\App\PublicModel::hasColor($product)){
        $color=$product->colors->where('color_id','=',$color_id)->first();
        $price+=$color->price;
    }
    if (\App\PublicModel::hasWarranty($product))
    {
        $warraty=$product->warranties->where('warranty_id','=',$warranty_id)->first();
        $price+=$warraty->price;
    }
    ?>


    @if(\App\PublicModel::hasWarranty($product))
        @foreach($product->warranties as $warranty)
            <div @if($warranty->warranty_id!=$warranty_id) onclick="changeWarranty({{$warranty->warranty_id}},{{$product->id}})" @endif class="product-guarantee default" style="cursor: pointer;height: 20px">
                @if($warranty->warranty_id==$warranty_id)
                    <i class="fa fa-check-circle"></i>
                @else
                    <i class="fa fa-circle"></i>
                @endif

                <p class="product-guarantee-text">{{$warranty->warranty->name}}</p>
            </div>
        @endforeach
    @endif

    @if(\App\PublicModel::hasColor($product))
        <div class="product-add default">
            <?php
            $color=$product->colors->where('color_id','=',$color_id)->first();
            ?>
            <div class="price-value" >
                <span>{{number_format($price)}}</span>
                <span class="price-currency">تومان</span>
            </div>
            <br>
            <br>
            <br>
            <div style="top: 100px;" class="price-product defualt">


                @if(number_format($off*100/$product->price_main)>0)
                    <div class="price-discount" data-title="">
                                            <span>
                                                {{number_format($off*100/$product->price_main)}}
                                            </span>
                        <span>%</span>&ensp;تخفیف
                    </div>
                @endif
            </div>
            <div class="parent-btn" id="product_btn">
                @if($color->count>0)
                    <a class="dk-btn dk-btn-info" onclick="addToCart()">
                        افزودن به سبد خرید
                        <i class="now-ui-icons shopping_cart-simple"></i>
                    </a>
                @else
                    <a class="dk-btn dk-btn-danger">
                        اتمام موجودی!!
                        <i class="now-ui-icons shopping_cart-simple"></i>
                    </a>
                @endif

            </div>
        </div>
    @else
        <div style="top: 100px;" class="price-product defualt">

            <div class="product-add default">

               @if($count>0)
                <div class="product-guarantee default">
                    <div>{{number_format($price)}}</div>
                    <span class="price-currency">
                        50تومان</span>
                </div>
                @if(number_format($off*100/$product->price_main)>0)
                    <div class="price-discount" data-title="تخفیف">
                                            <span>
                                                {{number_format($off*100/$product->price_main)}}
                                            </span>
                        <span>%</span>
                    </div>
                @endif
              @else
                    <div class="product-guarantee default">
                        <div>برای گرفتن قیمت تماس بگیرید.</div>
                        <span class="price-currency">
                        </span>
                    </div>
                   @endif

            </div>


            <div class="product-guarantee default" style="display: block">
                <div class="parent-btn">
                    @if($product->quantity>0)

                        <button onclick="addToCart()" class="dk-btn dk-btn-info">
                            افزودن به سبد خرید
                            <i class="now-ui-icons shopping_cart-simple"></i>
                        </button>
                    @else

                        <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
                            اتمام موجودی!
                            <i class="now-ui-icons show-less"></i>
                        </a>
                    @endif
                </div>
            </div>


        </div>
    @endif


</div>

<script>
    function changeColor(color,product) {
        $(document).ready(function () {
            loader_show();

            $.get("{{url('selectcolor')}}/"+product+"/"+color, function(data, status){

                document.getElementById("product-page").innerHTML=data;
                loader_dismis();
            });
        });
    }
    function changeWarranty(warranty,product) {
        $(document).ready(function () {
            loader_show();

            $.get("{{url('selectwarranty')}}/"+product+"/"+warranty, function(data, status){

                document.getElementById("product-page").innerHTML=data;
                loader_dismis();
            });
        });
    }
    function addToCart() {
        $(document).ready(function () {
            loader_show();

            $.get("{{url('addtocart')}}/{{$product->id}}", function(data, status){
                loader_dismis();

                show_cart();

                if (data['state']['status'] == true)
                    Swal.fire(
                        ' ',
                        'محصول با موفقیت به سبد خرید اضاف شد',
                        'success'
                    );
                else
                    Swal.fire({
                        type: 'error',
                        title: ' ',
                        text: 'تعداد محصول بیشتر از موجودی می باشد',
                    });
            });
        });

    }
</script>
