


@extends('layouts.app')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    پیگیری سفارش
@endsection

@section('content')
    <!-- main -->
    <main class="profile-user-page default">
        <div class="container">
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

                                                            <input id="refrense" class="input-field" type="text" placeholder="مثلا 765301">


                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="profile-return-request-form-button profile-return-request-form-button-top-btn"> <button type="button" onclick="new function() {
                                                  if (document.getElementById('refrense').value!='')
                                  window.location.href='{{url('')}}/oder/refrenseshow/'+document.getElementById('refrense').value;
                                  else
                                      alert('شماره پیگیری شفارش نمیتواند خالی باشد!!');
                                                            }" class="btn-primary">بررسی سفارش</button>
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


