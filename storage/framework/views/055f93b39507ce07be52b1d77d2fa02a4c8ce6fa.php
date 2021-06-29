<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    مشاهده سبد خرید
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        input[type=number] {
            font-size: 1em;
            width: 35%;
            padding: 3px;
            margin: 0;
            border: 2px solid #ddd;
            border-radius: 7px;
            text-align: center;
        }

        input[type=number]:focus {
            outline: none;
            border-color: #acacac;
            transition: all 200ms ease;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!session()->has('cart')): ?>
        <?php session(['cart'=>array()]);  ?>

    <?php endif; ?>

    <!-- main -->
    <main class="cart-page default">
        <div class="container">
            <div class="row" id="maincarts">
              <?php echo $__env->make('layouts.maincart',['allcart'=>session('cart')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </main>
    <!-- main -->


<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#addProductToCart').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');

                function strToMoney(Number) {
                    Number += '';
                    Number = Number.replace(',', '');
                    Number = Number.replace(',', '');
                    Number = Number.replace(',', '');
                    Number = Number.replace(',', '');
                    Number = Number.replace(',', '');
                    Number = Number.replace(',', '');
                    x = Number.split('.');
                    y = x[0];
                    z = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(y))
                        y = y.replace(rgx, '$1' + ',' + '$2');
                    return y + z;
                }

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {

                        $("#numberOfCarts").fadeIn(200, function () {
                            $(this).text(data.length);
                        });

                        let priceOfCarts = 0;
                        let rowCart = '';
                        console.table((data));
                        // console.log(parseFloat(data[1]['product_price']));
                        for (let i = 0; i < data.length; i++) {
                            priceOfCarts += (parseFloat(data[i]['product_price']) * parseFloat(data[i]['product_number']));

                            rowCart += "<li><a href='./" + data[i]['product_slug'] + "' class=\"basket-item\">" +
                                "<button class=\"basket-item-remove\"></button>" +
                                "<div class=\"basket-item-content\">" +
                                "<div class=\"basket-item-image\"><img alt='" + data[i]['product_name'] + "' src='" + data[i]['product_image'] + "'> " +
                                "</div>" +
                                "<div class=\"basket-item-details\">" +
                                "<div class=\"basket-item-title\">" + data[i]['product_name'] +
                                "</div>" +
                                "<div class=\"basket-item-params\">" +
                                "<div class=\"basket-item-props\">" +
                                "<span>" + data[i]['product_number'] + "</span><span>رنگ مشکی</span>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</a></li>";
                        }

                        $("ul.basket-list").html('');
                        $("ul.basket-list").append(rowCart)
                        $("#priceOfCarts").fadeIn(200, function () {
                            $(this).text(strToMoney(priceOfCarts));
                        });
                        // console.table(data.cartSend);
                        Swal.fire({
                            type: 'success',
                            title: 'موفقیت آمیز',
                            text: 'محصول با موفقیت، به سبد خرید اضافه گردید!',
                        });
                        // =====================================================
                        /*
                        $('.product-summary').remove();
                        $('.SeparatorCart').remove();
                        var i;
                        var rowCart = '';
                        // console.log(JSON.stringify(data.productsCart[0], null, 4));
                        if (data.userHasMiliRevenu === true) {
                            for (i = 0; i < data.productsCart.length; i++) {
                                rowCart += '<div class="cart-item product-summary"><div class="row">' +
                                    '<div class="col-xs-4"><div class="image"><a href="detail.html">' +
                                    '<img src="' + data.photos[i] + '" alt=""></a></div></div><div class="col-xs-7"><h3 class="name">' +
                                    '<a href="index.php?page-detail">' + data.productsCart[i]["name"] + '</a></h3>' +
                                    '<div class="price">تومان' + data.productsCart[i]["price_off"] + '</div>' +
                                    '</div><div class="col-xs-1 action"><a data-id="' + data.idCarts[i] + '"' +
                                    ' class="deleteCart" href="" data-url="' + data.urlsForDeleteItemCart[i] + '">' +
                                    '<i class="fa fa-trash"></i></a></div></div> </div> <div class="SeparatorCart"></div>';
                            }
                        } else {
                            for (i = 0; i < data.productsCart.length; i++) {
                                rowCart += '<div class="cart-item product-summary"><div class="row">' +
                                    '<div class="col-xs-4"><div class="image"><a href="detail.html">' +
                                    '<img src="' + data.photos[i] + '" alt=""></a></div></div><div class="col-xs-7"><h3 class="name">' +
                                    '<a href="index.php?page-detail">' + data.productsCart[i]["name"] + '</a></h3>' +
                                    '<div class="price">تومان' + data.productsCart[i]["price_main"] + '</div>' +
                                    '</div><div class="col-xs-1 action"><a data-id="' + data.idCarts[i] + '"' +
                                    ' class="deleteCart" href="" data-url="' + data.urlsForDeleteItemCart[i] + '">' +
                                    '<i class="fa fa-trash"></i></a></div></div> </div> <div class="SeparatorCart"></div>';
                            }
                        }

                        $(rowCart).insertBefore('#nextForInsertCart');
                        $('#countCart').text(data.totalNumberCart);
                        $("span#cost").fadeOut(200, function () {
                            $(this).text(data.totalPriceCart).fadeIn();
                        });
                        $("span#totalPrice").fadeOut(200, function () {
                            $(this).text('تومان ' + data.totalPriceCart).fadeIn();
                        });

                        $('#showbtncheckout > a.btn-upper').attr('disabled', false);

                        // console.table(data);
                        swal("موفق", "محصول با موفقیت به سبد خرید اضافه شد", "success");
                        // */
                    }, error: function (error) {
                        console.log('ERROR 1');
                        swal("", "محصول به سبد خرید اضافه نگردید.", "error");
                    }
                })

            });


            $('#completeCarts').on('click', '.deleteCompleteCart[data-id]', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        // alert("ok")
                        $('#completeCarts' + data.id + '').fadeOut(300, function () {
                            $(this).remove();
                        });

                        $('#countCart').text(data.totalNumberCart);
                        $("span#cost").fadeOut(200, function () {
                            $(this).text(data.totalPriceCart).fadeIn();
                        });
                        $("#totalPriceOfProducts").fadeOut(200, function () {
                            $(this).text(data.totalPriceCart + 'تومان').fadeIn();
                        });
                        // swal("موفق", "با موفقیت ثبت گردید", "success");

                    }, error: function (error) {
                        console.log('ERROR');
                        // swal("", "همه موارد را تکمیل نمایید.", "info");
                    }
                })  //  end of AJAX
            })


        }); //  end of jquery
    </script>

    <script>
        function countcart(th,attr,product) {
            if (th.value<1)
                th.value=1;
            else
            multicart1(product,attr,th.value);
        }
    </script>

    <script>
        function multicart1(product,attr,count) {
            $(document).ready(function () {
                loader_show();

                $.get("<?php echo e(route('count_cart')); ?>/"+product+"/"+attr+"/"+count,
                    function (data, status) {
                        document.getElementById('maincarts').innerHTML=data;
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
                            })
                    });
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkalaWithMelat\resources\views/front/seeCart.blade.php ENDPATH**/ ?>