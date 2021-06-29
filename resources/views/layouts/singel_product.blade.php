

<div id="div{{$product->id}}" onmouseenter="new function() {
       document.getElementById('div{{$product->id}}').style.border='1px solid red';
        }" onmouseleave="new function() {
        document.getElementById('div{{$product->id}}').style.border='none';
        }" class="col-md-4 col-lg-3 card widget-services widget" style="height: 400px;">


    <div class="card-header">
        <a href="{{route('main.product.show',['slug'=>$product->slug])}}">
            <img src="{{(new \App\PublicModel())->image_cover($product,1)}}"
                 class="img-fluid" alt="">
        </a>
    </div>

    <div class="card-body">

        <p class="post-title small">
            <a href="{{route('main.product.show',['slug'=>$product->slug])}}">{{$product->name}}</a>
        </p>
        <div class="price">
            <div class="text-center">
                <del><span><span></span></span></del>
            </div>
            <div class="text-center">
                <ins><span>{{number_format($product->price_main)}}<span>تومان</span></span></ins>

            </div>
        </div>
        <br>
        @foreach(\App\Product_Attribute_Combination::query()->where('product_id','=',$product->id)->get() as $comine)
            @if($comine->atrr->color!=null)
                <span class="badge" style="margin: 5px;width: 20px;height: 10px;border-radius: 1px;background-color: {{$comine->atrr->color}}">
&ensp;
            </span>
            @endif
        @endforeach
    </div>



</div>

