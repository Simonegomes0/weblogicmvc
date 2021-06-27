<?php

use \ArmoredCore\WebObjects\View;

class ClienteController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('passageiro');

        return View::make('cliente.index');
    }
}