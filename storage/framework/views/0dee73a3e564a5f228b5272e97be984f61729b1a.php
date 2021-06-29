

<div class="col-12" style="width: 100%">
    <article class="product">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="product-gallery default">
                    <img class="zoom-img" id="img-product-zoom" src="<?php echo e((new App\PublicModel())->image_cover($product)); ?>"
                         data-zoom-image="<?php echo e((new App\PublicModel())->image_cover($product)); ?>" width="411" />

                    <div id="gallery_01f" style="width:500px;float:left;">
                        <ul class="gallery-items owl-carousel owl-theme" id="gallery-slider">

                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item">
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                       data-image="<?php echo e((new App\PublicModel())->image_show($image->id_image)); ?>"
                                       data-zoom-image="<?php echo e((new App\PublicModel())->image_show($image->id_image)); ?>">
                                        <img src="<?php echo e((new App\PublicModel())->image_show($image->id_image)); ?>" width="100" /></a>
                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </div>
                </div>

                <!-- Modal Core -->
                <div class="modal-share modal fade" id="myModal" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">اشتراک گذاری</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-share">
                                    <div class="form-share-title">اشتراک گذاری در شبکه های اجتماعی
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="btn-group-share">
                                                <li><a href="#" class="btn-share btn-share-twitter"
                                                       target="_blank"><i
                                                                class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" class="btn-share btn-share-facebook"
                                                       target="_blank"><i
                                                                class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"
                                                       class="btn-share btn-share-google-plus"
                                                       target="_blank"><i
                                                                class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-share-title">ارسال به ایمیل</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="ui-input ui-input-send-to-email">
                                                <input class="ui-input-field" type="email"
                                                       placeholder="آدرس ایمیل را وارد نمایید.">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn-primary">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <form class="form-share-url default">
                                    <div class="form-share-url-title">آدرس صفحه</div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="ui-url">
                                                <input class="ui-url-field"
                                                       value="https://www.digikala.com">
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Core -->
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="product-title default">
                    <h1>
                        <?php echo e($product->name); ?>

                    </h1>
                </div>
                <div class="product-directory default">
                    <ul>

                        <li>
                            <span>دسته‌بندی</span> :
                            <a  class="btn-link-border">
                                <?php echo e($product->category->name); ?>

                            </a>
                        </li>
                    </ul>
                </div>
                <div class="product-delivery-seller default">
                    <p>
                        <i class="now-ui-icons shopping_shop"></i>
                        <span>فروشنده:‌</span>
                        <a href="<?php echo e(url('')); ?>" class="btn-link-border">خانه موبایل</a>
                    </p>
                </div>

                    <?php
                    $off=0;
                    if (isset($product->special))
                        if ($product->special->expire>time()){
                            $price=$price-$product->special->price_off;
                            $off=$product->special->price_off;
                        }

                    ?>
                    <br>
                    <div style="top: 100px;" class="price-product defualt">
                        <div class="price-value">
                            <span><?php echo e(number_format($product->price_main)); ?></span>
                            <span class="price-currency">تومان</span>
                        </div>
                        <div class="price-discount" data-title="تخفیف">
                                            <span>
                                                <?php echo e(number_format($off*100/$product->price_main)); ?>

                                            </span>
                            <span>%</span>
                        </div>
                    </div>
                    <br>
                <div class="product-add default">
                    <div class="parent-btn">
                <a  class="dk-btn dk-btn-success" href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                    مشاهده بیشتر ...
                    <i class="now-ui-icons shopping_cart-simple"></i>
                </a>
                    </div>
                </div>
                    <script>
                        function simplecart(count=1) {
                            $(document).ready(function () {
                                loader_show();
                                $.post("<?php echo e(route('simpelcart')); ?>",
                                    {
                                        _token: "<?php echo e(csrf_token()); ?>",
                                        id:"<?php echo e($product->id); ?>"
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



            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 center-breakpoint">
                <div class="product-params default">
                    <ul data-title="ویژگی‌های محصول">
                        <?php echo $product->details; ?>

                    </ul>
                </div>
            </div>
        </div>
    </article>
</div>
<?php if($type==1): ?>


    <script>

        var  color=0;
        cart(0);

        function cart(value) {
            color=document.getElementById('group17').value;
            loader_show();
            if(value!=0)
                color=value;
            <?php $index1=1;?>
            $(document).ready(function () {
                var  posts='';
                <?php if(session()->has('product')): ?>
                        <?php $__currentLoopData = session('product')["groups"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($group->id!=17): ?>
                    posts+=document.getElementById("group<?php echo e($group->id); ?>").value;
                <?php else: ?>
                    posts+=color;
                <?php endif; ?>
                        <?php if($index1!=count(session('product')["groups"])): ?>

                    posts+=',';
                <?php endif; ?>
                <?php  $index1++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
                $.get("<?php echo e(url('getproperteis')); ?>/"+posts+'/<?php echo e($product->id); ?>',
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
        function  refresh_view(attr_id,price,count){

            $(document).ready(function(){

                $.get("<?php echo e(route('view_properteis')); ?>/"+attr_id+"/"+price+"/"+count, function(data, status){

                    document.getElementById('properteis').innerHTML=data;

                });
            });
        }
    </script>
<?php endif; ?>
<script>
    function getpoperteis() {

    }

</script>
<?php if($type==1): ?>
    <script>

        function color() {
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($group->id==17): ?>


                    <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atrr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($atrr->group==$group): ?>
            if (document.getElementById('radio1<?php echo e($atrr->id); ?>').checked)
                return '<?php echo e($atrr->id); ?>';
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }
        //   color();
    </script>

    <script>
        function multicart(count=1) {
            $(document).ready(function () {
                loader_show();
                $.post("<?php echo e(route('multicart')); ?>",
                    {
                        _token: "<?php echo e(csrf_token()); ?>",
                        id:"<?php echo e($product->id); ?>",
                        attr_id:attribute_id
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
    <script>
        loader_show();
    </script>
<?php else: ?>

<?php endif; ?>

<script>
    //  proajax();
    loader_dismis();
    function loader_show() {
        document.getElementById('loader').style.display='block';
    }
    function loader_dismis() {
        document.getElementById('loader').style.display='none';
    }

    function delete_cart(id) {
        $(document).ready(function () {
            loader_show();
            $.post("<?php echo e(route('simpelcart')); ?>",
                {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id:id,
                    count:-1
                },
                function (data, status) {
                    loader_dismis();

                    show_cart();
                    Swal.fire(
                        ' ',
                        'محصول از سبد خرید شما حذف شد!',
                        'success'
                    );

                });
        });
    }
    function delete_cart_multy(id,attr) {
        $(document).ready(function () {
            loader_show();
            $.post("<?php echo e(route('multicart')); ?>",
                {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id:id,
                    attr_id:attr,
                    count:-1
                },
                function (data, status) {
                    loader_dismis();

                    show_cart();
                    Swal.fire(
                        ' ',
                        'محصول از سبد خرید شما حذف شد!',
                        'success'
                    );

                });
        });
    }
    <?php if(count($errors)>0): ?>
    <?php $comment_text='';  ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $comment_text.=$error.'\n';  ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    Swal.fire(
        ' ',
        '<?php echo e($comment_text); ?>',
        'error'
    );
    <?php endif; ?>
    <?php if(session()->has('comment_add')): ?>
    <?php if(session('comment_add')['state']): ?>
    Swal.fire(
        ' ',
        '<?php echo e(session('comment_add')['value']); ?>',
        'success'
    );
    <?php else: ?>
    Swal.fire(
        ' ',
        '<?php echo e(session('comment_add')['value']); ?>',
        'error'
    );
    <?php endif; ?>
    <?php endif; ?>
</script><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/front/load-product.blade.php ENDPATH**/ ?>