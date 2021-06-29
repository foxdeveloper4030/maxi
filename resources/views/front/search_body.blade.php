


@foreach($products as $product)
    <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
        @if((new \App\Model\ProductModel($product->id))->count()<1)
            <div class="label-check">موجود نیست</div>
        @endif
        <div class="product-box">
            <div
                    class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                    class="product-seller-details-label">فروشنده:
                                                            </span> {{\App\PublicModel::EnappName()}}</span>
                <span class="product-seller-details-badge-container"></span>
            </div>
            <a class="product-box-img" href="{{route('main.product.show',['slug'=>$product->slug])}}">
                <img src="{{(new \App\PublicModel())->image_cover($product)}}" alt="">
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
                    <div class="price">
                        <div class="price-value">
                            <div class="price-value-wrapper">
                                {{number_format($product->price_main)}} <span
                                        class="price-currency">تومان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
