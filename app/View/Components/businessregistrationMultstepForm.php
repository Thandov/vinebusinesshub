<?php

namespace App\View\Components;

use Illuminate\View\Component;

class businessregistrationMultstepForm extends Component
{
    public $slides;
    public $linking;
    public $businessData;

    /**
     * Create a new component instance.
     *
     * @param  array  $slides
     * @return void
     */
    public function __construct($slides, $linking, $businessData)
    {
        $this->slides = $slides;
        $this->linking = $linking;
        $this->businessData = $businessData;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.businessregistration-multstep-form');
    }
}
