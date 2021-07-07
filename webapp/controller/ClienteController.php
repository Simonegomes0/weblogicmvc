<?php
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;


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

    public function Comprar($id)
    {
        $this->LoginFilterByRole('passageiro');
        $voo = voo::find([$id]);
        $aeroportoOrigem = aeroporto::find([$voo->idaeroportoorigem]);
        $aeroportoDestino = aeroporto::find([$voo->idaeroportodestino]);
        $escala = escala::all();

        return View::make('cliente.comprar', ['voo'=>$voo, 'aeroportoOrigem'=>$aeroportoOrigem, 'aeroportoDestino'=>$aeroportoDestino, 'escala'=>$escala]);
    }

    public function Mostrar($id)
    {
        $this->loginFilterByRole('passageiro');
        $voo = Voo::find([$id]);
        if (is_null($voo)) {
            return View::make('cliente.index');
        } else {
            return View::make('cliente.mostrar', ['voo' => $voo]);
        }
    }

    public function Pagar($id)
    {
        $this->loginFilterByRole('passageiro');
        $voo = Voo::find([$id]);
        if (is_null($voo)) {
        return View::make('cliente.index');
        } else {
        return View::make('cliente.pagar', ['voo' => $voo]);
        }
    }

    /*public function dadosUpdate($id){
        $user = User::find([$id]);

        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            return View::make('cliente.dadosUpdate', ['user' => $user]);
        }
    }*/
}