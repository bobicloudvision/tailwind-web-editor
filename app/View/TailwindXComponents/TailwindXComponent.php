<?php

namespace App\View\TailwindXComponents;

use Illuminate\View\Component;

class TailwindXComponent extends Component
{
    /**
     * @var string
     */
    public $skin;

    public function setSkin($skin)
    {
        $this->skin = $skin;
    }

    public function render()
    {
        // TODO: Implement render() method.
    }

}
