<?php

namespace App\View\Components;

use Illuminate\View\Component;

class btn extends Component
{
    public $btnType;
    public $name;
    public $linking;
    public $unqid;
    public $klass;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($btnType, $name, $linking, $unqid, $klass, $color)
    {
        $this->btnType = $btnType;
        $this->name = $name;
        $this->linking = $linking;
        $this->unqid = $unqid;
        $this->klass = $klass;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.btn');
    }
}
