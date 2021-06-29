@if(count($errors)>0)




    <div id="errormodal" class="modal" style="display: block" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('errormodal').style.display='none'">&times;</button>
                    <h4 class="modal-title">لطفا خطا های زیر را برطرف کنید!</h4>
                </div>
                <div class="modal-body">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        <div class="alert alert-danger">{{$error}}</div>

                    @endforeach
                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>
@endif
@if(session()->has('alert'))
    <div id="alertmodal" class="modal" style="display: block" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('alertmodal').style.display='none'">&times;</button>
                    <h4 class="modal-title">پیام سیستم</h4>
                </div>
                <div class="modal-body">
                    {!! session('alert') !!}
                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>
@endif
