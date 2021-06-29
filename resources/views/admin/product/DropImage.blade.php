<!-- imageupload.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Multiple Images Upload Using Dropzone</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
</head>
<body>

    <div class="col-2" style="width: 10%">

    </div>
    <div class="col-8" style="width: 80%;padding: 50px;">

        <h3 class="jumbotron">آپلود سریع تصاویر</h3>
        <form method="post" action="{{url('admin')}}/product/add/store/AddImg/{{$product->id}}" enctype="multipart/form-data"
              class="dropzone" id="dropzone">
            <input type="file" name="img">
            @csrf
        </form>
        <script type="text/javascript">
            Dropzone.options.dropzone =
                {
                    maxFilesize: 12,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time+file.name;
                    },
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    addRemoveLinks: true,
                    timeout: 5000,
                    success: function(file, response)
                    {
                        alert(file);
                    },
                    error: function(file, response)
                    {
                        return false;
                    }
                };
        </script>
    </div>
    <div class="col-2" style="width: 10%">

    </div>

</body>
</html>
