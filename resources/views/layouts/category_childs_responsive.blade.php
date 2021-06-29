

@foreach($childs as $child)
@if(count($child->childs->all())<1&&$child->home==1)
    <li>
        <a href="#"> <p style="cursor: pointer" onclick="window.location.href='{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($child->name)])}}'">{{$child->name}}</p>
        </a>
    </li>

    @else
    @if($child->home==1)
       <li class="sub-menu">


        <a href="#">
            <p style="cursor: pointer" onclick="window.location.href='{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($category->name)])}}'">{{$category->name}}</p>
        </a>

            <ul>
                @include('layouts.category_childs_responsive',['childs'=>$child->childs->all()])

            </ul>

       </li>
    @endif
@endif
@endforeach
