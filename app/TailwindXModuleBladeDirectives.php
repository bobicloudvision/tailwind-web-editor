<?php

namespace App;

use Illuminate\View\Compilers\BladeCompiler;

class TailwindXModuleBladeDirectives
{
    public static function liveEdit($expression)
    {

        // <div tail-x:module="'.{$expression}['type'].'"></div>

        return <<<EOT
<?php
   echo \App\TailwindXModule::mount({$expression})->html();
?>
EOT;
    }
}
