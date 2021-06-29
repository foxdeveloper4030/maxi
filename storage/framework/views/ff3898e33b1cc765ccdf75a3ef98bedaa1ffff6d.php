<?php $__env->startSection('title'); ?>
    نقش‌ها
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
                        <h3 class="box-title">همه نقش‌های ایجاد شده</h3>
                        <img id="loading" style="display: none" src="<?php echo e(url('public')); ?>/loading.gif">...
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <span style="display: inline-block;margin-top: 3%;">افزودن نقش</span>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default" data-toggle="modal"
                                            data-target="#insertRole">
                                        <i class="fa fa-plus-square"></i>
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div id="insertRole" class="modal fade" role="dialog">
                                    <div class="modal-dialog" id="editModalBorder">
                                        <!-- Modal content-->
                                        <form action="<?php echo e(route('roles.store')); ?>" id="insertRoleForm"
                                              method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="modal-content" style="border-radius: 5px">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                    <h5 class="modal-title">افزودن نقش</h5>
                                                </div>
                                                <div class="modal-body" id="modal-body-all-col-row"
                                                     style="height: 90%">
                                                    <div class="print-error-msg" style="display:none">
                                                        <ul style="padding-right: 0">
                                                        </ul>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="input-group" style="width: 95%!important;">
                                                            <div class="input-group-addon"
                                                                 style="width: 21%!important;">عنوان نقش
                                                            </div>
                                                            <input name="role" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="input-group" style="width: 95%!important;">
                                                            <div class="input-group-addon"
                                                                 style="width: 20%!important;">توضیحات کوتاه
                                                            </div>
                                                            <input name="label" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="text-align: center">
                                                    <input type="submit" value="ذخیره" class="btn btn-app"
                                                           style="width: 100%; background-color: rgba(13,185,239,0.8)">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="margin-top: 1%">

                        <table class="table table-hover table-striped table-hover">
                            <tbody id="body_val">

                            <?php ($counter=1); ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr style="text-align: center;border-top: 2px solid #0b2e13" id="brand<?php echo e($role->id); ?>">
                                    <td><?php echo e($counter); ?></td>
                                    <td><?php echo e($role->role); ?></td>
                                    <td><?php echo e(\Illuminate\Support\Str::limit($role->label,90)); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('roles.edit',$role->id)); ?>" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i></a>
                                        <a href="<?php echo e(route('roles.destroy',$role->id)); ?>" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <tr>
                                    <?php if($role->permissions->count() > 0): ?>
                                        <td colspan="4">
                                            <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span style="display: inline-block;background-color: #222d32;color: #b8c7ce;padding-right: 1%;padding-left: 1%">
                                                    <?php echo e($rp->permission); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    <?php else: ?>
                                        <td colspan="4">در حال حاضر، نقش شماره <?php echo e($counter); ?> هیچ مسئولیتی، ندارد.</td>
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
            $("#insertRoleForm").on('submit', function (e) {
                e.preventDefault();
                let url = $(this).attr('action');
                var formData = new FormData(this);
                // console.log('hi');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#insertRoleForm').find('input[type=text]').val('');

                        if (data['status']) {
                            $('#body_val').append('' +
                                '<tr style="text-align: center" id="brand"' + data.roleId + '>\n' +
                                '    <td>' + data.roleCounter + '</td>\n' +
                                '    <td>' + data.roleName + '</td>\n' +
                                '    <td>' + data.roleLabel + '</td>\n' +
                                '    <td>\n' +
                                '        <a href="' + data.roleDeleteUrl + '" class="btn btn-sm btn-danger">\n' +
                                '            <i class="fa fa-trash-o"></i></a></td>\n' +
                                '</tr>');

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data['status'],
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else if (data['errors']) { //  Error
                            console.log('salam');
                            $('.print-error-msg').find('ul').html('');
                            $('.print-error-msg').css('display', 'block');
                            $.each(data['errors'], function (key, value) {
                                $('.print-error-msg').find('ul').append('' +
                                    '<div class="alert" role="alert" style="background-color: #f8d7da;margin-top: 1%;direction: rtl;">\n' +
                                    '    <span  style="cursor: none;color: #721c24" class="alert-link">' + value + '.</span >\n' +
                                    '</div>');
                            });
                        }
                    },
                    error: function (error) {
                        alert(data.status);
                        //swal("", "لطفا قیمت را به درستی وارد نمایید.", "error");
                    }
                });
            });             //  end of ajax submit
        });         //  end of jquery


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/admin/role/index.blade.php ENDPATH**/ ?>