<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">افزودن ویژگی</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_cat_feature">افزودن سر دسته ویژگی+</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                @foreach($category->feature_category as $feature_category)
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{$feature_category->name}}:</label>
                        @foreach($feature_category->features as $feature)
                            <span style="cursor: pointer;">{{$feature->feature}}</span>-
                        @endforeach
                        <button class="btn" data-toggle="modal" data-target="#add_feature" onclick="setid('{{$feature_category->id}}','{{$feature_category->name}}')">+</button>
                    </div>

                    <hr>
                @endforeach

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer -->
</div>
