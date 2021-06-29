<?php $__env->startSection('title'); ?>
    کاربران
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                پروفایل کاربری
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li><a href="#">مثال ها</a></li>
                <li class="active"> پروفایل</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="dist/img/avatar.png"
                                 alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo e($user->fullName); ?></h3>


                            <?php
                            if (isset($_GET['active'])){
                                if ($user->active==1)
                                {
                                    $user->active=0;
                                    $user->save();
                                }
                                else{

                                    $user->active=1;
                                    $user->save();

                                }
                            }


                            ?>
                            <a href="<?php echo e(route('admin.users.showuser',['user'=>$user->id])); ?>?active=1" class="btn btn-primary btn-block"><b>
                                    <?php if($user->active==1): ?>
                                        غیر فعال کردن
                                    <?php else: ?>
                                        فعال کردن
                                    <?php endif; ?>
                                </b></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">درباره من</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> تحصیلات</strong>

                            <p class="text-muted">
                                وارد نشده است
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> موقعیت</strong>

                            <p class="text-muted">ایران، </p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> توانایی ها</strong>

                            <p>
                                <span class="label label-danger">خالی </span>

                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> یادداشت</strong>

                            <p>یادداشتی نیست</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab">فعالیت ها</a></li>
                            <li><a href="#timeline" data-toggle="tab">تایم لاین</a></li>
                            <li><a href="#settings" data-toggle="tab">تنظیمات</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <table class="table table-hover">
                                    <tbody id="body_val">


                                    <?php $__empty_1 = true; $__currentLoopData = \App\Order::query()->where('id_user','=',$user->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($order->id); ?></td>
                                            <td><?php echo e(\App\User::query()->find($order->id_user)->firstname); ?>.<?php echo e((new \App\PublicModel())->short_string(\App\User::query()->find($order->id_user)->lastname)); ?></td>
                                            <td><?php echo e($order->price); ?></td>
                                            <td>
                                                <?php echo (new \App\OrderModul($order))->state(); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('admin.order.show',['id'=>$order->id])); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="alert alert-danger">
                                            کاربر هنوز خریدی انجام نداده است
                                        </div>
                                    <?php endif; ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                      <span class="bg-red">
                        ۱۲ اردیبهشت ۱۳۹۴
                      </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">تیم پشتیبانی</a> یک ایمیل برای شما ارسال کرد</h3>

                                            <div class="timeline-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                                                مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">ادامه</a>
                                                <a class="btn btn-danger btn-xs">حذف</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-user bg-aqua"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 5 دقیقه پیش</span>

                                            <h3 class="timeline-header no-border"><a href="#">سارا</a> درخواست دوستی شما را قبول کرد</h3>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-comments bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 27 دقیقه پیش</span>

                                            <h3 class="timeline-header"><a href="#">جواد</a> در پست شما نظر گذاشت</h3>

                                            <div class="timeline-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-warning btn-flat btn-xs">نمایش نظر</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <li class="time-label">
                      <span class="bg-green">
                        ۱۲ خرداد ۱۳۹۴
                      </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 روز پیش</span>

                                            <h3 class="timeline-header"><a href="#">مینا</a> تصویر آپلود کرد</h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">نام</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="نام">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">ایمیل</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="ایمیل">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">نام خانوادگی</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="نام خانوادگی">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">ویژگی ها</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="ویژگی ها"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">توانایی ها</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="توانایی ها">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> من <a href="#">قوانین و شرایط</a> را قبول میکنم.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>