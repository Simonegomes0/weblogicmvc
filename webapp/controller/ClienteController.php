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

    public function Comprar($id)
    {
        $this->LoginFilterByRole('passageiro');
        $voo = voo::find([$id]);
        $aeroportoOrigem = aeroporto::find([$voo->idaeroportoorigem]);
        $aeroportoDestino = aeroporto::find([$voo->idaeroportodestino]);
        $escalas = escala::all();
        $primeiraEscala = reset($escalas);
        $ultimaEscala = end($escalas);
        return View::make('cliente.comprar', ['voo'=>$voo, 'aeroportoOrigem'=>$aeroportoOrigem, 'aeroportoDestino'=>$aeroportoDestino, 'primeiraEscala'=>$primeiraEscala, 'ultimaEscala'=>$ultimaEscala]);
    }

    public function Pagar($id)
    {
        $passagemvenda = new Passagemvenda();
        $vooBuy = Voo::find([$id]);
        $idpEscala = $passagemvenda->IdpEscala($vooBuy->id);
        $iduEscala = $passagemvenda->IduEscala($vooBuy->id);
        $pEscala = Escala::find([$idpEscala]);
        $uEscala = Escala::find([$iduEscala]);
        $passagemvenda->dataida = $pEscala->dataorigem;
        $passagemvenda->datachegada = $uEscala->datadestino;
        $passagemvenda->precopago = $vooBuy->preco;
        $passagemvenda->datacompra = date('Y-m-d H:i:s');
        $passagemvenda->iduser = AuthManager::getLogginId();
        $passagemvenda->idvooida = $vooBuy->id;

        if($passagemvenda->is_valid()){
            $passagemvenda->save();
            Redirect::toRoute('cliente/bilhete');
        } else {
            Redirect::flashToRoute('cliente/comprar');
        }
    }

    public function Historico()
    {
        $utilizador = User::find([AuthManager::getLogginId()]);

        $passagemvendas = Passagemvenda::all();


        $passagensUser = (array) null;

        foreach ($passagemvendas as $passagem)
        {
            if($utilizador->id == $passagem->iduser)
            {
                array_push($passagensUser, $passagem);
            }
        }

        return View::make('historicopassagens.index', ['passagens' => $passagensUser, 'nome' => $utilizador->nome]);
    }
}