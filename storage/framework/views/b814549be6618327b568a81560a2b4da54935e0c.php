<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta name="author" content="">
    <meta name="robots" content="all">
    <?php echo $__env->yieldContent('meta'); ?>

    <title>  ثبت سفارش</title>

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('public/assets/img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('public/assets/img/favicon.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/fonts/font-awesome/css/font-awesome.min.css')); ?>"/>
    <!-- CSS Files -->
    <link href="<?php echo e(asset('public/assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/now-ui-kit.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.carousel.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/plugins/owl.theme.default.min.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/css/main.css')); ?>" rel="stylesheet"/>

    <style>

    </style>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<div class="wrapper default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-8 mx-auto">
                <div class="account-box checkout-page">
                    <a href="<?php echo e(route('urlMain')); ?>" class="logo">
                        <img src="<?php echo e(asset('public/assets/img/logo.jpg')); ?>" alt="">
                    </a>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger"><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row form-account-row justify-content-around">
                        <div class="product-variants col col-lg-8 justify-content-around">
                            <div class="account-box-title" style="text-align: center;">
                                <span style="display: inline-block">انتخاب آدرس</span>
                            </div>
                            <div class="" style="width: 100%;margin: 2% 25% 0 2px;">
                                <div class="radio">
                                    <input type="radio" name="sendAddress" id="meAddr" value="meAddr">
                                    <label for="meAddr">ارسال به خودم</label>
                                </div>

                            </div>
                        </div>
                        <?php if ($errors->has('sex_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sex_id'); ?>
                        <span class="" role="alert"><strong class="text-danger"><?php echo e($sex_id); ?></strong></span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                    </div>
                    <div class="account-box-content" id="containerAddress">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mini-footer">
        <nav>
            <div class="container">
            </div>
        </nav>
        <div class="copyright-bar">

        </div>
    </footer>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo e(asset('public/assets/js/core/jquery.3.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/assets/js/core/popper.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/assets/js/core/bootstrap.min.js')); ?>" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo e(asset('public/assets/js/plugins/bootstrap-switch.js')); ?>"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?php echo e(asset('public/assets/js/plugins/nouislider.min.js')); ?>" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="<?php echo e(asset('public/assets/js/plugins/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="<?php echo e(asset('public/assets/js/plugins/jquery.sharrre.js')); ?>" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="<?php echo e(asset('public/assets/js/now-ui-kit.js')); ?>" type="text/javascript"></script>
<!--  CountDown -->
<script src="<?php echo e(asset('public/assets/js/plugins/countdown.min.js')); ?>" type="text/javascript"></script>
<!--  Plugin for Sliders -->
<script src="<?php echo e(asset('public/assets/js/plugins/owl.carousel.min.js')); ?>" type="text/javascript"></script>
<!--  sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!--  Jquery easing -->
<script src="<?php echo e(asset('public/assets/js/plugins/jquery.easing.1.3.min.js')); ?>" type="text/javascript"></script>
<!--  LocalSearch -->
<script src="<?php echo e(asset('public/assets/js/plugins/JsLocalSearch.js')); ?>" type="text/javascript"></script>
<!-- Main Js -->
<script src="<?php echo e(asset('public/assets/js/main.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('input[type="radio"][name="sendAddress"]').on('change', function () {
            let radioType = $("input[name='sendAddress']:checked").val();
            if (radioType == 'meAddr') {
                console.log(radioType);
                $(".account-box-content > form[name='otherForm']").remove();
                if ((document.querySelector('#containerAddress form[name=\'meForm\']')) == null) {
                    $(".account-box-content").append("<div id='selectPrevAddress' class=\"row\">\n" +
                        "                            <div class=\"col-12\">\n" +
                        "                                <div class=\"checkout-title text-right\">انتخاب آدرسهای قبلی</div>\n" +
                        "                            </div>\n" +
                        "                            <div style=\"width: 30%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%\">\n" +
                        "                                <select id=\"meAddress\" name=\"meAddress\"\n" +
                        "                                        class=\"input-field text-right\"\n" +
                        "                                        type=\"text\" style=\"text-indent: 30%!important;\"\n" +
                        "                                        onchange=\"new function(){\n" +
                        "                                            $(document).ready(function () {\n" +
                        "                                            let meAddressId = $('#meAddress').children('option:selected').val();"+
                        "                                            $.get('<?php echo e(route('getMeAddress')); ?>/'+meAddressId,\n" +
                        "                                            function (data, status) {\n" +
                        "                                            $('#myTitle').text(data.title);\n" +
                        "                                            $('#address1').val(data.address1);\n" +
                        "                                            var inputs_to_values = {\n" +
                        "                                            'firstname' : data.firstname,\n" +
                        "                                            'lastname' : data.lastname,\n" +
                        "                                            'phone_mobile' : data.phone_mobile,\n" +
                        "                                            'province' : data.province,\n" +
                        "                                            'provinceId' : data.provinceId,\n" +
                        "                                            'mycity' : data.city,\n" +
                        "                                            'cityId' : data.cityId,\n" +
                        "                                            'postcode' : data.postcode,\n" +
                        "                                            };\n" +
                        "                                            $('.form-account').find('input').val(function (index, value) {\n" +
                        "                                            return inputs_to_values[this.id];\n" +
                        "                                            });\n" +
                        "                                            let city= document.getElementById('city');\n" +
                        "                                            city.remove(city.selectedIndex);\n" +
                        "                                            city.innerHTML=data;\n" +
                        "                                            });});}\">\n" +
                        "                                       <option>انتخاب آدرس</option>"+
                        "                                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n" +
                        "                                        <option value=\"<?php echo e($address->id); ?>\">\n" +
                        "                                            <?php echo e($address->title); ?>\n" +
                        "                                        </option>\n" +
                        "                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n" +
                        "                                </select>\n" +
                        "                                <?php if($errors->has('province')): ?>\n" +
                        "                                    <span class=\"\" role=\"alert\">\n" +
                        "                                                                        <strong\n" +
                        "                                                                            class=\"text-danger\"><?php echo e($errors->first('province')); ?></strong>\n" +
                        "                                                                    </span>\n" +
                        "                                <?php endif; ?>\n" +
                        "                            </div>\n" +
                        "                        </div>\n" +
                        "                        <form name=\"meForm\" class=\"form-account\" method=\"post\" action=\"<?php echo e(route('main.order.store')); ?>\">\n" +
                        "                           <input type=\"hidden\" name=\"_token\" value=\"<?php echo e(csrf_token()); ?>\">\n" +
                        "                            <div class=\"row\">\n" +
                        "                                <div class=\"col-12\">\n" +
                        "                                    <div class=\"checkout-title text-right\" id=\"myTitle\">از لیست بالا، یکی از آدرس‌ها را انتخاب نمایید. </div>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"col-md-6 col-sm-12\">\n" +
                        "                                    <div class=\"form-account-title\">نام تحویل گیرنده</div>\n" +
                        "                                    <div class=\"form-account-row\">\n" +
                        "                                        <input name=\"firstname\" readonly id=\"firstname\"\n" +
                        "                                               class=\"input-field text-right\" type=\"text\">\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"col-md-6 col-sm-12\">\n" +
                        "                                    <div class=\"form-account-title\"> نام خانوادگی تحویل گیرنده</div>\n" +
                        "                                    <div class=\"form-account-row\">\n" +
                        "                                        <input name=\"lastname\" readonly id=\"lastname\"\n" +
                        "                                               class=\"input-field text-right\" type=\"text\">\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"col-md-6 col-sm-12\">\n" +
                        "                                    <div class=\"form-account-row\">\n" +
                        "                                        <div class=\"form-account-title\">استان</div>\n" +
                        "                                        <div class=\"form-account-row\">\n" +
                        "                                            <input name=\"province\" readonly id=\"province\"\n" +
                        "                                                   class=\"input-field text-right\" type=\"text\">\n" +
                        "                                            <input name=\"provinceId\" readonly id=\"provinceId\"\n" +
                        "                                                   type=\"hidden\">\n" +
                        "                                        </div>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"col-md-6 col-sm-12\">\n" +
                        "                                    <div class=\"form-account-row\">\n" +
                        "                                        <div class=\"form-account-title\">شهرستان</div>\n" +
                        "                                        <div class=\"form-account-row\">\n" +
                        "                                            <input name=\"city\" readonly id=\"mycity\"\n" +
                        "                                                   class=\"input-field text-right\" type=\"text\">\n" +
                        "                                           <input name=\"cityId\" readonly id=\"cityId\"\n" +
                        "                                               type=\"hidden\">\n" +
                        "                                        </div>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"col-md-6 col-sm-12\">\n" +
                        "                                    <div class=\"form-account-title\">شماره موبایل</div>\n" +
                        "                                    <div class=\"form-account-row\">\n" +
                        "                                        <input name=\"phone_mobile\" id=\"phone_mobile\" class=\"input-field\" type=\"text\" readonly>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"col-md-6 col-sm-12\">\n" +
                        "                                    <div class=\"form-account-title\">کد پستی</div>\n" +
                        "                                    <div class=\"form-account-row\">\n" +
                        "                                        <input name=\"postcode\" id=\"postcode\" class=\"input-field\" type=\"text\" readonly>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                                <div class=\"col-12\">\n" +
                        "                                    <div class=\"form-account-title\">آدرس گیرنده</div>\n" +
                        "                                    <div class=\"form-account-row\">\n" +
                        "                                        <textarea id=\"address1\" name=\"address1\" readonly class=\"input-field text-right\" rows=\"5\"></textarea>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                            </div>\n" +
                        "                            <div class=\"row\">\n" +
                        "                                <div class=\"col-12\">\n" +
                        "                                    <div class=\"form-account-row text-left\">\n" +
                        "                                        <button class=\"btn btn-info\">ثبت و ارسال</button>\n" +
                        "                                    </div>\n" +
                        "                                </div>\n" +
                        "                            </div>\n" +
                        "                        </form>");
                }
            } else if (radioType == 'otherAddr') {
                console.log(radioType,document.getElementById('containerAddress').children.length);
                $(".account-box-content > form[name='meForm']").remove();
                $("#selectPrevAddress").remove();
                if ((document.querySelector('#containerAddress form[name=\'otherForm\']')) == null) {
                    $(".account-box-content").append("" +
                        "<form name=\"otherForm\" class=\"form-account\" method=\"post\" action=\"<?php echo e(route('main.order.store')); ?>\">\n" +
                        "   <input type=\"hidden\" name=\"_token\" value=\"<?php echo e(csrf_token()); ?>\">\n" +
                        "   <div class=\"row\">\n" +
                        "       <div class=\"col-12\">\n" +
                        "           <div class=\"checkout-title text-right\">افزودن آدرس جدید</div>\n" +
                        "       </div>\n" +
                        "       <input name=\"newAddress\" value=\"yes\" type=\"hidden\">\n" +
                        "       <div class=\"row col-12\" style='margin-bottom:3%'>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\">عنوان آدرس</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input style='text-align:right' name=\"title\" id=\"title\" class=\"input-field\" type=\"text\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "       </div>\n" +
                        "       <?php if($ad!=null): ?>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\">نام تحویل گیرنده</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input value=\"<?php echo e($ad->name); ?>\" name=\"firstname\" class=\"input-field text-right\" type=\"text\" placeholder=\"نام تحویل گیرنده را وارد نمایید\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\"> نام خانوادگی تحویل گیرنده</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input value=\"<?php echo e($ad->lastname); ?>\" name=\"lastname\" class=\"input-field text-right\" type=\"text\" placeholder=\"نام خانوادگی تحویل گیرنده را وارد نمایید\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <select id=\"province\" name=\"provinceId\" class=\"input-field text-right\"\n" +
                        "                           type=\"text\"\n" +
                        "                           onchange=\"new function(){\n" +
                        "                               $(document).ready(function () {\n" +
                        "                               $.get('<?php echo e(route('getcity')); ?>/'+document.getElementById('province').value,\n" +
                        "                               function (data, status) {\n" +
                        "                               document.getElementById('city').innerHTML=data;\n" +
                        "                               });});}\">\n" +
                        "                       <option>انتخاب استان</option>\n" +
                        "                       <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n" +
                        "                           <option value=\"<?php echo e($province->id); ?>\">\n" +
                        "                               <?php echo e($province->name); ?>\n" +
                        "                           </option>\n" +
                        "                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n" +
                        "                   </select>\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <select id=\"city\" name=\"cityId\" class=\"input-field text-right\" type=\"text\">\n" +
                        "                       <option value='<?php echo e(App\City::query()->find($ad->city_id)->id); ?>'><?php echo e(App\City::query()->find($ad->city_id)->name); ?></option>\n" +
                        "                   </select>\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\">شماره موبایل</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input value=\"<?php echo e($ad->tel); ?>\" name=\"phone_mobile\" class=\"input-field\" type=\"text\" placeholder=\" شماره موبایل خود را وارد نمایید\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-12\">\n" +
                        "               <div class=\"form-account-title\">آدرس گیرنده</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <textarea name=\"address1\" class=\"input-field text-right\" rows=\"5\" placeholder=\" آدرس گیرنده\"><?php echo e($ad->addres); ?></textarea>\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\">کد پستی</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input name=\"postcode\" class=\"input-field\" type=\"text\" placeholder=\" کد پستی\" value=\"<?php echo e($ad->postal_code); ?>\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "       <?php else: ?>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\">نام تحویل گیرنده</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input name=\"firstname\" class=\"input-field text-right\" type=\"text\" placeholder=\"نام تحویل گیرنده را وارد نمایید\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\"> نام خانوادگی تحویل گیرنده</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input name=\"lastname\" class=\"input-field text-right\" type=\"text\" placeholder=\"نام خانوادگی تحویل گیرنده را وارد نمایید\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <select id=\"province\" name=\"provinceId\" class=\"input-field text-right\" type=\"text\"\n" +
                        "                           onchange=\"new function(){\n" +
                        "                               $(document).ready(function () {\n" +
                        "                               $.get('<?php echo e(route('getcity')); ?>/'+document.getElementById('province').value,\n" +
                        "                               function (data, status) {\n" +
                        "                               document.getElementById('city').innerHTML=data;\n" +
                        "                               });});}\">\n" +
                        "                       <option>انتخاب استان</option>\n" +
                        "                       <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n" +
                        "                           <option value=\"<?php echo e($province->id); ?>\">\n" +
                        "                               <?php echo e($province->name); ?>\n" +
                        "                           </option>\n" +
                        "                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n" +
                        "                   </select>\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <select id=\"city\" name=\"cityId\" class=\"input-field text-right\" type=\"text\"></select>\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\">شماره موبایل</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input name=\"phone_mobile\" class=\"input-field\" type=\"text\" placeholder=\" شماره موبایل خود را وارد نمایید\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-md-6 col-sm-12\">\n" +
                        "               <div class=\"form-account-title\">کد پستی</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <input name=\"postcode\" class=\"input-field\" type=\"text\" placeholder=\" کد پستی\">\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "           <div class=\"col-12\">\n" +
                        "               <div class=\"form-account-title\">آدرس گیرنده</div>\n" +
                        "               <div class=\"form-account-row\">\n" +
                        "                   <textarea name=\"address1\" class=\"input-field text-right\" rows=\"5\" placeholder=\" آدرس گیرنده\"></textarea>\n" +
                        "               </div>\n" +
                        "           </div>\n" +
                        "       <?php endif; ?>\n" +
                        "   </div>\n" +
                        "   <div class=\"row\">\n" +
                        "       <div class=\"col-12\">\n" +
                        "           <div class=\"form-account-row text-left\">\n" +
                        "               <button class=\"btn btn-info\">ثبت و ارسال\n" +
                        "                </button>\n" +
                        "            </div>\n" +
                        "        </div>\n" +
                        "    </div>\n" +
                        "</form>\n");
                }
            }
        });  //  end of radio
    });    //  end of jquery
</script>
</html>
<?php /**PATH C:\xampp\htdocs\arsi\resources\views/front/orderregister.blade.php ENDPATH**/ ?>