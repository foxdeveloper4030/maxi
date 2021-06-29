@extends('layouts.app')

@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    404
@endsection

@section('content')

    <!-- main -->
    <main class="page-404">
        <div class="container text-center">
            <div class="page-404-title">
                <h1>صفحه‌ای که دنبال آن بودید پیدا نشد!</h1>
            </div>
            <div class="page-404-actions">
                <a href="{{route('urlMain')}}" class="page-404-action page-404-action--primary">صفحه اصلی</a>
            </div>
            <div class="page-404-image">
                <img src="{{asset('public/assets/img/404.png')}}">
            </div>
        </div>
    </main>
    <!-- main -->

@endsection