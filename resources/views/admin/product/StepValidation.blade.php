


@extends('admin.layouts.main')
@section('title')
    اعبار سنجی محصول
@endsection
@section('content')
    <script>
        var cats=[];
    </script>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-danger">شما یک محصول نا تمام دارید برای اتمام یا حذف محصول روی گزینه های زیر کلیک کنید!!!</div>
                <br>
                <a href="{{route('admin.product.add_store')}}" class="btn btn-success">تکمیل مراحل</a>
                <br>
                <br>
                <br>
                <a href="{{route('admin.product.delete_store')}}" class="btn btn-danger">حذف محصول</a>
            </div>



        </div>


    </section>

@endsection
