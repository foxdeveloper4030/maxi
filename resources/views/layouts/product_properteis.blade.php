
@if($type==0)

    <div class="product-delivery-seller default">
        <p>
            <i class="now-ui-icons shopping_shop"></i>
            <span>فروشنده:‌</span>
            <a href="{{url('')}}" class="btn-link-border"> {{\App\PublicModel::EnappName()}}</a>
        </p>
    </div>
    <div class="price-product defualt">
        <div class="price-value">
            <span>{{number_format($price)}}</span>
            <span class="price-currency">تومان</span>
        </div>
        <div class="price-discount" data-title="تخفیف">
                                            <span>
                                                ۰
                                            </span>
            <span>%</span>
        </div>
    </div>
    <div class="product-add default">
        <div class="parent-btn">
            @if($count!=0)
            <button onclick="simplecart()" class="dk-btn dk-btn-info">
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
    <script>
        function simplecart(count=1) {
            $(document).ready(function () {
                loader_show();
                $.post("{{route('simpelcart')}}",
                    {
                        _token: "{{csrf_token()}}",
                        id:"{{$product->id}}"
                    },
                    function (data, status) {
                        loader_dismis();

                        show_cart();
                        alert(data['state']['status']);
                        if (data['state']['status']==true)
                        Swal.fire(
                            ' ',
                           'محصول با موفقیت به سبد خرید اضاف شد',
                            'success'
                        );
                        else
                            Swal.fire({
                                type: 'error',
                                title: ' ',
                                text:'تعداد محصول بیشتر از موجودی می باشد',
                            })
                    });
            });
        }
    </script>
@endif


@if($type==1)
    <div class="product-variants default">
        @foreach($groups as $group)
            <span>{{$group->public_name}}
                                        :</span>
            <br>


                <select onchange="cart(0)" id="group{{$group->id}}" name="group{{$group->id}}" class="selectpicker" data-style="btn-primary" >

                    <?php  $index=1;  ?>
                    @foreach($attrs as $atrr)

                        @if($atrr->group==$group)
                            {{--@if($group->id==17)--}}
                                {{--<div style="display: inline;border: 1px solid black;width:100px;margin: 2px;border-radius: 3px;">--}}


                                    {{--<input  onchange="cart(this.value)" id="group{{$group->id}}"  name="group{{$group->id}}" value="{{$atrr->id}}" type="radio">--}}

                                    {{--<?php   $index+=1;  ?>--}}
                                    {{--<label for="radio{{$index}}">--}}
                                        {{--{{$atrr->value->name}}--}}
                                    {{--</label>--}}
                                    {{--@if(1)--}}
                                        {{--<span class="badge" style="background-color: {{$atrr->color}};width:20px;height: 20px;">.</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--@else--}}
                                <option value="{{$atrr->id}}">{{$atrr->value->name}}<hr></option>



                        @endif
                    @endforeach

                </select>

            <br>

        @endforeach



    </div>
    <div class="product-delivery-seller default">
        <p>
            <i class="now-ui-icons shopping_shop"></i>
            <span>فروشنده:‌</span>
            <a href="{{url('')}}" class="btn-link-border"> {{\App\PublicModel::EnappName()}}</a>
        </p>
    </div>
<div id="properteis">
   @include('layouts.attr_select')
</div>
<script>

    // cart(0);
</script>

@endif
