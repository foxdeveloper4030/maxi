<div  style="height:200px;">
    <aside style="width: 100%" class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-ol"></i> <span> انتخاب ویژگی</span>
                        <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach(\App\Attribute_Group::all() as $group)

                                <li class="treeview" >
                                    <a ><span style="cursor: pointer" class="badge"> {{$group->name}}</span>

                                        <span class="pull-left-container">

                                             <i class="fa fa-angle-right pull-left"></i>
                                        </span>
                                    </a>

                                    <ul style="overflow: scroll;max-height: 200px" class="treeview-menu">
                                        @foreach($group->attrs as $child)
                                            <?php $is=false;  ?>
                                            @foreach($attrs as $atrr)
                                                <?php if ($atrr->id==$child->id)
                                                    $is=true;
                                                ?>

                                            @endforeach
                                            @if(!$is)
                                                <li class="treeview">

                                                    <input  id="{{$child->id}}" type="radio" name="group{{$group->id}}" checked="" style="width:20px;display: inline" onchange="select_attr(this,this.id)"><span style="cursor: pointer" class="badge" > {{$child->value->name}}</span>

                                                    <span class="pull-left-container">
                                             <i class="fa fa-angle-right pull-left"></i>
                                            </span>
                                                    </a>

                                                </li>
                                            @else
                                                <li class="treeview">

                                                    <span style="cursor: pointer;background-color: green"  class="badge badge-success" > {{$child->value->name}}</span>

                                                    <span class="pull-left-container">
                                             <i class="fa fa-angle-right pull-left"></i>
                                            </span>
                                                    </a>

                                                </li>

                                            @endif


                                        @endforeach

                                    </ul>
                                </li>


                        @endforeach


                    </ul>


                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
</div>