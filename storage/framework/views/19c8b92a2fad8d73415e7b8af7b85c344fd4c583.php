<?php $__env->startSection('title'); ?>
    ایجاد صفحه جدید | پنل ادمین
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>

        * {
            outline: none;
            border: none;
        }

        div.swal2-container {
            z-index: 500000;
        }

        /*radio button css*/

        .groupRadio {
            height: 36px;
            width: 40%;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-items: stretch;
            border-radius: 5px;
            background-clip: border-box;
        }

        input[type="radio"],
        input[type="checkbox"] {
            /* hide the inputs */
            opacity: 0;
            display: none;
            margin: 0;
        }

        /* style your lables/button */
        input[type="radio"] + label,
        input[type="checkbox"] + label {
            line-height: 10px;
            /* keep pointer so that you get the little hand showing when you are on a button */
            cursor: pointer;
            /* the following are the styles */
            float: left;
            padding: 9px 21px;
            text-shadow: 0 -1px 0 rgba(0, 39, 82, 0.8), 0 0 0 hsla(208.12, 44.44%, 85.88%, 0);
            color: #ffffff;
            font-weight: bold;
            box-shadow: inset 0 1px 0 #cce5ff, 0 6px 10px -1px rgba(0, 39, 82, 0.6);
            background: -moz-linear-gradient(top, #00bfd6 0%, #00bfd6 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #00bfd6), color-stop(100%, #00bfd6)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #00bfd6 0%, #00bfd6 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, #00bfd6 0%, #00bfd6 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top, #00bfd6 0%, #00bfd6 100%); /* IE10+ */
            background: linear-gradient(to bottom, #00bfd6 0%, #00bfd6 100%); /* W3C */
        }

        input[type="radio"]:checked + label,
        input[type="checkbox"]:checked + label {
            /* style for the checked/selected state */
            text-shadow: 0 0 10px hsla(208.12, 44.44%, 85.88%, 1);
            color: rgb(0, 39, 82);
            box-shadow: inset 0 2px 3px #004085, inset 0 0 4px 4px rgba(0, 0, 0, 0.1);
            background: -moz-linear-gradient(top, #b8daff 0%, #CCE5FF 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #b8daff), color-stop(100%, #CCE5FF)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #b8daff 0%, #CCE5FF 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, #b8daff 0%, #CCE5FF 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top, #b8daff 0%, #CCE5FF 100%); /* IE10+ */
            background: linear-gradient(to bottom, #b8daff 0%, #CCE5FF 100%); /* W3C */
        }

        .groupRadio > label {
            border-radius: 2px;
        }

        @media  only screen and (max-width: 1300px) {
            .groupRadio {
                width: 65% !important;
            }

            .guideAddCol {
                width: 100% !important;
                margin-bottom: 1%;
            }
        }

        @media  only screen and (max-width: 868px) {
            .groupRadio {
                width: 75% !important;
            }

            .guideAddCol {
                width: 100% !important;
                margin-bottom: 1%;
            }
        }

        @media  only screen and (max-width: 600px) {
            .groupRadio {
                width: 85% !important;
            }

            .guideAddCol {
                width: 100% !important;
                margin-bottom: 1%;
            }

            .editCol {
                padding: 1% 1% !important;
            }

        }

        .guideAddCol {
            display: inline-block;
            width: 73%;
            line-height: 10px;
            /*clear: both !important;*/
        }

        /*end of radio button css*/

        .form-account-row .product-variants div#addRow:hover {
            border-bottom: 1px solid #cacaca;
            cursor: pointer;
        }


    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> ایجاد صفحه جدید </span>
                        <span class="info-box-number"><small></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-help"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">مستندات</span>
                        <span class="info-box-number"><button data-toggle="modal" data-target="#editModal"
                                                              class="btn btn-success">نمایش مستندات</button></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">تعداد صفحات</span>
                        <span class="info-box-number"><?php echo e(count(\App\Page::all())); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <!-- /.row -->


        <!-- /.row -->

        <div class="row">
            <div class="col-md-10">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">ایجاد صفحه</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="box box-primary">
                            <div class="box-header with-border">

                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <?php if(session()->has('insertPage')): ?>
                                <div class="alert" role="alert"
                                     style="background-color: #d4edda;margin-top: 1%;direction: rtl;">
                                        <span style="cursor: none;color: #155724"
                                              class="alert-link"><?php echo e(session()->pull('insertPage')); ?></span>
                                </div>
                            <?php endif; ?>
                            <form role="form" enctype="multipart/form-data" method="post"
                                  action="<?php echo e(route('admin.page.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">عنوان صفحه</label>
                                        <input name="title" type="text" class="form-control" id="title"
                                               placeholder="عنوان صفحه" value="<?php echo e(old('title')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="title2">عنوان دوم صفحه (اختیاری)</label>&nbsp;
                                        <input name="title2" type="text" class="form-control" id="title2"
                                               placeholder="عنوان دوم صفحه" value="<?php echo e(old('title2')); ?>">
                                    </div>

                                    <div class="form-account-row" style="margin-top: 4%">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">طراحی صفحه</label>


                                            <div class="box box-success">
                                                <div class="box-header">

                                                    <!-- tools box -->
                                                    <div class="pull-right box-tools">
                                                    </div>
                                                    <!-- /. tools -->
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body pad">
                                                    <textarea id="body" name="body" rows="10"
                                                              cols="80"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-account-row" style="margin-top: 4%">
                                        <label for="title2">انتخاب مکان در پایین صفحه‌ی اصلی:</label>&nbsp;
                                        <div class="guideAddCol">
                                            <div data-toggle="modal" data-target="#editModal"
                                                 style="cursor: pointer;color: #00bfd6 ;display: inline-block;float: right">
                                                راهنما
                                            </div>
                                            <div data-toggle="modal" data-target="#editModal2" class="get-all-col-row"
                                                 style="cursor: pointer;color: #00bfd6 ;display: inline-block;float: left"
                                                 data-url="<?php echo e(route('admin.page.getAllColRow')); ?>">
                                                مشاهده و ویرایش ترتیب سطرها و ستون‌ها
                                            </div>
                                        </div>


                                        <!-- Modal -->
                                        <div id="editModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog" id="editModalBorder">
                                                <!-- Modal content-->
                                                <div class="modal-content" style="border-radius: 5px">
                                                    <div class="modal-body">
                                                        <div class="form-account-row">
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal"
                                                                    style="position:relative;z-index: 2!important;top: 4%;font-size: 40px;">
                                                                &times;
                                                            </button>
                                                            <img style="width: 550px;height: auto;position:relative;
                                                                                                transform: translate(-1%,-7%);z-index: 0!important;"
                                                                 src="<?php echo e(asset('public/assets/img/about_bg.jpg')); ?>"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End OF Modal -->
                                        <div class="product-variants default"
                                             style="border-top: 2px solid #00a65a;min-height: 180px;padding: 3%!important;">
                                            <div class="groupRadio">
                                                <input id="RadioCol1" name="RadioCol" type="radio" value="1"
                                                       checked="checked">
                                                <label for="RadioCol1">ستون یک</label>
                                                <input id="RadioCol2" name="RadioCol" type="radio" value="2">
                                                <label class="center" for="RadioCol2">ستون دو</label>
                                                <input id="RadioCol3" name="RadioCol" type="radio" value="3">
                                                <label for="RadioCol3">ستون سه</label>
                                            </div>
                                            <div id="addRow" data-url="<?php echo e(url('admin/page/addRowInPage')); ?>"
                                                 data-tooltip-text="برای ایجاد سطر کلیک کنید:"
                                                 style="font-size: 25px;font-weight: bold;margin-top: 2%;line-height: 10px;">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">عکس اصلی صفحه</label>
                                    <input name="image" type="file" class="form-control"
                                           id="exampleInputEmail1">
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">افزودن</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="bower_components/ckeditor_4.13.0_full/ckeditor/ckeditor.js"></script>
    
    <script>

        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            var options = {
                language: 'fa',
            }
            // CKEDITOR.replace('body', {
            //     // removePlugins: 'cloudservices',
            //     extraPlugins : 'clipboard,notification,base64image  ',
            // });
            CKEDITOR.replace('body', {
                language: 'fa',
                filebrowserUploadUrl: '<?php echo e(route('admin.page.imageUpload')); ?>',
                filebrowserImageUploadUrl: '<?php echo e(route('admin.page.imageUpload')); ?>',
                filebrowserUploadMethod: 'form',
                // customConfig: 'config.js',
                uiColor: '#E0F4EB',
                // removePlugins: 'cloudservices',
                // extraPlugins: 'imageuploader'
                // filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
                // filebrowserUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Files',
                // filebrowserImageUploadUrl: '/apps/ckfinder/3.4.5/core/connector/php/connector.php?command=QuickUpload&type=Images',
                
                // filebrowserUploadMethod: 'form'
                // extraPlugins : 'syntaxhighlight',
                // toolbar: [
                //     {items: ['Templates', 'clipboard', 'Cut', 'Paste', 'Redo', 'Undo', 'Find', '-', 'basicstyles', 'cleanup', 'Link', 'Unlink', 'Iframe', 'Anchor', 'Image', 'Smiley', 'Flash', 'Table', 'SpecialChar', 'Syntaxhighlight', 'HorizontalRule', 'PageBreak', 'ShowBlocks', '-', 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'Blockquote', 'Maximize', 'Preview']},
                //     {items: ['Format', 'Font', 'FontSize', '-', 'Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript', '-', 'NumberedList', 'BulletedList', 'Indent', 'Outdent', '-', 'JustifyBlock', 'JustifyRight', 'JustifyCenter', 'JustifyLeft', 'BidiRtl', 'BidiLtr', 'TextColor', 'BGColor', 'Source']}
                // ],
            });
        });

        $(document).ready(function () {

            $('input[type=radio][name=RadioCol]').change(function () {
                $('#addRowNew').hide().remove().fadeOut(500);
            });

            $('#addRow').on('click', function (e) {
                e.preventDefault();
                let url_ = $(this).attr('data-url');
                let dataSubmitted = $('input[name=RadioCol]:checked').val();
                var url = url_ + '/' + dataSubmitted;
                // console.log(dataSubmitted, url);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (data) {
                        // console.table(data);
                        $('#addRowNew').remove();
                        $('#addRow').after('<div id="addRowNew" class="groupRadio" style="width: 20%;margin-top: 1%;">\n' +
                            '    <input id="checkboxRow' + data.number + '" name="checkboxRow" type="checkbox" value="' + data.number + '"\n' +
                            '           checked="checked">\n' +
                            '    <label for="checkboxRow' + data.number + '">سطر ' + data.numberWord + '</label>\n' +
                            '</div>');
                        $('#addRowNew').hide().fadeIn(500);
                    }, error: function (error) {
                        console.log('ERROR 1');
                    }
                });
            });     //  end of addRow id


            /*all col row page*/

            $('#all-cols-rows').on('click', '.addSubtract[data-id]', function (e) {
                e.preventDefault();
                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });

            $('#all-cols-rows').on('focusin', '.input-number[name]', function () {
                $(this).data('oldValue', $(this).val());
                let name = $(this).attr('name');
                console.log(name);
            });

            $('#all-cols-rows').on('change', '.input-number[name]', function () {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                let name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    Swal.fire('به کمترین مقدار رسیده اید!');
                    $(this).val($(this).data('oldValue'));
                }
                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    Swal.fire('به بیشترین مقدار رسیده اید!');
                    $(this).val($(this).data('oldValue'));
                }


            });

            $("#all-cols-rows").on('click', '.btn-number[data-type="bin"]', function (e) {
                // این پیج باید حذف گردد و پیج های جدید، دوباره از همین ایجکس ریترن شوند

                let titlePage = $(this).attr('data-page');
                let url_ = $(this).attr('data-url');
                let col = $(this).attr('data-col');
                let row = $(this).attr('data-row');

                let urlMe = url_ + '/' + titlePage + '/' + col + '/' + row;

                console.log(col, row, titlePage, urlMe);

                $.ajax({
                    type: "GET",
                    url: urlMe,
                    success: function (data) {
                        // console.table(data);
                        let cols = [data['col11'], data['col22'], data['col33']];
                        createViewAllRowAndColOfPages(cols);
                    }, error: function (error) {
                        console.log('ERROR 1');
                    }
                });
            });

            $("#all-cols-rows").on('click', '.btn-number[data-type="save"]', function (e) {

                let titlePage = $(this).attr('data-page');
                let url_ = $(this).attr('data-url');
                let col = $(this).attr('data-col');
                let row = $(this).attr('data-row');

                let row_id_new_in_input = $(this).attr('data-inputRowNew');
                let row_new = $('#' + row_id_new_in_input).val();

                let col_id_new_in_input = $(this).attr('data-inputColNew');
                let col_new = $('#' + col_id_new_in_input).val();

                let urlMe = url_ + '/' + titlePage + '/' + col + '/' + row + '/' + col_new + '/' + row_new;

                console.log(col, row, row, titlePage, col_new);

                if (row == row_new && col == col_new) {
                    Swal.fire('مقدار سطر یا ستون را، تغییر بدهید!');
                    return;
                }

                if (col_new > 3) {
                    Swal.fire('حداکثر مقدار ستون، 3 می‌تواند باشد!');
                    $('#' + col_id_new_in_input).val(col);  //  قرار گرفتن مقدار قبلی در input مربوط به ستون
                    return;
                }

                $.ajax({
                    type: "GET",
                    url: urlMe,
                    success: function (data) {
                        // console.table(data);
                        let cols = [data['col11'], data['col22'], data['col33']];
                        let elementNewIdAlert = data['elementNewIdAlert'];
                        let elementOldIdAlert = data['elementOldIdAlert'];

                        createViewAllRowAndColOfPages(cols);

                        if (data['errRow'] == true) {
                            Swal.fire('مقدار سطر وارد شده، اشتباه می باشد!');
                            return;
                        }

                        if (data['exceedsLimitRow'] == true) {
                            Swal.fire('حداکثر مقدار سطر، ' + data['numberOfMaxRow'] + ' می‌تواند باشد!');
                            return;
                        }

                        $('#' + elementNewIdAlert).css({
                            'color': '#00a65a',
                            'font-weight': 'bolder',
                        });
                        $('#' + elementOldIdAlert).css({
                            'color': '#808080c7',
                            'font-weight': 'bolder',
                        });


                    }, error: function (error) {
                        console.log('ERROR 1');
                    }
                });
            });

            /*end of all col row page*/

        });                 //  end of ajax
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\max\resources\views/admin/page/create.blade.php ENDPATH**/ ?>