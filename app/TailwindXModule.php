<?php

namespace App;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void component($alias, $viewClass)
 *
 * @see
 */
class TailwindXModule extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'tailwind-x-module';
    }
}
