<div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
    <div class="profile-box">
        <div class="profile-box-header">
            <div class="profile-box-avatar">
                <?php if(($user->avatar) != ""): ?>
                    <img id="avataredit" src="<?php echo e($user->avatar); ?>"
                         alt="avatar">
                <?php else: ?>
                    <img id="avataredit" src="<?php echo e(asset('public/assets/img/svg/myavatar.png')); ?>"
                         alt="avatar">
                <?php endif; ?>
            </div>

            <!-- Modal Core -->
            <div class="modal-share modal-width-custom modal fade" id="myModal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">تغییر نمایه کاربری شما</h4>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- Modal Core -->
        </div>
        <div id="usernameInfoEdit" class="profile-box-username">
            <?php echo e($user->fullname); ?>

        </div>
        <div class="profile-box-tabs"
             style="display: flex;flex-direction: row;justify-content: space-around;align-items: stretch;">
            <a href="<?php echo e(route('main.user.changepass')); ?>" style="flex-grow: 1;flex-basis: 50%;"
               class="profile-box-tab profile-box-tab-access center-block">
                <i class="now-ui-icons ui-1_lock-circle-open" sy></i>
                تغییر رمز عبور
            </a>
            <a href="<?php echo e(route('logout')); ?>" class="profile-box-tab profile-box-tab--sign-out"
               style="flex-grow: 1;flex-basis: 50%;">
                <i class="now-ui-icons media-1_button-power"></i>
                خروج از حساب
            </a>
        </div>
    </div>
    <?php if(session()->has('status')): ?>
        <div class="alert alert-dismissible fade show" style="background-color: rgba(212, 237, 218,0.7);color: #155724"
             role="alert">
            <strong>تغییر رمز عبور!</strong>
            <?php echo e(@session()->pull('status')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="responsive-profile-menu show-md">
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                <i class="fa fa-navicon"></i>
                حساب کاربری شما
            </button>
            <div class="dropdown-menu dropdown-menu-right text-right">
                <a href="profile.html" class="dropdown-item active-menu">
                    <i class="now-ui-icons users_single-02"></i>
                    پروفایل
                </a>
                <a href="profile-orders.html" class="dropdown-item">
                    <i class="now-ui-icons shopping_basket"></i>
                    همه سفارش ها
                </a>
                <a href="profile-orders-return.html" class="dropdown-item">
                    <i class="now-ui-icons files_single-copy-04"></i>
                    درخواست مرجوعی
                </a>
                <a href="profile-favorites.html" class="dropdown-item">
                    <i class="now-ui-icons ui-2_favourite-28"></i>
                    لیست علاقمندی ها
                </a>
                <a href="profile-personal-info.html" class="dropdown-item">
                    <i class="now-ui-icons business_badge"></i>
                    اطلاعات شخصی
                </a>
            </div>
        </div>
    </div>
    <div class="profile-menu hidden-md">
        <div class="profile-menu-header">حساب کاربری شما</div>
        <ul class="profile-menu-items">
            <li>
                <a href="<?php echo e(route('main.user.index')); ?>" class="active">
                    <i class="now-ui-icons users_single-02"></i>
                    پروفایل
                </a>
            </li>
            <li>
                <a style="cursor: pointer" data-toggle="modal" data-target="#editModal">
                    <i class="fa fa-edit"></i>
                    ویرایش اطلاعات
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('main.user.allorder')); ?>">
                    <i class="now-ui-icons shopping_basket"></i>
                    همه سفارش ها
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('main.user.return')); ?>">
                    <i class="now-ui-icons files_single-copy-04"></i>
                    درخواست مرجوعی
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('main.user.love')); ?>">
                    <i class="now-ui-icons ui-2_favourite-28"></i>
                    لیست علاقمندی ها
                </a>
            </li>


            <!-- Modal -->
            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog" id="editModalBorder">

                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius: 5px">
                        <form id="submitFormInfoUser" class="form-account"
                              data-url="<?php echo e(route('main.user.updateInfoUser')); ?>" method="POST"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            style="top: 4%;font-size: 40px;">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">ویرایش اطلاعات</h4>
                                </div>
                                <div style=" right: 30%; top: 30px;position: relative">
                                    <label for="imageUpload">
                                        <?php if(($user->avatar) != ""): ?>
                                            <img id="setImageUpload"
                                                 style="width:80px; height:80px;border-radius: 50%;"
                                                 src="<?php echo e($user->avatar); ?>" alt="avatar">
                                        <?php else: ?>
                                            <img id="setImageUpload"
                                                 style="width:80px; height:80px;border-radius: 50%;"
                                                 src="<?php echo e(asset('public/assets/img/svg/myavatar.png')); ?>" alt="avatar">
                                        <?php endif; ?>
                                        <input type="file" name="myavatar" accept=".png, .jpg, .jpeg, .svg"
                                               class="profile-box-btn-edit" id="imageUpload" style="display: none">
                                        <i class="fa fa-pencil"
                                           style="position: absolute;top: 0;right: 5%;border-radius: 50%;outline: none;"></i>
                                        <i id="deleteAvatarUser" class="fa fa-remove"
                                           style="position: absolute;top: -2%;font-size: 20px;color: #FF3636; left: 5%;border-radius: 50%;outline: none;"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-account-row">
                                    <div
                                            style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                        <div class="form-account-title">نام</div>
                                        <label id="firstname" class="input-label"></label>
                                        <input class="input-field <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                               type="text"
                                               name="firstname" value="<?php echo e($user->firstname); ?>"
                                               style="text-align: center">
                                        <?php if($errors->has('firstname')): ?>
                                            <span class="" role="alert">
                                        <strong class="text-danger"><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                    <div style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;">
                                        <div class="form-account-title">نام و نام خانوادگی</div>
                                        <label id="lastname" class="input-label"><i
                                                    class="now-ui-icons"></i></label>
                                        <input class="input-field <?php if ($errors->has('lastname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lastname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                               type="text"
                                               name="lastname" value="<?php echo e($user->lastname); ?>"
                                               style="text-align: center">
                                        <?php if($errors->has('lastname')): ?>
                                            <span class="" role="alert">
                                        <strong class="text-danger"><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-account-row">
                                    <div
                                            style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                        <div class="form-account-title">وب سایت</div>
                                        <label id="website" class="input-label"></label>
                                        <input class="input-field <?php if ($errors->has('website')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('website'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                               type="text"
                                               name="website" value="<?php echo e($user->website); ?>"
                                               style="text-align: center">
                                        <?php if($errors->has('website')): ?>
                                            <span class="" role="alert">
                                                <strong class="text-danger"><?php echo e($errors->first('website')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;">
                                        <div class="form-account-title">تاریخ تولد</div>
                                        <label id="birthday" class="input-label"><i
                                                    class="now-ui-icons"></i></label>
                                        <input class="input-field <?php if ($errors->has('birthday')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birthday'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                               type="text"
                                               name="birthday" value="<?php echo e($user->birthday); ?>" id="data-input"
                                               autocomplete="off"
                                               style="text-align: center">
                                        <?php if($errors->has('birthday')): ?>
                                            <span class="" role="alert">
                                                <strong class="text-danger"><?php echo e($errors->first('birthday')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="form-account-row1 form-account-submit col-5 col-md-5 col-lg-5"
                                     style="float: right">
                                    <div class="parent-btn">
                                        <button id="closeModal" type="button" class="dk-btn dk-btn-grey"
                                                data-dismiss="modal">
                                            بستن
                                            <i class="now-ui-icons ui-1_simple-remove" style="font-size: 14px;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-account-row1 form-account-submit col-7 col-md-7 col-lg-7"
                                     style="float: left">
                                    <div class="parent-btn">
                                        <button type="submit" class="dk-btn dk-btn-info">
                                            ارسال
                                            <i class="now-ui-icons users_circle-08" style="font-size: 14px;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </ul>
    </div>
</div>
<?php /**PATH D:\project\xampp\htdocs\khanehkala\resources\views/auth/base_panel.blade.php ENDPATH**/ ?>