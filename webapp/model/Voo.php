<?php
use ActiveRecord\Model;

class Voo extends Model
{
    static $has_many = array(
        array('escalas','className'=>'Escala','foreign_key' => 'idvoo')
    );


    public function NomeAero($aeroportos, $idAero)
    {
        $return = '';
        foreach ($aeroportos as $aeroporto)
        {
            if($aeroporto->id == $idAero)
            {
                $return = $aeroporto->nome;
            }
        }
        return $return;
    }

    public function Longitude($escalas, $idvoo)
    {
        $viagem = 0;
        foreach ($escalas as $escala)
        {
            if($escala->idvoo == $idvoo)
                $viagem += $escala->distancia;
        }

        return $viagem;
    }

}