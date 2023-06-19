<?php

namespace App\Http\Controllers;

use Qirolab\Theme\Theme;

class WebsiteController
{

    public function homepage()
    {
        Theme::set('clean_portfolio', 'bootstrap_default');

        return view('home');
    }

    public function page($slug)
    {
        Theme::set('clean_portfolio', 'bootstrap_default');

        return view('page');
    }

}
