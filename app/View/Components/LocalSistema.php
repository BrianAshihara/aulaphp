<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LocalSistema extends Component
{
    public $mensagemPrincipal;
    public $mensagemSecundaria;
    public $url;
    public $navegacao;
    /**
     * Create a new component instance.
     */
    public function __construct($mensagemPrincipal, $mensagemSecundaria, $url, $navegacao)
    {
        //
        $this->mensagemPrincipal = $mensagemPrincipal;
        $this->mensagemSecundaria = $mensagemSecundaria;
        $this->url = $url;
        $this->navegacao = $navegacao;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.local-sistema');
    }
}
