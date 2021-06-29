<?php
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;


class GestorVooController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('gestorvoo');

        return View::make('gestorvoo.index');
    }

}