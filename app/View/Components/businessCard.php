<?php

namespace App\View\Components;

use Illuminate\View\Component;

class businessCard extends Component
{
    public $id;
    public $name;
    public $logo;
    public $industry;
    public $address;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $id, $logo, $industry, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->logo = $logo;
        $this->industry = $industry;
        $this->address = $address;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.business-card');
    }
}
