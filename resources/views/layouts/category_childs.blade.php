@foreach($childs as $child)
    @if(count($child->childs->all())<1&&$child->home==1)
        <li class="list-item list-item-has-children"
            style="width:20%;height:40px;line-height:40px;background-color: rgba(245,245,245,.5);margin-bottom: 1%; margin-right:1%;
                    border: 1px solid #eeeeee; border-radius: 5px;">
            <i class="now-ui-icons arrows-1_minimal-left" style="line-height: 2.533;"></i>
            <a class="nav-link" style="font-size: 13px; font-weight: bold"
               href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($child->name)])}}">{{$child->name}}</a>
        </li>

    @else
        @if($child->home==1)
            <li class=" widget-suggestion widget card"
                style="width:20%;height:40px;line-height:40px;background-color: rgba(40,255,188,0.5);margin-bottom: 1%; margin-right:1%;
                    border: 1px solid #eeeeee; border-radius: 5px;">
                <i class="now-ui-icons " style="line-height: 2.533;"></i>
                <a class="nav-link" style="font-size: 13px; font-weight: bold"
                   href="{{route('category.show',['name'=>(new \App\PublicModel())->slug_format($child->name)])}}">{{$child->name}}</a>
                <ul class="sub-menu nav">
                    @include('layouts.category_childs',['childs'=>$child->childs->all()])
                </ul>
            </li>
        @endif
    @endif
@endforeach
