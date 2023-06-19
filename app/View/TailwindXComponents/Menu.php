<?php

namespace App\View\TailwindXComponents;

use Illuminate\View\View;

class Menu extends TailwindXComponent
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public string $type = 'success',
        public string $message = 'Your message here'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tailwind-x-components.menu.' . $this->skin, [
            'type' => $this->type,
            'message' => $this->message,
        ]);
    }
}
