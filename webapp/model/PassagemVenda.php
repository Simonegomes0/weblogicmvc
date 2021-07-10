<?php

use ActiveRecord\Model;

class Passagemvenda extends Model
{
    public function IdpEscala($idVoo)
    {
        $escalas = Escala::all();
        $toReturn = 0;
        $naoEncontrado = true;
        foreach ($escalas as $escala)
        {
            if($escala->idvoo == $idVoo && $naoEncontrado)
            {
                $toReturn = $escala->id;
                $naoEncontrado = false;
            }

        }
        return $toReturn;
    }

    public function IduEscala($idVoo)
    {
        $escalas = Escala::all();
        $toReturn = 0;
        foreach ($escalas as $escala)
        {
            if($escala->idvoo == $idVoo)
            {
                $toReturn = $escala->id;
            }
        }
        return $toReturn;
    }

}

