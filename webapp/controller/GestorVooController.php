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
        $aeroportos = aeroporto::all();
        $voos = new Voo(Post::getAll());
        $aeroportoOrigem = aeroporto::find([$voos->idaeroportoorigem]);
        $aeroportoDestino = aeroporto::find([$voos->idaeroportodestino]);

        if ($voos->is_valid()) {
            $voos->save();
            Redirect::toRoute('gestorvoo/gestaoVoos');
        } else {
            return View::make('gestorvoo.voosAdd', ['voos' => $voos, 'aeroportos'=>$aeroportos, 'aeroportoOrigem'=>$aeroportoOrigem, 'aeroportoDestino'=>$aeroportoDestino]);
        }
    }

    public function voosEliminar($id)
    {
        $this->loginFilterByRole('gestorvoo');
        $voos = Voo::find([$id]);
        $voos->delete();
        Redirect::toRoute('gestorvoo/gestaoVoos');
    }

    public function gestaoAviao()
    {
        $this->loginFilterByRole('gestorvoo');
        $aviao = Aviao::all();

        return View::make('gestorvoo.gestaoAviao', ['aviao'=>$aviao]);
    }

    public function aviaoUpdate($id)
    {
        $this->loginFilterByRole('gestorvoo');
        $aviao = Aviao::find([$id]);

        if (is_null($aviao)) {
        } else {
            return View::make('gestorvoo.aviaoUpdate', ['aviao' => $aviao]);
        }

    }

    public function doUpdateAviao($id)
    {
        $this->loginFilterByRole('gestorvoo');

        $aviao = Aviao::find([$id]);
        $aviao->update_attributes(Post::getAll());

        $aviao->save();
        Redirect::toRoute('gestorvoo/gestaoAviao');
    }

    public function getAviaoForm()
    {
        $this->loginFilterByRole('gestorvoo');
        return View::make('gestorvoo.aviaoAdd');
    }

    public function aviaoAdd()
    {
        $this->loginFilterByRole('gestorvoo');
        $aviao = new Aviao(Post::getAll());

        if ($aviao->is_valid()) {
            $aviao->save();
            Redirect::toRoute('gestorvoo/gestaoAviao');
        } else {
            Redirect::flashToRoute('gestorvoo/aviaoAdd', ['aviao' => $aviao]);
        }
    }

    public function aviaoEliminar($id)
    {
        $this->loginFilterByRole('gestorvoo');
        $aviao = Aviao::find([$id]);
        $aviao->delete();
        Redirect::toRoute('gestorvoo/gestaoAviao');
    }

    public function gestaoEscalas($id)
    {
        $this->loginFilterByRole('gestorvoo');
        $voo = Voo::find([$id]);

        return View::make('gestorvoo.gestaoEscalas', ['voo'=>$voo]);
    }

    public function escalaAdd($id)
    {
        $aeroportos = Aeroporto::all();
        return View::make('gestorvoo.escalaAdd', ['aeroportos' => $aeroportos, 'idvoo' => $id]);
    }
}