<?php

class User extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('nome', 'message' => 'Campo obrigatório'),
        array('morada', 'message' => 'Campo obrigatório'),
        array('email', 'message' => 'Campo obrigatório'),
        array('nif', 'message' => 'Campo obrigatório'),
        array('telefone', 'message' => 'Campo obrigatório'),
        array('username', 'message' => 'Campo obrigatório'),
        array('password', 'message' => 'Campo obrigatório'),
        array('role', 'message' => 'Campo obrigatório')
    );

    static $validades_numericality_of = array(
        array('nif', 'only_integer' => true, 'is' => 9, 'message' => 'Tem de ser numero!'),
        array('telefone', 'only_integer' => true, 'is' => 9, 'message' => 'Tem de ser numero!')
    );

    static $validades_size_of = array(
        array('nome', 'maximum' => 80, 'too_long' => 'O máximo são 80 caracteres'),
        array('morada', 'maximum' => 100, 'too_long' => 'O máximo são 30 caracteres'),
        array('email', 'maximum' => 60, 'too_long' => 'O máximo são 30 caracteres'),
        array('nif', 'is' => 9, 'message' => 'Tem de ter 9 numeros!'),
        array('telefone', 'is' => 9, 'message' => 'Tem de ter 9 numeros!'),
        array('username', 'maximum' => 50, 'too_long' => 'O máximo são 30 caracteres'),
        array('password', 'maximum' => 30, 'too_long' => 'O máximo são 30 caracteres'),
        array('role', 'maximum' => 20, 'too_long' => 'O máximo são 20 caracteres'),
    );

    static $validates_format_of = array(
        array('email', 'with' => '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/')
    );

    static $validates_inclusion_of = array(
        array('role', 'in' => array('passageiro', 'opmarketing', 'opcheckin', 'gestorvoo', 'admin'))
    );
}