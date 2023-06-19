<?php

namespace App\View\TailwindXComponents;

use Illuminate\View\View;

class Logo extends TailwindXComponent
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $logo = '';

        return view('tailwind-x-components.logo.skins.' . $this->skin, [
            'logo' => $logo,
        ]);
    }
}
