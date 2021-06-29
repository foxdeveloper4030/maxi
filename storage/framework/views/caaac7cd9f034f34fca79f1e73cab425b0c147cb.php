






<script>
    function compare_add(id) {
        $(document).ready(function () {
            loader_show();
            $.get("<?php echo e(route('main.compare.add')); ?>/"+id,
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
                        Swal.fire({
                            type: 'error',
                            title: ' ',
                            text:'خطا در ارتباط با سرور',
                        })
                });
        });
    }
</script><?php /**PATH C:\xampp\htdocs\khanehkala\resources\views/sub/js.blade.php ENDPATH**/ ?>