<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class Password extends Component
{
    public $name, $class, $id, $for;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $class, $id, $for)
    {
        $this->name = $name;
        $this->class = $class;
        $this->id = $id;
        $this->for = $for;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input.password');
    }
}
