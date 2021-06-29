@if((new \App\PublicModel())->AllCount($product)>0)
    <div class="price">
        @if((new \App\Model\ProductModel($product->id))->specialcost()!=0)
            <div class="text-center">
                <del><span>{{number_format($product->price_main)}}<span>تومان</span></span>
                </del>
            </div>
            <div class="text-center">
                <ins><span>{{number_format((new \App\Model\ProductModel($product->id))->specialcost())}}<span>تومان</span></span>
                </ins>
            </div>
        @else
            <div class="text-center">
                <ins><span>{{number_format($product->price_main)}}<span>تومان</span></span>
                </ins>
            </div>


        @endif
    </div>

@else
    <div class="price">
        <div class="text-center">
            <ins><span>اتمام موجودی<span></span></span>
            </ins>
        </div>
    </div>

@endif
