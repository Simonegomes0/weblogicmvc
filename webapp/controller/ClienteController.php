<?php

use \ArmoredCore\WebObjects\View;

class ClienteController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('passageiro');

        return View::make('cliente.index');
    }

    public function VerVoos()
    {
        $this->loginFilterByRole('passageiro');
        $voos = voo::all();
        $aeroportos = aeroporto::all();
        $escalas = escala::all();

        return View::make('cliente.bilhete', ['voos'=>$voos, 'aeroportos'=>$aeroportos, 'escalas'=>$escalas]);
    }

    public function Comprar()
    {
        $this->loginFilterByRole('passageiro');

        return View::make('cliente.comprar');
    }
}