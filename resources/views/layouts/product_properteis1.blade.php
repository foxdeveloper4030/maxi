
@if($type==0)

    <div class="product-delivery-seller default">
        <p>
            <i class="now-ui-icons shopping_shop"></i>
            <span>فروشنده:‌</span>
            <a href="#" class="btn-link-border"> {{\App\PublicModel::EnappName()}}</a>
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
            @if($group->id==17)
                <span>انتخاب رنگ: </span>

                @foreach($attrs as $atrr)

                    @if($atrr->group==$group)

                        <div class="radio">
                            <input @if((new \App\Model\ProductModel($product->id))->getdefaultcolor()==$atrr)
                                   checked="checked "
                                   @endif onchange="pro()" type="radio" name="radio1" id="radio1{{$atrr->id}}" value="{{$atrr->id}}">
                            <label for="radio1{{$atrr->id}}" style="border: 2px solid {{$atrr->color}};">
                                {{$atrr->value->name}}
                            </label>
                        </div>

                    @endif
                @endforeach



            @endif
        @endforeach
        <br>
    </div>

    @foreach($groups as $group)
        @if($group->id!=17)
            <div class="product-variants default">
            <span>{{$group->public_name}}: </span>
            <select onchange="pro()" id="group{{$group->id}}" name="group{{$group->id}}" class="selectpicker" data-style="btn-primary" >

                @foreach($attrs as $atrr)

                    @if($atrr->group==$group)

                        <option value="{{$atrr->id}}">{{$atrr->value->name}}<hr></option>

                    @endif
                @endforeach
            </select>
            </div>
        @endif
    @endforeach


    <div class="product-guarantee default">
        <i class="fa fa-check-circle"></i>
        <p class="product-guarantee-text">گارانتی اصالت و سلامت فیزیکی کالا</p>
    </div>

    <div class="product-delivery-seller default">
        <p>
            <i class="now-ui-icons shopping_shop"></i>
            <span>فروشنده:‌</span>
            <a href="#" class="btn-link-border">ناسا</a>
        </p>
    </div>
    <div class="price-product defualt">
        <div class="price-value">
            <span> ۱۵,۳۹۰,۰۰۰ </span>
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
            <a href="#" class="dk-btn dk-btn-info">
                افزودن به سبد خرید
                <i class="now-ui-icons shopping_cart-simple"></i>
            </a>
        </div>
    </div>
    <script>
        function color() {
            @foreach($groups as $group)
                    @if($group->id==17)


                    @foreach($attrs as $atrr)

                    @if($atrr->group==$group)
            if (document.getElementById('radio1{{$atrr->id}}').checked)
                return '{{$atrr->id}}';
            @endif

            @endforeach
            @endif
            @endforeach
        }
        //   color();
    </script>

    <script>
        function pro() {
            posts=[];
            @if($colorselect>0)
            posts.push(color());
            @endif
            @foreach($groups as $group)
            @if($group->id!=17)
            posts.push(document.getElementById('group{{$group->id}}').value);
            @endif
            @endforeach
            alert(posts.toString());

            $(document).ready(function () {

                $.get("{{url('getproperteis')}}/"+posts+'/{{$product->id}}',
                    function (data, status) {
                        refresh_view(data['attr_id'],data['price'],data['count']);
                        alert(data['attr_id']+"*"+data['price']+"*"+data['count']+"*"+data['send']);
                        loader_dismis();


                        if (data['url']!=null)
                            document.getElementById('img-product-zoom').src=data['url'];

                    });
                document.getElementById('properteis').innerHTML=data['text'];

            });

        }
        pro();
    </script>

@endif
