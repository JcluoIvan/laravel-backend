<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\View;

class ThemeTemplateComposer
{

    public function compose(View $view)
    {
        $view->share('demo', '20');
    }
}
