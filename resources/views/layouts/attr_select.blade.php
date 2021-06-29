





<div class="price-product defualt">
    {{$attr_id}}/{{$count}}/{{$price}}
  <input id="attr_input" type="hidden" value="{{$attr_id}}">
    <div class="price-value" id="price0">
        <span id="price1" > {{number_format($product->price_main+App\Product_Attribute::query()->find($attr_id)->price)}}</span>
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
    @if($attr_id!=0&&$count>0)
    <div class="parent-btn">
        <button onclick="multicart()" class="dk-btn dk-btn-info">
             افزودن به سبد خرید
            <i class="now-ui-icons shopping_cart-simple"></i>
        </button>
    </div>
    @endif
</div>
@if($attr_id==0)
    <div class="product-add default">
        <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
            محصولی یافت نشد!ا
            <i class="now-ui-icons show-less"></i>
        </a>

    </div>
    @else
    @if($count==0)
        <div class="product-add default">
            <a style="cursor: not-allowed" class="dk-btn dk-btn-danger">
                اتمام موجودی
                <i class="now-ui-icons show-less"></i>
            </a>

        </div>
    @endif

@endif

<script>
    function multicart(count=1) {
        $(document).ready(function () {
            loader_show();
            $.post("{{route('multicart')}}",
                {
                    _token: "{{csrf_token()}}",
                    id:"{{$product->id}}",
                    attr_id:document.getElementById('attr_input').value
                },
                function (data, status) {
                    loader_dismis();

                    show_cart();

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
