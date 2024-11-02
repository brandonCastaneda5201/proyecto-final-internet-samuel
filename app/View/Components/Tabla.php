<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Tabla extends Component
{
    public $elementos;
    public $user;
    public $modelo;
    /**
     * Create a new component instance.
     */
    public function __construct($elementos = null, $modelo)
    {
        $this->elementos = $elementos;
        $this->modelo = $modelo;
        if (Auth::check()) {
            $this->user = Auth::user()->load('permiso');
        } else {
            $this->user = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tabla');
    }
}
