


@if(!empty($category->childs))

    <ul class="treeview-menu">

        @foreach($category->childs->all() as $child)
            @if(count($child->childs->all())<1)
                <li> <input id="{{$category->id}}" type="checkbox" style="display: inline" onchange="select_cat(this,'{{$category->id}}')"><a style="display: inline"><i class="fa fa-circle-o"></i>{{$child->name}}</a></li>
            @else
                <li class="treeview">

                    <input id="{{$category->id}}" type="checkbox" style="display: inline" onchange="select_cat(this,'{{$category->id}}')"><span style="cursor: pointer" class="badge" > {{$child->name}}</span>

                        <span class="pull-left-container">
                        <i class="fa fa-angle-right pull-left"></i>
                      </span>
                    </a>
                    @include('admin.product.childs1',['category'=>$child])
                </li>
            @endif


       @endforeach

    </ul>
@endif


