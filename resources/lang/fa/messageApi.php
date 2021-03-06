<?php

return [
    'user' => [
        'register' => [
            'sendSMS' => 'کد ییامکی برای شما ارسال شد',
        ],
        'verify' => [
            'success' => 'ثبت نام موفقیت آمیز بود',
            'invlidSMScode' => 'کد پیامکی، اشتباه می‌باشد',
            'notExitsUser' => 'کاربری با مشخصات شما ثبت نشده است',
            'invalidUuid' => 'اطلاعات ارسالی شما، اشتباه است',
        ],
        'login' => [
            'success' => 'ورود موفقیت آمیز بود',
            'fail' => '',
        ],
    ],
    'slider' => [
        'index' => ''
    ],
    'financial' => [
        'insert' => [
            'success' => 'اطلاعات مالی، با موفقیت ثبت شد',
            'fail' => 'ثبت اطلاعات مالی، با شکست روبرو شد',
            'duplicate' => 'اطلاعات شماره کارت یا شماره شبا، تکراری می‌باشد'
        ],
        'update' => [
            'success' => 'اطلاعات مالی، با موفقیت بروزرسانی شد',
            'fail' => 'بروزرسانی اطلاعات مالی، با شکست مواجه شد',
            'duplicate' => 'اطلاعات شماره کارت یا شماره شبا، تکراری می‌باشد'
        ],
    ],
    'address' => [
        'insert' => [
            'success' => 'آدرس، با موفقیت ثبت شد',
            'fail' => 'ثبت آدرس، با شکست روبرو شد'
        ],
        'update' => [
            'success' => 'آدرس، با موفقیت بروزرسانی شد',
            'fail' => 'بروزرسانی آدرس، با شکست روبرو شد'
        ],
        'delete' => 'آدرس مورد نظر، حذف شد'
    ],
    'favorit' => [
        'insert' => [
            'success' => 'این محصول، به علاقه‌مندی‌ها، اضافه شد',
            'fail' => 'این  محصول به علاقه‌مندی‌ها، اضافه نشد'
        ],
        'delete' => 'این علاقه‌مندی، حذف گردید'
    ],
    'comment' => [
        'insert' => [
            'success' => 'دیدگاه شما ثبت شد و پس از تایید، در قسمت دیدگاه‌ها نشان داده خواهد شد',
            'fail' => 'ثبت دیدگاه با شکست مواجه شد'
        ],
        'get' => 'نظراتی برای این محصول، وجود ندارد'
    ],
    'cart' => [
        'insert' => [
            'success' => 'محصول به سبد خرید اضافه شد',
            'fail' => 'محصول به سبد خرید اضافه نشد',
            'notQty' => 'این تعداد محصول در انبار موجود نمی‌باشد'
        ],
        'delete' => [
            'success' => 'آیتم مورد نظر حذف گردید',
            'fail' => 'حذف نشد'
        ],
        'deleteAll' => [
            'success' => 'سبد خرید خالی شد',
            'success2' => 'سبد خریدتان، خالی بود',
            'fail' => 'حذف همه‌ی آیتم‌ها، با مشکل مواجه شد'
        ],
        'get' => 'سبد خرید خالی هست',
        'increaseNumber' => 'تعداد افزایش یافت',
    ],
];