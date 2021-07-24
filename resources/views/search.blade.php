<table class="table table-responsive">
    <thead>
      @foreach($products as $product)

          <tr>
              <th>
                  <a style="display: inline" href="{{route('main.product.show',['slug'=>$product->slug])}}">
                                             <span class="badge" style="border: 1px solid #f44336;background-color: #e7e4e4">
                                                 {{$product->name}}
                                             </span>
                  </a>
              </th>
          </tr>
      @endforeach
    </thead>
</table>
