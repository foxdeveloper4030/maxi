






<script>
    function compare_add(id) {
        $(document).ready(function () {
            loader_show();
            $.get("{{route('main.compare.add')}}/"+id,
                function (data, status) {
                document.getElementById('compare_id').innerHTML=data['count'];

                if (data['count']>0)
                    document.getElementById('compare_box').style.display='block';
                    loader_dismis();
                    show_cart();
                    if (data['state']==true)
                        Swal.fire(
                            ' ',
                            'محصول به لیست مقایسه اضاف شد',
                            'success'
                        );
                    else
                        if (data['state']==false&&data['message']=='no')
                            Swal.fire({
                                type: 'error',
                                title: ' ',
                                text:'امکان مقایسه دو محصول با دسته بندی متفاوت وجود ندارد!',
                            });
                        else
                        Swal.fire({
                            type: 'error',
                            title: ' ',
                            text:'خطا در ارتباط با سرور',
                        });
                });
        });
    }
</script>
