<?php

namespace App\View\Components\Form\Input;

use Illuminate\View\Component;

class Button extends Component
{
    public $eventName, $eventAction, $type, $class, $id, $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($eventName, $eventAction, $type, $class, $id, $label)
    {
        $this->eventAction = $eventAction;
        $this->eventName = $eventName;
        $this->type = $type;
        $this->class = $class;
        $this->id = $id;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input.button');
    }
}
