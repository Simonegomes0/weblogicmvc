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

    public function doUpdatevoos()
    {
        $voo = new Voo(Post::getAll());

        if($voo->is_valid()){
            $voo->save();
            Redirect::toRoute('gestorvoo/gestaoVoos');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('gestorvoo/doUpdatevoos', ['voo' => $voo]);
        }
    }

    public function voosAdd()
    {
        $voo = new Voo(Post::getAll());

        if($voo->is_valid()){
            $voo->save();
            Redirect::toRoute('voo/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('voo/create', ['voo' => $voo]);
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

    public function getEscalaForm($id)
    {
        $aeroportos = Aeroporto::all();
        return View::make('gestorvoo.escalaAdd', ['aeroportos' => $aeroportos, 'idvoo' => $id]);
    }

    public function escalaAdd()
    {
        $escala = new Escala(Post::getAll());
        $datapartida = strtotime(Post::get('dataorigem'));
        $datachegada = strtotime(Post::get('datadestino'));

        $datapartida = date('Y-m-d H:i:s', $datapartida);
        $datachegada = date('Y-m-d H:i:s', $datachegada);

        $escala -> dataorigem = $datapartida;
        $escala -> datadestino = $datachegada;


        if($escala->is_valid()){
            $escala->save();
            $this->index($escala -> idvoo);
            Redirect::toRoute('gestorvoo/gestaoVoos');
        } else {
            Redirect::flashToRoute('gestorvoo/escalaAdd', ['escala' => $escala]);
        }
    }
}