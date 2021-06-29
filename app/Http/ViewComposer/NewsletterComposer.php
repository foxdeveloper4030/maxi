<?php

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;

class NewsletterComposer
{


    public function compose(View $view)
    {
        $myUser = \Auth::user();

        $view->with('myUser', $myUser);
    }
}