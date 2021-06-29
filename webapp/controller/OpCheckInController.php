<?php
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;


class OpCheckInController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('opcheckin');

        return View::make('opcheckin.index');
    }

}