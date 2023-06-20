<?php

namespace App\View\TailwindXComponents;

use Illuminate\View\Component;

class TailwindXComponent extends Component
{
    /**
     * @var string
     */
    public $skin = 'default';

    /**
     * @var array
     */
    public $params;

    public function setSkin($skin)
    {
        $this->skin = $skin;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function render()
    {
        // TODO: Implement render() method.
    }

}
