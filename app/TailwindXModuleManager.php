<?php

namespace App;

class TailwindXModuleManager
{
    public function mount($name, $params = [])
    {
        // This is if a user doesn't pass params, BUT passes key() as the second argument.
        if (is_string($params)) $params = [];

        $id = str()->random(20);

        return $this;
    }

    public function html()
    {
        return time();
    }
}
