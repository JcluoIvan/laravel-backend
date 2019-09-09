<?php

namespace App\Services;

class LayoutService
{
    private $css = [];
    private $js = [];

    public function __construct()
    {
        view()->share([
            'themeTemplate' => 'default',
            'appTitle' => 'laravel - backend'
        ]);
    }



}
