<?php

namespace App\View\TailwindXComponents;

use Illuminate\View\View;

class SocialLinks extends TailwindXComponent
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $text = '';

        return view('tailwind-x-components.social-links.skins.' . $this->skin, [
            'text' => $text,
        ]);
    }

}
