@extends('admin.layouts.main')
@section('title')
    کاربران حاوی نقش
@endsection
@section('css')
    <style>
        #body_val tr td {
            line-height: 27px;
        }

        /*tooltip*/
        [data-tooltip-text]:hover {
            transition: all 500ms ease;
            position: relative;
        }

        [data-tooltip-text]:hover:after {
            background-color: rgba(192, 230, 236, 0.6);
            width: auto;
            min-width: 100px;
            max-width: 300px;
            word-wrap: break-word;
            -webkit-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            -moz-box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            box-shadow: 0px 0px 3px 1px rgba(192, 230, 236, 0.3);
            color: #515151;
            font-size: 12px;
            content: attr(data-tooltip-text);
            margin-bottom: 5px;
            top: 10%;
            right: -55%;
            padding: 5px 12px;
            position: absolute;
            z-index: 9999;
        }

        div.swal2-container {
            z-index: 500000;
        }

        /*end of tooltip*/
    </style>
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">همه کاربرانی که نقش گرفتند</h3>
                        <img id="loading" style="display: none" src="{{url('public')}}/loading.gif">...
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">


                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" style="margin-top: 1%">

                        <table class="table table-hover table-striped table-hover">
                            <tbody id="body_val">

                            @php($counter=1)
                            @foreach($users as $user)

                                <tr style="text-align: center;border-top: 2px solid #0b2e13" id="brand{{$user->id}}">
                                    <td>{{$counter}}</td>
                                    <td>{{$user->fullName}}</td>
                                    <td>
                                        <a href="{{route('LevelManages.edit',$user->id)}}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i></a>
                                        <a href="{{route('LevelManages.destroy',$user->id)}}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <tr>
                                    @if($user->roles->count() > 0)
                                        <td colspan="4">
                                            @foreach($user->roles as $ur)
                                                <span style="display: inline-block;background-color: #222d32;color: #b8c7ce;padding-right: 1%;padding-left: 1%">
                                                    {{$ur->role}} / {{$ur->label}}
                                                </span>
                                            @endforeach
                                        </td>
                                    @else
                                        <td colspan="4">در حال حاضر، کاربر شماره {{$counter}} هیچ نقشی، ندارد.</td>
                                    @endif
                                </tr>
                                @php($counter++)
                            @endforeach
                            </tbody>
                        </table>
                        {{--{{$user->links()}}--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {

        });         //  end of jquery
    </script>
@endsection
