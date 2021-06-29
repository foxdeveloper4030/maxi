
<?php $__env->startSection('title'); ?>
    صفحات
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
                        <h3 class="box-title">همه برندهای ایجاد شده</h3>
                        <img id="loading" style="display: none" src="<?php echo e(url('public')); ?>/loading.gif">...
                        <div class="box-tools">

                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="جستجو">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="margin-top: 1%">

                        <table class="table table-hover">
                            <tbody id="body_val">

                            <?php ($counter=1); ?>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="text-align: center" id="brand<?php echo e($brand->id); ?>">
                                    <td><?php echo e($counter); ?></td>
                                    <td><?php echo e($brand->title); ?></td>
                                    <td><?php echo e(\Illuminate\Support\Str::limit($brand->siteUrl,90)); ?></td>
                                    <td style="color: #001900;font-weight: bold;"><?php echo e(\Illuminate\Support\Str::limit($brand->alt,20)); ?></td>
                                    <?php if($brand->imgUrl): ?>
                                        <td data-toggle="modal" data-target="#brandeditModal<?php echo e($brand->id); ?>"
                                            style="cursor: pointer;color: #3c8dbc"><a class="btn btn-sm btn-primary"><i
                                                    class="fa fa-eye"></i></a></i>


                                        </td>
                                        <!-- Modal -->
                                        <div id="brandeditModal<?php echo e($brand->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog" id="brandeditModalBorder">
                                                <!-- Modal content-->
                                                <div class="modal-content" style="border-radius: 5px">
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-account-row">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    style="position:relative;z-index: 2!important;top: 4%;font-size: 40px;">
                                                                &times;
                                                            </button>
                                                            <img style="width: 400px;height: auto;position:relative;
                                                            transform:  translate(-15%,0%);;z-index: 0!important;"
                                                                 src="<?php echo e(asset($brand->imgUrl)); ?>"
                                                                 alt="<?php echo e($brand->title); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End OF Modal -->
                                    <?php else: ?>
                                        <td data-tooltip-text="فاقد تصویر"><a class="btn btn-sm btn-warning"><i
                                                    class="fa fa-eye-slash"></i></a></td>
                                    <?php endif; ?>
                                    <td class="deleteCompleteBrand" data-id="<?php echo e($brand->id); ?>"
                                        data-url="<?php echo e(route('admin.brand.delete',$brand->id)); ?>">
                                        <a class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i></a></td>
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

        function ajax_id(id) {

            $(document).ready(function () {
                document.getElementById('loading').style.display = 'block';
                $.get("<?php echo e(url('')); ?>/admin/product/ajax/" + id, function (data, status) {

                    document.getElementById('body_val').innerHTML = data;
                    document.getElementById('loading').style.display = 'none';
                });

            });
        }

        

        
        
        

        
        
        

        
        

        $(document).ready(function () {
            // $('#id_name').onchange(alert(11));

            $('#body_val').on('click', '.deleteCompleteBrand[data-id]', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        // console.log(data['messageDelete']);

                        $('#brand' + data['idDelete']).remove();
                        $('.messageDelete').remove();
                        $('.box-body').parent().append('' +
                            '<div  class="alert messageDelete" role="alert" style="background-color: #d4edda;margin-top: 1%;">\n' +
                            '    <span  style="cursor: none;color: #155724" class="alert-link">' + data['messageDelete'] + '.</span >\n' +
                            '</div>');

                        // $('#completeCarts' + data.id + '').fadeOut(300, function () {
                        //     $(this).remove();
                        // });
                        //
                        // $('#countCart').text(data.totalNumberCart);
                        // $("span#cost").fadeOut(200, function () {
                        //     $(this).text(data.totalPriceCart).fadeIn();
                        // });
                        // $("#totalPriceOfProducts").fadeOut(200, function () {
                        //     $(this).text(data.totalPriceCart + 'تومان').fadeIn();
                        // });
                        // swal("موفق", "با موفقیت ثبت گردید", "success");

                    }, error: function (error) {
                        console.log('ERROR');
                        // swal("", "همه موارد را تکمیل نمایید.", "info");
                    }
                })  //  end of AJAX
            })

        });         //  end of jquery


        var attributes = [];

        // function select_attr(checkbox, id) {
        //     var arr = [];
        //     var exist = false;
        //     if (checkbox.checked) {
        //         for (var i = 0; i < attributes.length; i++) {
        //             if (id == attributes[i])
        //                 exist = true;
        //             else arr.push(attributes[i]);
        //         }
        //         if (!exist) {
        //             arr.push(id);
        //         }
        //     } else {
        //         for (var i = 0; i < attributes.length; i++) {
        //             var ex = -1;
        //             if (id != attributes[i])
        //                 arr.push(attributes[i]);
        //         }
        //
        //     }
        //     attributes = arr;
        //
        //     document.getElementById('attrs_id').value = attributes.toString();
        //     if (attributes.length > 0)
        //         document.getElementById('sub').style.display = 'block';
        //     else
        //         document.getElementById('sub').style.display = 'none';
        // }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/admin/brand/index.blade.php ENDPATH**/ ?>