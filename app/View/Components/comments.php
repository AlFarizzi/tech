<?php

namespace App\View\Components;

use Illuminate\View\Component;

class comments extends Component
{
    public $comment,$login;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment, $login = false)
    {
        $this->comment = $comment;
        $this->login = $login;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.comments');
    }
}
