<?php

namespace App\View\Components;

use Illuminate\View\Component;

class multistepForm extends Component
{
    public $slides;

    /**
     * Create a new component instance.
     *
     * @param  array  $slides
     * @return void
     */
    public function __construct($slides)
    {
        $this->slides = $slides;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multistep-form');
    }
}
