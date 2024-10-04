<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Layout extends Component
{
    public $titulo;
    public $user;
    /**
     * Create a new component instance.
     */
    public function __construct($titulo = "Libreria")
    {
        $this->titulo = $titulo;
        $this->user = Auth::user();
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
