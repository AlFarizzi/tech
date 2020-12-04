<?php

namespace App\View\Components;

use Illuminate\View\Component;

class content extends Component
{
    public $data;
    public $hastags;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data,$hastags = [])
    {
        $this->data = $data;
        $this->hashtags = $hastags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.content');
    }

}
