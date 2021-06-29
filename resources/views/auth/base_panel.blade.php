<div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
    <div class="profile-box">
        <div class="profile-box-header">
            <div class="profile-box-avatar">
                @if(($user->avatar) != "")
                    <img id="avataredit" src="{{$user->avatar}}"
                         alt="avatar">
                @else
                    <img id="avataredit" src="{{asset('public/assets/img/svg/myavatar.png')}}"
                         alt="avatar">
                @endif
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
                        {{--<div class="modal-body">--}}
                        {{--<ul class="profile-avatars default text-center">--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/user.svg"></img>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/avatar-1.svg"></img>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/avatar-2.svg"></img>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/avatar-3.svg"></img>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/avatar-4.svg"></img>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/avatar-5.svg"></img>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/avatar-6.svg"></img>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<img class="profile-avatars-item" src="assets/img/svg/avatar-7.svg"></img>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <!-- Modal Core -->
        </div>
        <div id="usernameInfoEdit" class="profile-box-username">
            {{$user->fullname}}
        </div>
        <div class="profile-box-tabs"
             style="display: flex;flex-direction: row;justify-content: space-around;align-items: stretch;">
            <a href="{{route('main.user.changepass')}}" style="flex-grow: 1;flex-basis: 50%;"
               class="profile-box-tab profile-box-tab-access center-block">
                <i class="now-ui-icons ui-1_lock-circle-open" sy></i>
                تغییر رمز عبور
            </a>
            <a href="{{route('logout')}}" class="profile-box-tab profile-box-tab--sign-out"
               style="flex-grow: 1;flex-basis: 50%;">
                <i class="now-ui-icons media-1_button-power"></i>
                خروج از حساب
            </a>
        </div>
    </div>
    @if (session()->has('status'))
        <div class="alert alert-dismissible fade show" style="background-color: rgba(212, 237, 218,0.7);color: #155724"
             role="alert">
            <strong>تغییر رمز عبور!</strong>
            {{@session()->pull('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
                <a href="" class="dropdown-item active-menu">
                    <i class="now-ui-icons users_single-02"></i>
                    آدرس‌ها
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
                <a href="profile-personal-info.html" class="dropdown-item">
                    <i class="now-ui-icons business_bank"></i>
                    تیکت ها
                </a>
            </div>
        </div>
    </div>
    <div class="profile-menu hidden-md">
        <div class="profile-menu-header">حساب کاربری شما</div>
        <ul class="profile-menu-items">
            <li>
                <a href="{{route('main.user.index')}}" class="active">
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
                <a style="cursor: pointer" data-toggle="modal" data-target="#editModalAddrss">
                    <i class="fa fa-address-book"></i>
                    آدرس‌ها
                </a>
            </li>
            <li>
                <a href="{{route('main.user.allorder')}}">
                    <i class="now-ui-icons shopping_basket"></i>
                    همه سفارش ها
                </a>
            </li>
            <li>
                <a href="{{route('main.user.return')}}">
                    <i class="now-ui-icons files_single-copy-04"></i>
                    درخواست مرجوعی
                </a>
            </li>
            <li>
                <a href="{{route('main.user.love')}}">
                    <i class="now-ui-icons ui-2_favourite-28"></i>
                    لیست علاقمندی ها
                </a>
            </li>

            <!-- Modal -->
            <div id="editModalAddrss" class="col col-12 modal fade" role="dialog">
                <div class="modal-dialog" style="transform: translate(50%,0)" id="editModalBorder">

                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius: 5px;width: 1000px;">
                        <div class="row">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        style="top: 1%;font-size: 40px;">&times;
                                </button>
                                <h4 class="modal-title">ویرایش آدرس‌ها</h4>
                            </div>
                        </div>
                        @foreach($addresses as $address)
                            <form id="submitFormInfoUser{{$address->id}}" class="form-account"
                                  style="width: 98%; border: 2px solid #00bfd6;margin: 1% auto;border-radius: 5px"
                                  data-url="{{ route('main.user.updateInfoUser') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="modal-body">
                                    <div class="form-account-row">
                                        <div
                                            style="width: 20%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                            <div class="form-account-title">نوع آدرس</div>
                                            <label for="title{{$address->id}}" class="input-label"></label>
                                            <input class="input-field @error('title') is-invalid @enderror"
                                                   type="text" id="title{{$address->id}}"
                                                   name="title" value="{{$address->title}}"
                                                   style="text-align: center">
                                            @if ($errors->has('title'))
                                                <span class="" role="alert">
                                                    <strong
                                                        class="text-danger">{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div
                                            style="width: 20%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                            <div class="form-account-title">شماره موبایل</div>
                                            <label for="phone_mobile{{$address->id}}" class="input-label"><i
                                                    class="now-ui-icons"></i></label>
                                            <input class="input-field @error('phone_mobile') is-invalid @enderror"
                                                   type="text" id="phone_mobile{{$address->id}}"
                                                   name="phone_mobile" value="{{$address->phone_mobile}}"
                                                   style="text-align: center">
                                            @if ($errors->has('phone_mobile'))
                                                <span class="" role="alert">
                                                    <strong
                                                        class="text-danger">{{ $errors->first('phone_mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div
                                            style="width: 20%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                            <div class="form-account-title">نام</div>
                                            <label for="firstname{{$address->id}}" class="input-label"></label>
                                            <input class="input-field @error('firstname') is-invalid @enderror"
                                                   type="text" id="firstname{{$address->id}}"
                                                   name="firstname" value="{{$address->firstname}}"
                                                   style="text-align: center">
                                            @if ($errors->has('firstname'))
                                                <span class="" role="alert">
                                                    <strong
                                                        class="text-danger">{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div style="width: 20%;height: auto;float: right;margin-bottom: 2.5%;">
                                            <div class="form-account-title">نام خانوادگی</div>
                                            <label for="lastname{{$address->id}}" class="input-label"><i
                                                    class="now-ui-icons"></i></label>
                                            <input class="input-field @error('lastname') is-invalid @enderror"
                                                   type="text" id="lastname{{$address->id}}"
                                                   name="lastname" value="{{$address->lastname}}"
                                                   style="text-align: center">
                                            @if ($errors->has('lastname'))
                                                <span class="" role="alert">
                                                    <strong
                                                        class="text-danger">{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-account-row">
                                        <div
                                            style="width: 30%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                            <div class="form-account-title">استان</div>
                                            <label for="province{{$address->id}}" class="input-label"></label>
                                            <select id="province{{$address->id}}" name="province"
                                                    class="input-field text-right"
                                                    type="text" style="text-indent: 30%!important;"
                                                    onchange="new function(){
                                                        $(document).ready(function () {
                                                        $.get('{{route('getcity')}}/'+document.getElementById('province{{$address->id}}').value,
                                                        function (data, status) {
                                                        let city= document.getElementById('city{{$address->id}}');
                                                        city.remove(city.selectedIndex);
                                                        city.innerHTML=data;
                                                        });});}">
                                                @foreach($provinces as $province)
                                                    <option value="{{$province->id}}"
                                                            @if($province->id == $address->province_id) selected @endif>
                                                        {{$province->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('province'))
                                                <span class="" role="alert">
                                                <strong class="text-danger">{{ $errors->first('province') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div
                                            style="width: 30%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                            <div class="form-account-title">شهرستان</div>
                                            <label for="city{{$address->id}}" class="input-label"><i
                                                    class="now-ui-icons"></i></label>
                                            <select id="city{{$address->id}}" name="city" class="input-field text-right"
                                                    type="text"
                                                    style="text-indent: 30%!important;">
                                                <option value="{{$address->city_id}}">{{$address->city}}</option>
                                            </select>
                                            @if ($errors->has('city'))
                                                <span class="" role="alert">
                                                <strong class="text-danger">{{ $errors->first('city') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div style="width: 30%;height: auto;float: right;margin-bottom: 2.5%;">
                                            <div class="form-account-title">کد پستی</div>
                                            <label for="postcode{{$address->postcode}}" class="input-label"><i
                                                    class="now-ui-icons"></i></label>
                                            <input class="input-field @error('postcode') is-invalid @enderror"
                                                   type="text"
                                                   name="postcode" value="{{$address->postcode}}"
                                                   id="postcode{{$address->postcode}}"
                                                   autocomplete="off"
                                                   style="text-align: center">
                                            @if ($errors->has('postcode'))
                                                <span class="" role="alert">
                                                <strong class="text-danger">{{ $errors->first('postcode') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-account-row" style="clear: both">
                                        <div
                                            style="width: 70%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                            <div class="form-account-title">آدرس کامل</div>
                                            <label for="address1{{$address->address1}}" class="input-label"></label>
                                            <textarea class="input-field @error('address1') is-invalid @enderror"
                                                      name="address1" id="address1{{$address->id}}"
                                                      style="width: 600px;height: 100px; text-align: right">
                                                {{$address->address1}}
                                            </textarea>
                                            @if ($errors->has('address1'))
                                                <span class="" role="alert">
                                                <strong class="text-danger">{{ $errors->first('address1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div
                                            style="width: 10%;height: auto;float: left;margin-bottom: 2.5%; margin-left:4%;position: relative;">
                                            <a class="updateAddressUser"
                                               data-selectedId="{{$address->id}}"
                                               href="{{route('updateAddressUser',$address->id)}}"
                                               style="width: 5%;height: auto;float: right;position: absolute;top: 90px;right: 0">
                                                <label class="input-label update">
                                                    <i class="fa fa-save"></i></label>
                                            </a>
                                            <a style="width: 5%;height: auto;float: left;position: absolute;top: 90px;left: 0"
                                               href=""
                                               class="deleteAddress" data-id="{{$address->id}}"
                                               data-url="{{route('deleteAddress',$address->id)}}">
                                                <label id="lastname" class="input-label delete"><i
                                                        class="fa fa-trash"></i></label>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="form-account-row1 form-account-submit">
                                <div class="parent-btn" style="padding: 0 10px">
                                    <button id="closeModal" type="button" class="dk-btn dk-btn-grey"
                                            data-dismiss="modal">بستن
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog" id="editModalBorder">

                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius: 5px">
                        <form id="submitFormInfoUser" class="form-account"
                              data-url="{{ route('main.user.updateInfoUser') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
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
                                        @if(($user->avatar) != "")
                                            <img id="setImageUpload"
                                                 style="width:80px; height:80px;border-radius: 50%;"
                                                 src="{{$user->avatar}}" alt="avatar">
                                        @else
                                            <img id="setImageUpload"
                                                 style="width:80px; height:80px;border-radius: 50%;"
                                                 src="{{asset('public/assets/img/svg/myavatar.png')}}" alt="avatar">
                                        @endif
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
                                        <input class="input-field @error('firstname') is-invalid @enderror"
                                               type="text"
                                               name="firstname" value="{{$user->firstname}}"
                                               style="text-align: center">
                                        @if ($errors->has('firstname'))
                                            <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('firstname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;">
                                        <div class="form-account-title">نام و نام خانوادگی</div>
                                        <label id="lastname" class="input-label"><i
                                                class="now-ui-icons"></i></label>
                                        <input class="input-field @error('lastname') is-invalid @enderror"
                                               type="text"
                                               name="lastname" value="{{$user->lastname}}"
                                               style="text-align: center">
                                        @if ($errors->has('lastname'))
                                            <span class="" role="alert">
                                        <strong class="text-danger">{{ $errors->first('lastname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-account-row">
                                    <div
                                        style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;margin-left: 1.5%">
                                        <div class="form-account-title">وب سایت</div>
                                        <label id="website" class="input-label"></label>
                                        <input class="input-field @error('website') is-invalid @enderror"
                                               type="text"
                                               name="website" value="{{$user->website}}"
                                               style="text-align: center">
                                        @if ($errors->has('website'))
                                            <span class="" role="alert">
                                                <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div style="width: 49%;height: auto;float: right;margin-bottom: 2.5%;">
                                        <div class="form-account-title">تاریخ تولد</div>
                                        <label id="birthday" class="input-label"><i
                                                class="now-ui-icons"></i></label>
                                        <input class="input-field @error('birthday') is-invalid @enderror"
                                               type="text"
                                               name="birthday" value="{{$user->birthday}}" id="data-input"
                                               autocomplete="off"
                                               style="text-align: center">
                                        @if ($errors->has('birthday'))
                                            <span class="" role="alert">
                                                <strong class="text-danger">{{ $errors->first('birthday') }}</strong>
                                            </span>
                                        @endif
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
