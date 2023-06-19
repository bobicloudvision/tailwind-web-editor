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
        $view = time();

        return '<div tail-x:id="'.$this->id.'" tail-x:module="'.$this->params['type'].'">

        '.$view.'

        </div>';
    }
}
