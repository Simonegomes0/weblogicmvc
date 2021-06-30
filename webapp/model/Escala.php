<?php
use ActiveRecord\Model;

class Escala extends Model
{
    static $belongs_to = array(
        array('aeroportoorigem','class_name' => 'Aeroporto' ,'foreign_key' => 'idaeroportoorigem'),
        array('aeroportodestino','class_name' => 'Aeroporto' ,'foreign_key' => 'idaeroportodestino')
    );
}