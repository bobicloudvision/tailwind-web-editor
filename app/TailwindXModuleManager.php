<?php

namespace App;

class TailwindXModuleManager
{
    public $id;
    public $params;

    public function mount($params = [])
    {
        $this->id = str()->random(20);
        $this->params = $params;

        return $this;
    }

    public function html()
    {
        $type = $this->params['type'];

        $bladeFile = $type . '/default';
        if (isset($this->params['skin'])) {
            $bladeFile = $type . '/' . $this->params['skin'];
        }

        $viewHtml = view('tailwind-x-components.'.$bladeFile)->render();

        return '<div tailwind-x:id="'.$this->id.'" tailwind-x:module="'.$type.'">

        '.$viewHtml.'

        </div>';
    }
}
