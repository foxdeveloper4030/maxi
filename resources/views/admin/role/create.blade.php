@extends('admin.layouts.main')
@section('title')
    افزودن مسئولیت‌ها به نقش‌ها | پنل ادمین
@endsection

@section('css')
    <link rel="stylesheet" href="{!! asset('public/admin/plugins/select2.min.css') !!}">
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

        @media only screen and (max-width: 1300px) {
            .groupRadio {
                width: 65% !important;
            }

            .guideAddCol {
                width: 100% !important;
                margin-bottom: 1%;
            }
        }

        @media only screen and (max-width: 868px) {
            .groupRadio {
                width: 75% !important;
            }

            .guideAddCol {
                width: 100% !important;
                margin-bottom: 1%;
            }
        }

        @media only screen and (max-width: 600px) {
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

        @keyframes ripple {
            100% {
                opacity: 0;
                -webkit-transform: scale(2.5);
                transform: scale(2.5);
            }
        }

        /*end of image upload*/

        /*search select2*/
        .select2 {
            width: 100% !important;
        }

        .select2-selection {
            height: 100% !important;
        }

        .select2-results__options {
            height: 300px;
            overflow-y: auto;
        }

        .big-drop-role {
            color: #1a2226 !important;
            border-top: 1px solid #3c8dbc !important;
            border-right: 1px solid #3c8dbc !important;
            border-left: 1px solid #3c8dbc !important;
            border-bottom: 1px solid #3c8dbc !important;
            text-align: right;
        }

        .big-drop-permission {
            width: 600px !important;
            color: #1a2226 !important;
            border-right: 1px solid #3c8dbc !important;
            border-left: 1px solid #3c8dbc !important;
            border-bottom: 1px solid #3c8dbc !important;
            text-align: right;
        }

        .select2-selection__clear {
            float: left!important;
        }

        .select2-selection__clear:hover {
            transition: all 300ms ease;
            color: darkred;
        }
        .select2-selection__choice {
            color: #222d32!important;
        }
        /*end of search select2*/
    </style>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> افزودن مسئولیت‌ها به نقش‌ها </span>
                        <span class="info-box-number"><small></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">تعداد نقش‌ها</span>
                        <span class="info-box-number">{{count(\App\Role::all())}}</span>
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
                        <span class="info-box-text">تعداد مسئولیت‌ها</span>
                        <span class="info-box-number">{{count(\App\Permission::all())}}</span>
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
                        <ul style="padding:1%;"></ul>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">افزودن مسئولیت‌ها به نقش‌ها</h3>

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
                            <form role="form" method="post"
                                  id="formSaveRolePermission" data-url="{{route('admin.roles.permission.store')}}">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="role">نقش‌ها (اگر نقش مورد نظر را، اینجا نیافتید، لطفا به قسمت نقش‌ها رجوع نموده و آنجا ویرایش نمایید:)</label>
                                        <select id="role" title="نقش‌ها" name="role"
                                                style="width: 100%!important;height: 100%!important;"
                                                class="col-md-10 form-control search-field" dir="ltr">
                                            <option value="" selected>انتخاب نقش</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="permission">مسئولیت‌ها</label>
                                        <select id="permission" multiple
                                                style="width: 100%!important;height: 100%!important;"
                                                class="col-md-10 form-control search-field" dir="ltr" title="مسئولیت‌ها"
                                                name="permission[]">
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission->id}}">{{$permission->permission}} / {{$permission->label}}</option>
                                            @endforeach
                                        </select>
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
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{!! asset('public/admin/plugins/select2.full.min.js') !!}"></script>
    <script>
        $('#role').select2({
            // minimumInputLength: 3,
            dir: 'RTL',
            allowClear: true,
            // theme: "bootstrap",
            dropdownCssClass: "big-drop-role",
            placeholder: 'نقش مورد نظر خود را انتخاب نمایید...',
            language: {
                searching: function() {
                    return "در حال جستجو ...";
                },
                "noResults": function(){
                    return "نقشی با این عنوان پیدا نشد...";
                }
            },

        });     //  end of select2
        $('#permission').select2({
            // minimumInputLength: 3,
            dir: 'RTL',
            dropdownCssClass: "big-drop-permission",
            allowClear: true,
            placeholder: 'تعدادی از مسئولیت‌ها را انتخاب نمایید...',
            language: {
                "searching": function() {
                    return "در حال جستجو ...";
                },
                "noResults": function(){
                    return "مسئولیتی با این عنوان پیدا نشد...";
                }
            },
        });     //  end of select2


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

            $('#formSaveRolePermission').on('submit', function (e) {
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
                        $('#formSaveRolePermission').find('input').val("");
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

@endsection
