<?php

namespace App\Http\Controllers;

use Qirolab\Theme\Theme;

class WebsiteController
{

    public function homepage()
    {
     //   return view('wow');
//
        Theme::set('hotel_roberto', 'bootstrap_default');

        return view('home');
    }

    public function page($slug)
    {
        Theme::set('hotel_roberto', 'bootstrap_default');

        return view('page');
    }

    public function wow()
    {
        return view('wow');
    }

}
