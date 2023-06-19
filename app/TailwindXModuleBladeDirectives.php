<?php

namespace App;

use Illuminate\View\Compilers\BladeCompiler;

class TailwindXModuleBladeDirectives
{
    public static function liveEdit($expression)
    {
        return <<<EOT
<?php
   echo \App\TailwindXModule::mount({$expression})->html();
?>
EOT;
    }
}
