<div class="row">
    <div class="col-12">
        <div class="brand-slider card">
            <header class="card-header">
                <h3 class="card-title"><span>برندهای ویژه</span></h3>
            </header>
            <div class="owl-carousel">
                @isset($brands)
                    @foreach($brands as $brand)
                        <div class="item">
                                <a href="{{$brand->siteUrl}}"
                                   data-tooltip-text="{{$brand->alt}}">
                                    <img src="{{$brand->imgUrl}}" alt="{{$brand->alt}}">
                                </a>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>