
<?php $__env->startSection('title'); ?>
    ایجاد برند جدید | پنل ادمین
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

        /*for tooltip*/


        /* Add this attribute to the element that needs a tooltip */
        [data-tooltip] {
            position: relative;
            z-index: 2;
            cursor: pointer;
        }

        /* Hide the tooltip content by default */
        [data-tooltip]:before,
        [data-tooltip]:after {
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
        }

        /* Position tooltip above the element */
        [data-tooltip]:before {
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-bottom: 5px;
            margin-left: -80px;
            padding: 7px;
            width: 160px;
            border-radius: 3px;
            background-color: rgba(192, 230, 236, 0.6);
            color: #071380;
            content: attr(data-tooltip);
            text-align: center;
            font-size: 14px;
            line-height: 1.2;
        }

        /* Triangle */
        [data-tooltip]:after {
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-left: -5px;
            width: 0;
            border-top: 5px solid rgba(0, 0, 0, 0.5);
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
            content: '';
            font-size: 0;
            line-height: 0;
        }

        /* Show tooltip content on hover */
        [data-tooltip]:hover:before,
        [data-tooltip]:hover:after {
            visibility: visible;
            opacity: 1;
        }


        [data-tooltip-text]:hover {
            transition: all 500ms ease;
            position: relative;
        }

        [data-tooltip-text]:hover:after {
            background-color: rgba(192, 230, 236, 0.6);
            width: auto;
            min-width: 150px;
            max-width: 300px;
            word-wrap: break-word;
            -webkit-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            -moz-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);


            color: #515151;
            font-size: 12px;
            content: attr(data-tooltip-text);

            margin-bottom: 5px;
            top: 130%;
            left: 0;
            padding: 5px 12px;
            position: absolute;

            z-index: 9999;
        }


        /*end of tooltip*/

        /*all col row page*/

        #all-cols-rows {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-items: stretch;
            text-align: center !important;
        }

        .editCol {
            flex-basis: 30%;
            border: 2px solid #37bbd0;
            border-radius: 5px;
            text-align: center !important;
            padding: 1% 4%;

            /*=======*/
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: center;
        }

        .colEditRow {
            /*flex-basis: 28%;*/
            padding: 5% 5%;
            margin-top: 4%;
            margin-bottom: 7%;
            border-radius: 5px;
            background-color: #d1ecf1;
            border: 1px dashed #7d93a5;
        }

        .editCol > div:first-child {
            padding: 5% 25%;
            margin-bottom: 7%;
            background-color: #00bfd6;
            border-radius: 5px;
            color: #ffffff;
        }

        /*===========================================*/

        .input-group {
            width: 50%;
            margin: 0 auto;
            border-radius: 0 !important;
        }

        .top-group {
            border-radius: 0 !important;
        }

        .bottom-group {
            margin-top: -1px;
            border-radius: 0 !important;
        }

        /*[data-type="minus"] {
          border: 1px solid #ccc;
        }*/

        [data-type="save"] {
            /*min-width: 70px;    */
            border-radius: 0 !important;
        }

        .input-number {
            width: 50px !important;
            height: 30px !important;
            text-align: center;
            text-shadow: none;
            border-radius: 0 !important;
        }

        .btn-number {
            width: 40px !important;
            height: 30px !important;
            border-radius: 0 !important;
            text-align: center !important;
        }

        /*end of all col row page*/


        /*image upload*/
        .wrapper-image {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .box-image {
            display: block;
            min-width: 300px;
            height: 300px;
            margin: 10px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            overflow: hidden;
        }

        .upload-options-image {
            position: relative;
            height: 75px;
            background-color: #00a65a;
            cursor: pointer;
            overflow: hidden;
            text-align: center;
            transition: background-color ease-in-out 150ms;
        }

        .upload-options-image:hover {
            background-color: #7fb1b3;
        }

        .upload-options-image input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload-options-image label {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
            font-weight: 400;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
            overflow: hidden;
        }

        .upload-options-image label::after {
            content: 'انتخاب';
            position: absolute;
            font-size: 2.5rem;
            color: #ffffff;
            top: calc(50% - 1.75rem);
            left: calc(50% - 3.5rem);
            z-index: 0;
        }

        .upload-options-image label span {
            display: inline-block;
            width: 50%;
            height: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: middle;
            text-align: center;
        }

        .upload-options-image label span:hover i.material-icons {
            color: lightgray;
        }

        .js--image-preview {
            height: 225px;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-image: url("");
            background-color: white;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .js--image-preview::after {
            position: relative;
            font-size: 4.5em;
            color: #e6e6e6;
            top: calc(50% - 3rem);
            left: calc(50% - 2.25rem);
            z-index: 0;
        }

        .js--image-preview.js--no-default::after {
            display: none;
        }

        i.material-icons {
            transition: color 100ms ease-in-out;
            font-size: 2.25em;
            line-height: 55px;
            color: white;
            display: block;
        }

        .drop-image {
            display: block;
            position: absolute;
            background: rgba(95, 158, 160, 0.2);
            border-radius: 100%;
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        .animate-image {
            -webkit-animation: ripple 0.4s linear;
            animation: ripple 0.4s linear;
        }

        @-webkit-keyframes ripple {
            100% {
                opacity: 0;
                -webkit-transform: scale(2.5);
                transform: scale(2.5);
            }
        }

        @keyframes  ripple {
            100% {
                opacity: 0;
                -webkit-transform: scale(2.5);
                transform: scale(2.5);
            }
        }

        /*end of image upload*/

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
                        <span class="info-box-text"> ایجاد برند جدید </span>
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
                        <span class="info-box-text">تعداد برندها</span>
                        <span class="info-box-number"><?php echo e(count(\App\Brand::all())); ?></span>
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
                    <div class="print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">ایجاد برند</h3>

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
                            <form role="form" enctype="multipart/form-data" method="post"
                                  id="formSaveBrand" data-url="<?php echo e(route('admin.brand.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">نام برند</label>
                                        <input name="title" type="text" class="form-control" id="title"
                                               placeholder="نام برند">
                                    </div>
                                    <div class="form-group">
                                        <label for="siteUrl">آدرس وبسایت مربوطه</label>&nbsp;
                                        <input name="siteUrl" type="text" class="form-control" id="siteUrl"
                                               placeholder="آدرس وبسایت مربوطه">
                                    </div>
                                    <div class="form-group">
                                        <label for="imgUrl">انتخاب عکس برند</label>
                                        <div class="wrapper-image">
                                            <div class="box-image">
                                                <div class="js--image-preview"></div>
                                                <div class="upload-options-image">
                                                    <label>
                                                        <input name="imgUrl" type="file" class="image-upload-image"
                                                               accept="image/*"/>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">افزودن</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.row -->
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
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!--<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
    <!-- TinyMCE Editor -->
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            // CKEDITOR.replace('editor1',{
            //     customConfig:'config.js',
            //     toolbar:'simple'
            // });
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })

        // image upload

        function initImageUpload(box) {
            let uploadField = box.querySelector('.image-upload-image');

            uploadField.addEventListener('change', getFile);

            function getFile(e) {
                let file = e.currentTarget.files[0];
                checkType(file);
            }

            function previewImage(file) {
                let thumb = box.querySelector('.js--image-preview'),
                    reader = new FileReader();

                reader.onload = function () {
                    thumb.style.backgroundImage = 'url(' + reader.result + ')';
                }
                reader.readAsDataURL(file);
                thumb.className += ' js--no-default';
            }

            function checkType(file) {
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    throw 'Datei ist kein Bild';
                } else if (!file) {
                    throw 'Kein Bild gewählt';
                } else {
                    previewImage(file);
                }
            }

        }

        // initialize box-scope
        var boxes = document.querySelectorAll('.box-image');

        for (let i = 0; i < boxes.length; i++) {
            let box = boxes[i];
            initDropEffect(box);
            initImageUpload(box);
        }

        /// drop-effect
        function initDropEffect(box) {
            let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

            // get clickable area for drop effect
            area = box.querySelector('.js--image-preview');
            area.addEventListener('click', fireRipple);

            function fireRipple(e) {
                area = e.currentTarget
                // create drop
                if (!drop) {
                    drop = document.createElement('span');
                    drop.className = 'drop-image';
                    this.appendChild(drop);
                }
                // reset animate class
                drop.className = 'drop-image';

                // calculate dimensions of area (longest side)
                areaWidth = getComputedStyle(this, null).getPropertyValue("width");
                areaHeight = getComputedStyle(this, null).getPropertyValue("height");
                maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

                // set drop dimensions to fill area
                drop.style.width = maxDistance + 'px';
                drop.style.height = maxDistance + 'px';

                // calculate dimensions of drop
                dropWidth = getComputedStyle(this, null).getPropertyValue("width");
                dropHeight = getComputedStyle(this, null).getPropertyValue("height");

                // calculate relative coordinates of click
                // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
                x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
                y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

                // position drop and animate
                drop.style.top = y + 'px';
                drop.style.left = x + 'px';
                drop.className += ' animate';
                e.stopPropagation();

            }
        }

        // end of image upload

        $(document).ready(function () {

            $('#formSaveBrand').on('submit', function (e) {
                e.preventDefault();
                let url_ = $(this).attr('data-url');
                let formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: url_,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        console.table(data);
                        $('#formSaveBrand').find('input').val("");
                        $('.js--image-preview').css('background-image', '');
                        if (data['status']) {
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
                    }, error: function (error) {
                    }
                })
            });  // end of delete image


        });                 //  end of ajax
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotjpg/public_html/sup/khanehkala/resources/views/admin/brand/create.blade.php ENDPATH**/ ?>