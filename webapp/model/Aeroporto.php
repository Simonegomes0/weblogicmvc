<?php
use ActiveRecord\Model;

class Aeroporto extends Model
{
    static $validates_presence_of = array(
        array('nome'),
        array('localidade'),
        array('pais'),
        array('telefone')
    );

    static $validates_numericality_of = array(
        array('telefone', 'only_integer' => true)
    );

}