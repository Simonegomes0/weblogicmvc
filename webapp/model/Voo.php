<?php
use ActiveRecord\Model;

class Voo extends Model
{
    static $has_many = array(
        array('escalas','className'=>'Escala','foreign_key' => 'idvoo')
    );


    public function CalcularTotal($escalas, $idVoo)
    {
        $total = 0;
        foreach($escalas as $escala)
        {
            if($escala->idvoo == $idVoo)
            {
                $total += $escala->custo;
            }
        }
        return $total;
    }

    public function DefinirAeroportoOrigem($escalas, $idVoo)
    {

        $toReturn = 0;
        $verificado = 0;
        foreach ($escalas as $escala)
        {
            if($escala->idvoo == $idVoo && $verificado == 0)
            {
                $toReturn = $escala->idaeroportoorigem;
                $verificado = 1;
            }

        }
        return $toReturn;
    }

    public function DefinirAeroportoDestino($escalas, $idVoo)
    {
        $toReturn = 0;
        foreach ($escalas as $escala)
        {
            if($escala->idvoo == $idVoo)
            {
                $toReturn = $escala->idaeroportodestino;
            }
        }
        return $toReturn;
    }

    public function Distancia($escalas, $idvoo)
    {
        $totalMilhas = 0;
        foreach ($escalas as $escala)
        {
            if($escala->idvoo == $idvoo)
                $totalMilhas += $escala->distancia;
        }

        return $totalMilhas;
    }
}