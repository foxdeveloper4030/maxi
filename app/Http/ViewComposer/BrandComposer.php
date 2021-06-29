<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class BrandComposer
{


    public function compose(View $view)
    {
        $brands = DB::table('brands')->get();

        $view->with('brands', $brands);
    }
}