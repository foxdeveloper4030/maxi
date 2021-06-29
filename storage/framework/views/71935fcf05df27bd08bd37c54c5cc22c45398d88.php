

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    پنل کاربری
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('public/assets/css/plugins/kamadatepicker.css')); ?>" rel="stylesheet"/>

    <style>
        .profile-box-tabs > a:hover > i {
            transition: all 200ms ease;
            color: #00bfd6;
            font-weight: bold;
        }

        .form-account-row1 {
            margin: 0 -15px 23px;
        }

        #deleteAvatarUser:hover {
            transition: all 100ms ease;
            cursor: pointer;
            text-shadow: 0px 2px 2px rgba(34, 45, 50, 0.4);
        }

        a:hover .fa-trash {
            transition: all 200ms ease;
            color: #ef5661 !important;
        }

        .update > i.fa-save:before {
            color: #57a43f !important;
            cursor: pointer;
        }

        .update:hover > i.fa-save:before {
            transition: all 100ms ease;
            color: #166214 !important;
            font-size: 30px;
        }

        .delete > i.fa-trash:before {
            color: #ef5661 !important;
            cursor: pointer;
        }

        .delete:hover > i.fa-trash:before {
            transition: all 100ms ease;
            color: #a01f31 !important;
            font-size: 30px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $user = \Illuminate\Support\Facades\Auth::user(); ?>
    <!-- main -->
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">لیست علاقمندی ها</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row">
                                    <div class="col-12">
                                        <?php $__empty_1 = true; $__currentLoopData = $user->loves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $love): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php  $product = \App\Product::query()->find($love->product_id);  ?>
                                            <div class="profile-recent-fav-row">
                                                <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>"
                                                   class="profile-recent-fav-col profile-recent-fav-col-thumb">
                                                    <img src="<?php echo e((new \App\PublicModel())->image_cover($product)); ?>"></a>
                                                <div class="profile-recent-fav-col profile-recent-fav-col-title">
                                                    <a href="<?php echo e(route('main.product.show',['slug'=>$product->slug])); ?>">
                                                        <h4 class="profile-recent-fav-name">
                                                            <?php echo e(\App\Product::query()->find($love->product_id)->name); ?>

                                                        </h4>
                                                    </a>
                                                    <div class="profile-recent-fav-price"><?php echo e($product->price_main); ?></div>
                                                </div>
                                                <div class="profile-recent-fav-col profile-recent-fav-col-actions">
                                                    <a href="<?php echo e(route('main.love.delete',['id'=>$product->id])); ?>"
                                                       class="btn-action btn-action-remove">
                                                        <i class="fa fa-trash"
                                                           style="margin-right: 33%;line-height: 25px;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="alert alert-info">
                                                لیست علاقه مندی شما خالی می باشد
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php echo $__env->make('auth.base_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <?php if(isset($alert)): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e($alert); ?>

                                    </div>
                                <?php endif; ?>
                                <h1 class="title-tab-content">پیگیری سفارش</h1>
                            </div>
                            <div class="content-section default">
                                <form method="get" class="profile-return-request-form">
                                    <p> برای اطلاع از وضعیت سفارش خود، شماره سفارش را در زیر وارد نمایید.</p>
                                    <div class="profile-return-request-form-row">
                                        <div class="row">
                                            <div class="col-md-9 col-12">
                                                <div class="profile-return-request-form-field">
                                                    <label class="ui-input">

                                                        <input id="refrense" class="input-field" type="text"
                                                               placeholder="مثلا 765301">


                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div
                                                    class="profile-return-request-form-button profile-return-request-form-button-top-btn">
                                                    <button type="button" onclick="new function() {
                                                        if (document.getElementById('refrense').value!='')
                                                        window.location.href='<?php echo e(url('')); ?>/oder/refrenseshow/'+document.getElementById('refrense').value;
                                                        else
                                                        alert('شماره پیگیری شفارش نمیتواند خالی باشد!!');
                                                        }" class="btn-primary">بررسی سفارش
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/assets/js/plugins/kamadatepicker.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        kamaDatepicker('data-input', {
            buttonsColor: '#ef5661',
            forceFarsiDigits: true,
            markToday: true,
            markHolidays: true,
            highlightSelectedDay: true,
            sync: true,
            gotoToday: true,
        });

        $(document).ready(function () {
            $('#submitFormInfoUser').on('submit', function (e) {
                e.preventDefault();
                let url_ = $(this).attr('data-url');
                let formData = new FormData(this);
                // console.table(formData.get('firstname'));
                $.ajax({
                    type: "POST",
                    url: url_,
                    // data: $(this).serialize(),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        // console.table(data);
                        // debugger;
                        $('#fullnameedit').text(formData.get('firstname') + " " + formData.get('lastname'));
                        $('#usernameInfoEdit').text(formData.get('firstname') + " " + formData.get('lastname'));
                        $('#websiteedit').text(formData.get('website'));
                        $('#birthdayedit').text(formData.get('birthday'));
                        // $('#editModalBorder').css('border', '4px solid green');
                        // $('#editModalBorder').css('border-radius', '5px');
                        $('#closeModal').trigger('click');
                        Swal.fire(
                            'بروزرسانی',
                            'اطلاعات شما، با موفقیت، بروزرسانی شد!',
                            'success'
                        );
                    }, error: function (error) {
                        console.log('error')
                    }
                })
            })


            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#setImageUpload').attr('src', e.target.result);
                        $('#avatarDefault').hide();
                        $('#avatarDefault').fadeIn(650);
                        $('#avataredit').attr('src', e.target.result);
                        $('#avataredit').hide();
                        $('#avataredit').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#imageUpload').on('change', function (e) {
                readURL(this);
            }); //  end of #imageUpload


            $('#deleteAvatarUser').on('click', function (e) {
                e.preventDefault();
                var url = "<?php echo e(route('main.user.deleteAvatarUser')); ?>";
                console.log(url);
                $.ajax({
                    method: 'GET',
                    url: url,
                    success: function (msg) {
                        console.log(msg['defaultUrlImg']);
                        $('#setImageUpload').attr('src', msg['defaultUrlImg']);
                        $('#avataredit').attr('src', msg['defaultUrlImg']);
                    }
                })
            });

            //  for ps_address
            $('#editModalAddrss').on('click', '.deleteAddress[data-id]', function (e) {
                e.preventDefault();
                console.log('hi');
                var url = $(this).attr('data-url');
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        $('#submitFormInfoUser' + data.idDelete).remove();
                        $('.SeparatorCart').remove();
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'آدرس مورد نظر حذف گردید.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }, error: function (error) {
                        console.log('ERROR');
                    }
                })
            });

            $('#editModalAddrss').on('click', '.updateAddressUser[data-selectedId]', function (e) {
                e.preventDefault();
                let id__ = $(this).attr('data-selectedId');
                console.log('salam');
                    
                let url_ = $(this).attr('href');
                let myForm = $('#submitFormInfoUser' + id__);
                $.ajax({
                    url: url_,
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: new FormData(myForm[0]),
                    success: function (data, status) {
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'آدرس مورد نظر، آپدیت شد!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function (result, status, err) {
                        console.log('error is delete img from jquery');
                    }
                }); //  end of ajax
            });  // end update address
            //  end of  ps_address
        }); //  end of jquery
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/auth/love.blade.php ENDPATH**/ ?>