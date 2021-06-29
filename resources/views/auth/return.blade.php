@extends('layouts.app')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    پنل کاربری
@endsection

@section('css')
    <link href="{{asset('public/assets/css/plugins/kamadatepicker.css')}}" rel="stylesheet"/>

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
    </style>
@endsection

@section('content')
    <?php $user = \Illuminate\Support\Facades\Auth::user(); ?>
    <!-- main -->
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">

                    <div class="row">
                        <div class="col-12">
                            <h1 class="title-tab-content"> درخواست مرجوعی</h1>
                        </div>
                        <div class="col-12 text-center">
                            <div class="content-section pt-5 pb-5">
                                <div class="icon-empty">
                                    <i class="now-ui-icons travel_info"></i>
                                </div>
                                <h1 class="text-empty">هنوز سفارشی ثبت نشد!</h1>
                            </div>
                        </div>
                    </div>
                </div>
                @include('auth.base_panel')
            </div>
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                @if(isset($alert))
                                    <div class="alert alert-danger">
                                        {{$alert}}
                                    </div>
                                @endif
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
                                                <div class="profile-return-request-form-button profile-return-request-form-button-top-btn">
                                                    <button type="button" onclick="new function() {
                                                            if (document.getElementById('refrense').value!='')
                                                            window.location.href='{{url('')}}/oder/refrenseshow/'+document.getElementById('refrense').value;
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

@endsection
@section('js')
    <script src="{{asset('public/assets/js/plugins/kamadatepicker.js')}}" type="text/javascript"></script>
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
                var url = "{{route('main.user.deleteAvatarUser')}}";
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

        }); //  end of jquery
    </script>
@endsection