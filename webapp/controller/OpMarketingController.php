<?php
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;

class OpMarketingController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('opmarketing');
        return View::make('opmarketing.index');
    }

    public function gestaoDisconto()
    {
        $this->loginFilterByRole('opmarketing');
        $voos = voo::all();
        $aeroportos = aeroporto::all();
        $escalas = escala::all();
        return View::make('opmarketing.gestaoDisconto', ['voos' => $voos, 'aeroportos' => $aeroportos, 'escalas' => $escalas]);
    }

    public function aplicarDisconto($id)
    {
        $this->loginFilterByRole('opmarketing');

        $escalas = escala::find($id);

    }
}