<?php $__env->startSection('title'); ?>
    کاربران حاوی نقش
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <style>
        #body_val tr td {
            line-height: 27px;
        }

        /*tooltip*/
        [data-tooltip-text]:hover {
            transition: all 500ms ease;
            position: relative;
        }

        [data-tooltip-text]:hover:after {
            background-color: rgba(192, 230, 236, 0.6);
            width: auto;
            min-width: 100px;
            max-width: 300px;
            word-wrap: break-word;
            -webkit-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            -moz-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            color: #515151;
            font-size: 12px;
            content: attr(data-tooltip-text);
            margin-bottom: 5px;
            top: 10%;
            right: -55%;
            padding: 5px 12px;
            position: absolute;
            z-index: 9999;
        }

        div.swal2-container {
            z-index: 500000;
        }

        /*end of tooltip*/
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">همه کاربرانی که نقش گرفتند</h3>
                        <img id="loading" style="display: none" src="<?php echo e(url('public')); ?>/loading.gif">...
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">


                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="margin-top: 1%">

                        <table class="table table-hover table-striped table-hover">
                            <tbody id="body_val">

                            <?php ($counter=1); ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr style="text-align: center;border-top: 2px solid #0b2e13" id="brand<?php echo e($user->id); ?>">
                                    <td><?php echo e($counter); ?></td>
                                    <td><?php echo e($user->fullName); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('LevelManages.edit',$user->id)); ?>" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i></a>
                                        <a href="<?php echo e(route('LevelManages.destroy',$user->id)); ?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <tr>
                                    <?php if($user->roles->count() > 0): ?>
                                        <td colspan="4">
                                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span style="display: inline-block;background-color: #222d32;color: #b8c7ce;padding-right: 1%;padding-left: 1%">
                                                    <?php echo e($ur->role); ?> / <?php echo e($ur->label); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    <?php else: ?>
                                        <td colspan="4">در حال حاضر، کاربر شماره <?php echo e($counter); ?> هیچ نقشی، ندارد.</td>
                                    <?php endif; ?>
                                </tr>
                                <?php ($counter++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $(document).ready(function () {

        });         //  end of jquery
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/userManage/index.blade.php ENDPATH**/ ?>