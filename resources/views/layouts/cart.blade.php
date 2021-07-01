

<div class="cart dropdown">
    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">
        <img src="{{asset('public/assets/img/shopping-cart.png')}}" alt="">
        سبد خرید
        <span class="count-cart">{{count($allcart)}}</span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
        <div class="basket-header">
            <div class="basket-total">
                <span>مبلغ کل خرید:</span>
                <span><?php
                    use App\Attribute;use App\Product_Attribute;$holeprice=0;
                    foreach ($allcart as $cart){
                        $holeprice+=$cart["price"];
                    }



                    ?>{{number_format($holeprice)}}</span>
                <span> تومان</span>
            </div>
            <a href="{{route('main.show.cart')}}" class="basket-link">
                <span>مشاهده سبد خرید</span>
                <div class="basket-arrow"></div>
            </a>
        </div>
        <ul class="basket-list">
                     <?php $cart_index=0?>
                        @foreach($allcart as $cart)
                <li>
                    <a  class="basket-item">

                        <div class="basket-item-content">
                            @if(isset($cart["attr_id"]))
                            <button class="basket-item-remove" onclick="delete_cart('{{$cart_index}}')"></button>
                            @else
                                <button class="basket-item-remove" onclick="delete_cart('{{$cart_index}}')"></button>

                            @endif
                            <?php $cart_index+=1; ?>
                            <div class="basket-item-image">

                                <img alt="" src="{{(new App\PublicModel())->image_cover(App\Product::query()->find($cart["product_id"]))}}">
                            </div>
                            <div class="basket-item-details">
                                <div class="basket-item-title">{{(new App\PublicModel())->short_string(App\Product::query()->find($cart["product_id"])->name)}}
                                </div>
                                <div class="basket-item-params">
                                    <div class="basket-item-props">
                                        @if(isset($cart['attr_id']))
                                           <?php
                                           $attr_cart=Product_Attribute::query()->find($cart['attr_id'])->combines;
                                           foreach ($attr_cart as $comb){
                                               if (Attribute::query()->find($comb->id_attribute)->group->id==17)
                                                   echo '<span>'.Attribute::query()->find($comb->id_attribute)->value->name.'</span>';
                                           }

                                           ?>
                                        @endif

                                        <span> {{$cart['count']}} عدد</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                        @endforeach

        </ul>
        <a href="{{route('main.show.cart')}}" class="basket-submit">ورود و ثبت سفارش</a>
    </ul>
</div>
