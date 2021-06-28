<?php
use ActiveRecord\Model;

class Escala extends Model
{
    static $belongs_to = array(
        array('idAeroOrigem','class_name' => 'Aeroporto' ,'foreign_key' => 'idAeroOrigem'),
        array('idAeroDestino','class_name' => 'Aeroporto' ,'foreign_key' => 'idAeroDestino')
    );
}