<?php
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;


class AdminController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('admin');

        return View::make('admin.index');
    }

}