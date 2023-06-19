<?php

namespace App;

use Illuminate\View\Compilers\BladeCompiler;

class TailwindXModuleBladeDirectives
{
    public static function liveEdit($expression)
    {
        return <<<EOT
<?php
echo '<div tail-x:module="'.{$expression}['type'].'"></div>';
?>
EOT;
    }
}
