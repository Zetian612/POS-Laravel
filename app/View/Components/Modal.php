<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{

    public $idModal;
    public $title;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idModal, $title)
    {
        $this->idModal = $idModal;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|string|Closure
    {
        return view('components.modal');
    }
}
