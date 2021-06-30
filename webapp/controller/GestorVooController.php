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
    public function GestaoVoos()
    {
        $this->loginFilterByRole('gestorvoo');
        $voos = voo::all();
        $aeroportos = aeroporto::all();
        $escalas = escala::all();

        return View::make('gestorvoo.gestaoVoos', ['voos'=>$voos, 'aeroportos'=>$aeroportos, 'escalas'=>$escalas]);
    }

    public function getVoosForm()
    {
        $this->loginFilterByRole('gestorvoo');
        return View::make('gestorvoo.voosAdd');
    }


    public function voosUpdate($id)
    {
        $this->loginFilterByRole('gestorvoo');
        $aeroportos = aeroporto::all();
        $voos = Voo::find([$id]);
        $aeroportoOrigem = aeroporto::find([$voos->idaeroportoorigem]);
        $aeroportoDestino = aeroporto::find([$voos->idaeroportodestino]);
        if (is_null($voos)) {
        } else {
            return View::make('gestorvoo.voosUpdate', ['voos' => $voos, 'aeroportos'=>$aeroportos, 'aeroportoOrigem'=>$aeroportoOrigem, 'aeroportoDestino'=>$aeroportoDestino]);
        }
    }

    public function doUpdatevoos($id)
    {
        $this->loginFilterByRole('gestorvoo');
        $voos = Voo::find([$id]);
        $aeroportos = aeroporto::find([$id]);
        $aeroportos -> update_attributes(Post::getAll());
        $aeroportos -> save;
        $voos->update_attributes(Post::getAll());
        $voos->save();


        Redirect::toRoute('gestorvoo/gestaoVoos');
    }

    public function voosAdd()
    {
        $this->loginFilterByRole('gestorvoo');
        $voos = new Voo(Post::getAll());
        if ($voos->is_valid()) {
            $voos->save();
            Redirect::toRoute('gestorvoo/gestaoVoos');
        } else {
            Redirect::flashToRoute('gestorvoo/voosAdd', ['voos' => $voos]);
        }
    }

    public function voosEliminar($id)
    {
        $this->loginFilterByRole('gestorvoo');
        $voos = Voo::find([$id]);
        $voos->delete();
        Redirect::toRoute('gestorvoo/gestaoVoos');
    }

}