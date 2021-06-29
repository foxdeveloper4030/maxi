

<li data-brand="{{$product->id_manufacturer}}" id="item{{$index}}"  data-price="{{$product->price_main}}"  class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
    @if((new \App\Model\ProductModel($product->id))->count()<1)
        <div class="label-check">موجود نیست</div>

    @else
        <div class="label-check" style="background-color: green">جدید</div>
    @endif
    <div class="product-box">
        <div
                class="product-seller-details product-seller-details-item-grid">
            <div class="btn-group" style="height: 50px">
                <a onclick="compare_add('{{$product->id}}')" class="btn" style="background-color: tomato;width:100%;height:40px" onclick="addToCart()">
                    افزودن به لیست مقایسه
                    <i class="now-ui-icons shopping_tag-content"></i>
                </a>

            </div>
        </div>
        <a class="product-box-img" href="{{route('main.product.show',['slug'=>$product->slug])}}">
            <img src="{{(new \App\PublicModel())->image_cover($product)}}" alt="{{$product->name}}">
        </a>
        <div class="product-box-content">
            <div class="product-box-content-row">
                <div class="product-box-title">
                    <a href="{{route('main.product.show',['slug'=>$product->slug])}}">
                        {{$product->name}}
                    </a>
                </div>
            </div>
            <div class="product-box-row product-box-row-price">
                @include('product.price',['product'=>$product])
            </div>
        </div>
    </div>
</li>
