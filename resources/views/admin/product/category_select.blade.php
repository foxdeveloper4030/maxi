



<div  style="height:200px;">
    <aside style="width: 100%" class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-ol"></i> <span>دسته ها</span>
                        <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach(\App\Category::query()->where('parent_id','=',0)->get() as $category)
                            @if(empty($category->childs))
                                <li><a> <input id="{{$category->id}}" type="checkbox" style="display: inline" onchange="select_cat(this,'{{$category->id}}')">{{$category->name}}</a></li>
                            @else
                                <li class="treeview">
                                    <input id="{{$category->id}}" type="checkbox" style="display: inline" onchange="select_cat(this,'{{$category->id}}')">  <a style="cursor: pointer;display: inline"><span style="cursor: pointer" class="badge"> {{$category->name}}</span>

                                        <span class="pull-left-container">

                                             <i class="fa fa-angle-right pull-left"></i>
                                        </span>
                                    </a>
                                    @include('admin.product.childs1',['category'=>$category])
                                </li>
                            @endif

                        @endforeach


                    </ul>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</div>
