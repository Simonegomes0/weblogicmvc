<?php
use ActiveRecord\Model;

class Escala extends Model
{
    static $belongs_to = array(
        array('idaeroportoorigem','class_name' => 'Aeroporto' ,'foreign_key' => 'idaeroportoorigem'),
        array('idaeroportodestino','class_name' => 'Aeroporto' ,'foreign_key' => 'idaeroportodestino')
    );
}