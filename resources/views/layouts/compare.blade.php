@extends('layouts.app')
@section('meta')
    <meta name="description" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">


@endsection

@section('title')
    مقایسه
@endsection
@section('content')

    <div class="row mt-5 mb-5">


        <table class="table table-striped">
            <thead>
            <tr>


                    <?php
                    $product = \App\Product::query()->find(session('compare')[0]);
                    $category = \App\PublicModel::parent($product);
                    ?>
                    @foreach(session('compare') as $pid)
                        <?php
                        $product = \App\Product::query()->find($pid);
                        $category = \App\PublicModel::parent($product);
                        ?>

                        <th>
                            <div class="widget widget-product card " style="max-width: 200px;">
                                <header class="card-header">

                                    <a href="{{route('main.compare.delete',['product_id'=>$product->id])}}">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </header>
                                <div class="item">
                                    <a href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                        <img style="max-height: 200px" src="{{(new \App\PublicModel())->image_cover($product)}}" class="img-fluid" alt="">
                                    </a>
                                    <p class="post-title small">
                                        <a href="{{route('main.product.show',['slug'=>$product->slug])}}">{{$product->name}}</a>
                                    </p>

                                    <div class="btn-group">
                                        <a href="{{route('main.product.show',['slug'=>$product->slug])}}"><button type="button" class="btn btn-info" style="margin-right: 25%">مشاهده </button>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </th>

                    @endforeach

            </tr>
            </thead>
            <tbody>
            @foreach($category->feature_category as $feature_cat)

                @foreach($feature_cat->features as $feature)

                    @if(App\PublicModel::feature_value($product->id,$feature->id)!=" ")

                        <tr>
                            @foreach(session('compare') as $pid)
                                <?php
                                $product = \App\Product::query()->find($pid);
                                ?>
                                    <td>
                                        <span style="background-color: #9f9f9f" class="block badge">{{$feature->feature}}</span>
                                    </td>
                            @endforeach
                        </tr>

                        <tr>
                            @foreach(session('compare') as $pid)
                                <?php
                                $product = \App\Product::query()->find($pid);
                                ?>
                                    <td>
                                        <label>
                                            11&nbsp; {{App\PublicModel::feature_value($product->id,$feature->id)}}
                                        </label>
                                    </td>
                            @endforeach
                        </tr>

                    @endif

                @endforeach



            @endforeach


            </tbody>
        </table>
    </div>


@endsection

@section('js')
    @include('sub.js')

@endsection

