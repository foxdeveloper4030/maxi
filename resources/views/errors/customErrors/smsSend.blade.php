@extends('layouts.app')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    {{$code}}
@endsection

@section('content')

    <!-- main -->
    <main class="page-404">
        <div class="container text-center">
            <div class="page-404-title">
                <h1>{{$myMessage}}</h1>
            </div>
            <div class="page-404-actions">
                <a href="{{route('auth.register')}}" class="page-404-action page-404-action--primary">ثبت نام</a>
            </div>
            <div class="page-404-image">
                <img src="assets/img/404.png">
            </div>
        </div>
    </main>
    <!-- main -->

@endsection