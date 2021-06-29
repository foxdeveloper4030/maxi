<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class PageComposer
{


    public function compose(View $view)
    {
        $pagesCollect = DB::table('pages')->get();

        for ($i = 0; $i < 3; $i++) {
            $pages[$i] = $pagesCollect->filter(function ($value, $key) use ($i) {
                if ($value->col == $i + 1) {
                    return $value;
                }
            });
        }

        $view->with('pages', $pages);
    }
}